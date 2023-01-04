<?php

namespace App\Http\Controllers\API;

use App\Exceptions\UserCheckRoleException;
use App\Http\Controllers\Controller;
use App\Http\Resources\LanguageCollection;
use App\Http\Resources\ShowLanguageResource;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LanguageAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('languages', 'showLanguage',
            'searchLanguage');
    }

    public function languages()
    {
        return LanguageCollection::collection(Language::paginate(5));
    }

    public function showLanguage($id)
    {
        $language = Language::findOrFail($id);

        return new ShowLanguageResource($language);
    }

    public function storeLanguage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Naziv' => 'required|min:2|max:30',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error'   => 'error-0003',
                'message' => "Došlo je do greške prilikom dodavanja novog jezika",
                'errors'  => $validator->errors()
            ], 422);
        }

        $language = new Language();
        $language->name = $request["Naziv"];
        $language->save();

        return response([
            'data' => new ShowLanguageResource($language)
        ], Response::HTTP_CREATED);
    }

    public function updateLanguage(Request $request, $id)
    {
        $language = Language::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'Naziv' => 'required|min:2|max:30',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error'   => 'error-0003',
                'message' => "Došlo je do greške prilikom izmjene jezika",
                'errors'  => $validator->errors()
            ], 422);
        }

        $language->name = $request["Naziv"];
        $language->update();

        return response([
            'data' => new ShowLanguageResource($language)
        ], Response::HTTP_OK);
    }

    public function destroyLanguage($id)
    {
        $this->UserCheckRoleException($id);
        $language = Language::findOrFail($id);
        $language->delete();

        return response()->json([
            "message" => "Uspješno ste izbrisali jezik",
        ]);
    }

    public function UserCheckRoleException($product)
    {
        if (Auth::user()->type->id == 1) {
            throw new UserCheckRoleException();
        }
    }

    public function searchLanguage($name)
    {
        $language = Language::where('name', 'like', '%'.$name.'%')->first();

        if ($language == null) {
            return response(
                [
                    "error"     => "not-found-0001",
                    'timestamp' => Carbon::now(),
                    'status'    => 404,
                    'message'   => 'Ne postoji jezik sa tim nazivom',
                    'path'      => url()->current(),
                ]
                , 404);
        } else {
            return response([
                'data' => new ShowLanguageResource($language)
            ], Response::HTTP_OK);
        }
    }
}
