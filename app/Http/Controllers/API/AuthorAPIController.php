<?php

namespace App\Http\Controllers\API;

use App\Exceptions\UserCheckRoleException;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuthorCollection;
use App\Http\Resources\ShowAuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthorAPIController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth:api')->except('authors', 'showAuthor', 'searchAuthor');
    }
 
     public function authors() 
     {
         return AuthorCollection::collection(Author::paginate(5));
     }
 
     public function showAuthor($id) 
     {
         $author = Author::findOrFail($id);
 
         return new ShowAuthorResource($author);
     }
 
     public function storeAuthor(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'Naziv' => 'required|min:2|max:30',
             'Biografija' => 'required|min:2|max:1000',
             'Vikipedija' => 'required|min:2|max:100',
         ]);
         if ($validator->fails()) {
             return response()->json([
                 'error'=> 'validation-error-0001', 
                 'message' => "Došlo je do greške prilikom dodavanja novog autora",
                 'errors' => $validator->errors()
             ], 422);
         }
 
         $author = new Author();
         $author->NameSurname = $request["Naziv"];
         $author->biography = $request["Biografija"];
         $author->wikipedia = $request["Vikipedija"];
         $author->save();
       
         return response([
             'data' => new ShowAuthorResource($author)
         ], Response::HTTP_CREATED);
     }
 
     public function updateAuthor(Request $request, $id)
     {
         $author = Author::findOrFail($id);
         $validator = Validator::make($request->all(), [
             'Naziv' => 'required|min:2|max:30',
             'Biografija' => 'required|min:2|max:1000',
             'Vikipedija' => 'required|min:2|max:100',
         ]);
         if ($validator->fails()) {
             return response()->json([
                 'error'=> 'validation-error-0001', 
                 'message' => "Došlo je do greške prilikom izmjene jezika",
                 'errors' => $validator->errors()
             ], 422);
         }
         
         $author->NameSurname = $request["Naziv"];
         $author->biography = $request["Biografija"];
         $author->wikipedia = $request["Vikipedija"];
         $author->update();
 
         return response([
             'data' => new ShowAuthorResource($author)
         ], Response::HTTP_CREATED);
     }
 
     public function destroyAuthor($id)
     {    
         $this->UserCheckRoleException($id);
         $author = Author::findOrFail($id);
         $author->delete();
          
         return response()->json([
             "message" => "Uspješno ste izbrisali autora",
         ]);
     }
 
     public function UserCheckRoleException($product) 
     {
         if (Auth::user()->type->id == 1) {
             throw new UserCheckRoleException();
         }    
        }
 
     public function searchAuthor($name)
     {
         $author = Author::where('NameSurname', 'like', '%' . $name . '%')->first();
 
         if ($author == null) {
             return response(
                 [
                     "error" => "not-found-0001",
                     'timestamp' => Carbon::now(),
                     'status' => 404,
                     'message' => 'Ne postoji autor sa tim nazivom',
                     'path' => url()->current(),
                 ]
                 , 404);
         } else {
             return response([
                 'data' => new ShowAuthorResource($author)
             ], Response::HTTP_OK);
         }
     }
}
