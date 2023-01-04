<?php

namespace App\Http\Controllers\API;

use App\Exceptions\UserCheckRoleException;
use App\Http\Controllers\Controller;
use App\Http\Resources\PublisherCollection;
use App\Http\Resources\ShowPublisherResource;
use App\Models\Publisher;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PublisherAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('publishers', 'showPublisher',
            'searchPublisher');
    }

    public function publishers()
    {
        return PublisherCollection::collection(Publisher::paginate(5));
    }

    public function showPublisher($id)
    {
        $publisher = Publisher::findOrFail($id);

        return new ShowPublisherResource($publisher);
    }

    public function storePublisher(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Naziv' => 'required|min:2|max:30',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error'   => 'error-0003',
                'message' => "Došlo je do greške prilikom dodavanja novog izdavača",
                'errors'  => $validator->errors()
            ], 422);
        }

        $publisher = new Publisher();
        $publisher->name = $request["Naziv"];
        $publisher->save();

        return response([
            'data' => new ShowPublisherResource($publisher)
        ], Response::HTTP_CREATED);
    }

    public function updatePublisher(Request $request, $id)
    {
        $publisher = Publisher::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'Naziv' => 'required|min:2|max:30',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error'   => 'error-0003',
                'message' => "Došlo je do greške prilikom izmjene izdavača",
                'errors'  => $validator->errors()
            ], 422);
        }

        $publisher->name = $request["Naziv"];
        $publisher->update();

        return response([
            'data' => new ShowPublisherResource($publisher)
        ], Response::HTTP_OK);
    }

    public function destroyPublisher($id)
    {
        $this->UserCheckRoleException($id);
        $publisher = Publisher::findOrFail($id);
        $publisher->delete();

        return response()->json([
            "message" => "Uspješno ste izbrisali izdavača",
        ]);
    }

    public function UserCheckRoleException($product)
    {
        if (Auth::user()->type->id == 1) {
            throw new UserCheckRoleException();
        }
    }

    public function searchPublisher($name)
    {
        $publisher = Publisher::where('name', 'like', '%'.$name.'%')->first();

        if ($publisher == null) {
            return response(
                [
                    "error"     => "not-found-0001",
                    'timestamp' => Carbon::now(),
                    'status'    => 404,
                    'message'   => 'Ne postoji izdavač sa tim nazivom',
                    'path'      => url()->current(),
                ]
                , 404);
        } else {
            return response([
                'data' => new ShowPublisherResource($publisher)
            ], Response::HTTP_OK);
        }
    }
}
