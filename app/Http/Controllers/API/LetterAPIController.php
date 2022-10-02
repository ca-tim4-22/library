<?php

namespace App\Http\Controllers\API;

use App\Exceptions\UserCheckRoleException;
use App\Http\Controllers\Controller;
use App\Http\Resources\LetterCollection;
use App\Http\Resources\ShowLetterResource;
use App\Models\Letter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LetterAPIController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth:api')->except('letters', 'showLetter', 'searchLetter');
    }
 
     public function letters() 
     {
         return LetterCollection::collection(Letter::paginate(5));
     }
 
     public function showLetter($id) 
     {
         $letter = Letter::findOrFail($id);
 
         return new ShowLetterResource($letter);
     }
 
     public function storeLetter(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'Naziv' => 'required|min:2|max:30',
         ]);
         if ($validator->fails()) {
             return response()->json([
                 'error'=> 'validation-error-0001', 
                 'message' => "Došlo je do greške prilikom dodavanja novog pisma",
                 'errors' => $validator->errors()
             ], 422);
         }
 
         $letter = new Letter();
         $letter->name = $request["Naziv"];
         $letter->save();
       
         return response([
             'data' => new ShowLetterResource($letter)
         ], Response::HTTP_CREATED);
     }
 
     public function updateLetter(Request $request, $id)
     {
         $letter = Letter::findOrFail($id);
         $validator = Validator::make($request->all(), [
             'Naziv' => 'required|min:2|max:30',
         ]);
         if ($validator->fails()) {
             return response()->json([
                 'error'=> 'validation-error-0001', 
                 'message' => "Došlo je do greške prilikom izmjene pisma",
                 'errors' => $validator->errors()
             ], 422);
         }
         
         $letter->name = $request["Naziv"];
         $letter->update();
 
         return response([
             'data' => new ShowLetterResource($letter)
         ], Response::HTTP_OK);
     }
 
     public function destroyLetter($id)
     {    
         $this->UserCheckRoleException($id);
         $letter = Letter::findOrFail($id);
         $letter->delete();
          
         return response()->json([
             "message" => "Uspješno ste izbrisali pismo",
         ]);
     }
 
     public function UserCheckRoleException($product) 
     {
         if (Auth::user()->type->id == 1) {
             throw new UserCheckRoleException();
         }     }
 
     public function searchLetter($name)
     {
         $letter = Letter::where('name', 'like', '%' . $name . '%')->first();
 
         if ($letter == null) {
             return response(
                 [
                     "error" => "not-found-0001",
                     'timestamp' => Carbon::now(),
                     'status' => 404,
                     'message' => 'Ne postoji pismo sa tim nazivom',
                     'path' => url()->current(),
                 ]
                 , 404);
         } else {
             return response([
                 'data' => new ShowLetterResource($letter)
             ], Response::HTTP_OK);
         }
     }
}
