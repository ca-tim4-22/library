<?php

namespace App\Http\Controllers\API;

use App\Exceptions\UserCheckRoleException;
use App\Http\Controllers\Controller;
use App\Http\Resources\FormatCollection;
use App\Http\Resources\ShowFormatResource;
use App\Models\Format;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FormatAPIController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth:api')->except('formats', 'showFormat', 'searchFormat');
    }
 
     public function formats() 
     {
         return FormatCollection::collection(Format::paginate(5));
     }
 
     public function showFormat($id) 
     {
         $format = Format::findOrFail($id);
 
         return new ShowFormatResource($format);
     }
 
     public function storeFormat(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'Naziv' => 'required|min:2|max:30',
         ]);
         if ($validator->fails()) {
             return response()->json([
                 'error'=> 'validation-error-0001', 
                 'message' => "Došlo je do greške prilikom dodavanja novog formata",
                 'errors' => $validator->errors()
             ], 422);
         }
 
         $format = new Format();
         $format->name = $request["Naziv"];
         $format->save();
       
         return response([
             'data' => new ShowFormatResource($format)
         ], Response::HTTP_CREATED);
     }
 
     public function updateFormat(Request $request, $id)
     {
         $format = Format::findOrFail($id);
         $validator = Validator::make($request->all(), [
             'Naziv' => 'required|min:2|max:30',
         ]);
         if ($validator->fails()) {
             return response()->json([
                 'error'=> 'validation-error-0001', 
                 'message' => "Došlo je do greške prilikom izmjene formata",
                 'errors' => $validator->errors()
             ], 422);
         }
         
         $format->name = $request["Naziv"];
         $format->update();
 
         return response([
             'data' => new ShowFormatResource($format)
         ], Response::HTTP_OK);
     }
 
     public function destroyFormat($id)
     {    
         $this->UserCheckRoleException($id);
         $format = Format::findOrFail($id);
         $format->delete();
          
         return response()->json([
             "message" => "Uspješno ste izbrisali format",
         ]);
     }
 
     public function UserCheckRoleException($product) 
     {
         if (Auth::user()->type->id == 1) {
             throw new UserCheckRoleException();
         }
     }
 
     public function searchFormat($name)
     {
         $format = Format::where('name', 'like', '%' . $name . '%')->first();
 
         if ($format == null) {
             return response(
                 [
                     "error" => "not-found-0001",
                     'timestamp' => Carbon::now(),
                     'status' => 404,
                     'message' => 'Ne postoji format sa tim nazivom',
                     'path' => url()->current(),
                 ]
                 , 404);
         } else {
             return response([
                 'data' => new ShowFormatResource($format)
             ], Response::HTTP_OK);
         }
     }
}
