<?php

namespace App\Http\Controllers\API;

use App\Exceptions\UserCheckRoleException;
use App\Http\Controllers\Controller;
use App\Http\Resources\Count\GlobalVariableCountResource;
use App\Http\Resources\GlobalVariableCollection;
use App\Http\Resources\ShowGlobalVariableResource;
use App\Models\GlobalVariable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GlobalVariableAPIController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth:api')->except('globalVariables', 'showGlobalVariable', 'searchGlobalVariable', 'globalVariablesCount');
    }
 
     public function globalVariables() 
     {
         return GlobalVariableCollection::collection(GlobalVariable::paginate(5));
     }
 
     public function showGlobalVariable($id) 
     {
         $variable = GlobalVariable::findOrFail($id);
 
         return new ShowGlobalVariableResource($variable);
     }
 
     public function storeGlobalVariable(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'Naziv' => 'required|min:2|max:30',
             'Vrijednost' => 'required|numeric|min:1|max:90',
         ]);
         if ($validator->fails()) {
             return response()->json([
                 'error'=> 'validation-error-0001', 
                 'message' => "Došlo je do greške prilikom dodavanja nove globalne varijable",
                 'errors' => $validator->errors()
             ], 422);
         }
 
         $variable = new GlobalVariable();
         $variable->variable = $request["Naziv"];
         $variable->value = $request["Vrijednost"];
         $variable->save();
       
         return response([
             'data' => new ShowGlobalVariableResource($variable)
         ], Response::HTTP_CREATED);
     }
 
     public function updateGlobalVariable(Request $request, $id)
     {
         $variable = GlobalVariable::findOrFail($id);
         $validator = Validator::make($request->all(), [
            'Naziv' => 'required|min:2|max:30',
            'Vrijednost' => 'required|numeric|min:1|max:90',
         ]);
         if ($validator->fails()) {
             return response()->json([
                 'error'=> 'validation-error-0001', 
                 'message' => "Došlo je do greške prilikom izmjene globalne varijable",
                 'errors' => $validator->errors()
             ], 422);
         }
         
         $variable->variable = $request["Naziv"];
         $variable->value = $request["Vrijednost"];
         $variable->update();
 
         return response([
             'data' => new ShowGlobalVariableResource($variable)
         ], Response::HTTP_CREATED);
     }
 
     public function destroyGlobalVariable($id)
     {    
         $this->UserCheckRoleException($id);
         $variable = GlobalVariable::findOrFail($id);
         $variable->delete();
          
         return response()->json([
             "message" => "Uspješno ste izbrisali globalnu varijablu",
         ]);
     }
 
     public function UserCheckRoleException($product) 
     {
         if (Auth::user()->type->id == 1) {
             throw new UserCheckRoleException();
         }     }
 
     public function searchGlobalVariable($name)
     {
         $variable = GlobalVariable::where('variable', 'like', '%' . $name . '%')->first();
 
         if ($variable == null) {
             return response(
                 [
                     "error" => "not-found-0001",
                     'timestamp' => Carbon::now(),
                     'status' => 404,
                     'message' => 'Ne postoji globalna varijabla sa tim nazivom',
                     'path' => url()->current(),
                 ]
                 , 404);
         } else {
             return response([
                 'data' => new ShowGlobalVariableResource($variable)
             ], Response::HTTP_OK);
         }
     }

    public function globalVariablesCount() {
    $null = 'null';
    return response([
    'global_variables_count' => new GlobalVariableCountResource($null)
    ], Response::HTTP_OK);
    }
}
