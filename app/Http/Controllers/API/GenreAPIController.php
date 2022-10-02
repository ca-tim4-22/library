<?php

namespace App\Http\Controllers\API;

use App\Exceptions\UserCheckRoleException;
use App\Http\Controllers\Controller;
use App\Http\Resources\GenreCollection;
use App\Http\Resources\ShowGenreResource;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class GenreAPIController extends Controller
{
    public function __construct()
   {
    $this->middleware('auth:api')->except('genres', 'showGenre', 'searchGenre');
   }

    public function genres() 
    {
        return GenreCollection::collection(Genre::paginate(5));
    }

    public function showGenre($id) 
    {
        $genre = Genre::findOrFail($id);

        return new ShowGenreResource($genre);
    }

    public function storeGenre(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Naziv' => 'required|min:2|max:30',
            'Deskripcija' => 'required|min:2|max:500',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error'=> 'validation-error-0001', 
                'message' => "Došlo je do greške prilikom dodavanja novog žanra",
                'errors' => $validator->errors()
            ], 422);
        }

        $genre = new Genre();
        $genre->name = $request["Naziv"];
        $genre->description = $request["Deskripcija"];
        $genre->icon = '/img/default_images_while_migrations/genres/placeholder.jpg';
        $genre->default = true;
        $genre->save();
      
        return response([
            'data' => new ShowGenreResource($genre)
        ], Response::HTTP_CREATED);
    }

    public function updateGenre(Request $request, $id)
    {
        $genre = Genre::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'Naziv' => 'required|min:2|max:30',
            'Deskripcija' => 'required|min:2|max:500',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error'=> 'validation-error-0001', 
                'message' => "Došlo je do greške prilikom izmjene žanra",
                'errors' => $validator->errors()
            ], 422);
        }
        
        $genre->name = $request["Naziv"];
        $genre->description = $request["Deskripcija"];
        $genre->icon = '/img/default_images_while_migrations/genres/placeholder.jpg';
        $genre->default = true;
        $genre->update();

        return response([
            'data' => new ShowGenreResource($genre)
        ], Response::HTTP_OK);
    }

    public function destroyGenre($id)
    {    
        $this->UserCheckRoleException($id);
        $genre = Genre::findOrFail($id);
        $genre->delete();
         
        return response()->json([
            "message" => "Uspješno ste izbrisali žanr",
        ]);
    }

    public function UserCheckRoleException($product) 
    {
        if (Auth::user()->type->id == 1) {
            throw new UserCheckRoleException();
        }
    }

    public function searchGenre($name)
    {
        $genre = Genre::where('name', 'like', '%' . $name . '%')->first();

        if ($genre == null) {
            return response(
                [
                    "error" => "not-found-0001",
                    'timestamp' => Carbon::now(),
                    'status' => 404,
                    'message' => 'Ne postoji žanr sa tim nazivom',
                    'path' => url()->current(),
                ]
                , 404);
        } else {
            return response([
                'data' => new ShowGenreResource($genre)
            ], Response::HTTP_OK);
        }
    }
}
