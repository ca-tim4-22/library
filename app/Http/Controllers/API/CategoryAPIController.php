<?php

namespace App\Http\Controllers\API;

use App\Exceptions\UserCheckRoleException;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\ShowCategoryResource;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CategoryAPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('categories', 'showCategory',
            'searchCategory');
    }

    public function categories()
    {
        return CategoryCollection::collection(Category::paginate(5));
    }

    public function showCategory($id)
    {
        $category = Category::findOrFail($id);

        return new ShowCategoryResource($category);
    }

    public function storeCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Naziv'       => 'required|min:2|max:30',
            'Deskripcija' => 'required|min:2|max:500',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error'   => 'error-0003',
                'message' => "Došlo je do greške prilikom dodavanja nove kategorije",
                'errors'  => $validator->errors()
            ], 422);
        }

        $category = new Category();
        $category->name = $request["Naziv"];
        $category->description = $request["Deskripcija"];
        $category->icon
            = 'https://www.logo-dizajn.com/wp-content/uploads/2016/05/Logo-dizajn-instagram2.jpg';
        $category->save();

        return response([
            'data' => new ShowCategoryResource($category)
        ], Response::HTTP_CREATED);
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'Naziv'       => 'required|min:2|max:30',
            'Deskripcija' => 'required|min:2|max:500',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error'   => 'error-0003',
                'message' => "Došlo je do greške prilikom izmjene kategorije",
                'errors'  => $validator->errors()
            ], 422);
        }

        $category->name = $request["Naziv"];
        $category->description = $request["Deskripcija"];
        $category->update();

        return response([
            'data' => new ShowCategoryResource($category)
        ], Response::HTTP_OK);
    }

    public function destroyCategory($id)
    {
        $this->UserCheckRoleException($id);
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            "message" => "Uspješno ste izbrisali kategoriju",
        ]);
    }

    public function UserCheckRoleException($product)
    {
        if (Auth::user()->type->id == 1) {
            throw new UserCheckRoleException();
        }
    }

    public function searchCategory($name)
    {
        $category = Category::where('name', 'like', '%'.$name.'%')->first();

        if ($category == null) {
            return response(
                [
                    "error"     => "not-found-0001",
                    'timestamp' => Carbon::now(),
                    'status'    => 404,
                    'message'   => 'Ne postoji kategorija sa tim nazivom',
                    'path'      => url()->current(),
                ]
                , 404);
        } else {
            return response([
                'data' => new ShowCategoryResource($category)
            ], Response::HTTP_OK);
        }
    }
}
