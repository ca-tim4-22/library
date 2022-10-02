<?php

namespace App\Http\Controllers\API;

use App\Exceptions\UserCheckRoleException;
use App\Http\Controllers\Controller;
use App\Http\Resources\BindingCollection;
use App\Http\Resources\ShowBindingResource;
use App\Models\Binding;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BindingAPIController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth:api')->except('bindings', 'showBinding', 'searchBinding');
    }
 
     public function bindings() 
     {
         return BindingCollection::collection(Binding::paginate(5));
     }
 
     public function showBinding($id) 
     {
         $binding = Binding::findOrFail($id);
 
         return new ShowBindingResource($binding);
     }
 
     public function storeBinding(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'Naziv' => 'required|min:2|max:30',
         ]);
         if ($validator->fails()) {
             return response()->json([
                 'error'=> 'error-0003',
                 'message' => "Došlo je do greške prilikom dodavanja novog poveza",
                 'errors' => $validator->errors()
             ], 422);
         }
 
         $binding = new Binding();
         $binding->name = $request["Naziv"];
         $binding->save();
       
         return response([
             'data' => new ShowBindingResource($binding)
         ], Response::HTTP_CREATED);
     }
 
     public function updateBinding(Request $request, $id)
     {
         $binding = Binding::findOrFail($id);
         $validator = Validator::make($request->all(), [
             'Naziv' => 'required|min:2|max:30',
         ]);
         if ($validator->fails()) {
             return response()->json([
                 'error'=> 'error-0003', 
                 'message' => "Došlo je do greške prilikom izmjene poveza",
                 'errors' => $validator->errors()
             ], 422);
         }
         
         $binding->name = $request["Naziv"];
         $binding->update();
 
         return response([
             'data' => new ShowBindingResource($binding)
         ], Response::HTTP_OK);
     }
 
     public function destroyBinding($id)
     {    
         $this->UserCheckRoleException($id);
         $binding = Binding::findOrFail($id);
         $binding->delete();
          
         return response()->json([
             "message" => "Uspješno ste izbrisali povez",
         ]);
     }
 
     public function UserCheckRoleException($product) 
     {
         if (Auth::user()->type->id == 1) {
             throw new UserCheckRoleException();
         }
     }
 
     public function searchBinding($name)
     {
         $binding = Binding::where('name', 'like', '%' . $name . '%')->first();
 
         if ($binding == null) {
             return response(
                 [
                     "error" => "not-found-0001",
                     'timestamp' => Carbon::now(),
                     'status' => 404,
                     'message' => 'Ne postoji povez sa tim nazivom',
                     'path' => url()->current(),
                 ]
                 , 404);
         } else {
             return response([
                 'data' => new ShowBindingResource($binding)
             ], Response::HTTP_OK);
         }
     }
}
