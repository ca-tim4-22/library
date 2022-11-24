<?php

namespace App\Http\Controllers\API;

use App\Exceptions\BookAuthorExistsException;
use App\Exceptions\BookCategoryExistsException;
use App\Exceptions\BookGenreExistsException;
use App\Exceptions\UserCheckRoleException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\Books\BookCollection;
use App\Http\Resources\Books\ShowBookResource;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookAPIController extends Controller
{
   public function __construct()
   {
    $this->middleware('auth:api')->except('books', 'showBook', 'searchBook');
   }
    public function books() 
    {
        return BookCollection::collection(Book::paginate(5));
    }
    
    public function showBook($id) 
    {
        $book = Book::findOrFail($id);
        $this->BookCategoryExists($book);
        $this->BookGenreExists($book);
        $this->BookAuthorExists($book);
        
        return new ShowBookResource($book);
    }

    public function BookCategoryExists($book) 
    {
        if (count($book->categories) > 0) {
        } else {
            throw new BookCategoryExistsException();
        }
    }

    public function BookGenreExists($book) 
    {
        if (count($book->genres) > 0) {
        } else {
            throw new BookGenreExistsException();
        }
    }

    public function BookAuthorExists($book) 
    {
        if (count($book->genres) > 0) {
        } else {
            throw new BookAuthorExistsException();
        }
    }

    public function storeBook(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Titl' => 'required|min:2|max:30',
            'Deskripcija' => 'required|min:2|max:500',
            'Ukupna količina' => 'required|numeric|min:0|max:500|not_in:0',
            'Broj strana' => 'required|numeric|min:0|max:2000|not_in:0',
            'Izdavač' => 'required|numeric|min:0|max:1000|not_in:0|exists:publishers,id',
            'Povez' => 'required|numeric|min:0|max:300|not_in:0|exists:bindings,id',
            'Pismo' => 'required|numeric|min:0|max:300|not_in:0|exists:letters,id',
            'Format' => 'required|numeric|min:0|max:300|not_in:0|exists:formats,id',
            'Jezik' => 'required|numeric|min:0|max:300|not_in:0|exists:languages,id',
            'ISBN' => 'required|unique:books|min:13|max:13',
            'Godina izdavanja' => 'required|numeric|max:2022|not_in:0',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error'=> 'error-0003', 
                'message' => "Došlo je do greške prilikom dodavanja nove knjige",
                'errors' => $validator->errors()
            ], 422);
        }

        $book = new Book();
        $book->title = $request["Titl"];
        $book->body = $request["Deskripcija"];
        $book->quantity_count = $request["Ukupna količina"];
        $book->page_count = $request["Broj strana"];
        $book->publisher_id = $request["Izdavač"];
        $book->binding_id = $request["Povez"];
        $book->letter_id = $request["Pismo"];
        $book->format_id = $request["Format"];
        $book->language_id = $request["Jezik"];
        $book->ISBN = $request->ISBN;
        $book->year = $request["Godina izdavanja"];
        $book->placeholder = 1;
        $book->save();

        DB::table('galleries')->insert([
            'book_id' => $book->id,
            'photo' => 'https://i.postimg.cc/nLNGJy45/no-image.jpg',
            'cover' => 1,
        ]);

        return response([
            "message" => "Uspješno ste dodali knjigu",
        ], Response::HTTP_CREATED);
    }

    public function updateBook(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'Titl' => 'required|min:2|max:30',
            'Deskripcija' => 'required|min:2|max:500',
            'Ukupna količina' => 'required|numeric|min:0|max:500|not_in:0',
            'Broj strana' => 'required|numeric|min:0|max:2000|not_in:0',
            'Izdavač' => 'required|numeric|min:0|max:1000|not_in:0|exists:publishers,id',
            'Povez' => 'required|numeric|min:0|max:300|not_in:0|exists:bindings,id',
            'Pismo' => 'required|numeric|min:0|max:300|not_in:0|exists:letters,id',
            'Format' => 'required|numeric|min:0|max:300|not_in:0|exists:formats,id',
            'Jezik' => 'required|numeric|min:0|max:300|not_in:0|exists:languages,id',
            'Godina izdavanja' => 'required|numeric|max:2022|not_in:0',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'error'=> 'error-0003', 
                'message' => "Došlo je do greške prilikom izmjene knjige",
                'errors' => $validator->errors()
            ], 422);
        }
        
        $book->title = $request["Titl"];
        $book->title = $request["Titl"];
        $book->body = $request["Deskripcija"];
        $book->quantity_count = $request["Ukupna količina"];
        $book->page_count = $request["Broj strana"];
        $book->publisher_id = $request["Izdavač"];
        $book->binding_id = $request["Povez"];
        $book->letter_id = $request["Pismo"];
        $book->format_id = $request["Format"];
        $book->language_id = $request["Jezik"];
        $book->year = $request["Godina izdavanja"];
        $book->placeholder = 1;
        $book->update();

        return response([
            'data' => new ShowBookResource($book)
        ], Response::HTTP_OK);
    }

    public function destroyBook($id)
    {    
        $this->UserCheckRoleException($id);
        $book = Book::findOrFail($id);
        $book->delete();
         
        return response()->json([
            "message" => "Uspješno ste izbrisali knjigu",
        ]);
    }

    public function UserCheckRoleException($product) 
    {
        if (Auth::user()->type->id == 1) {
            throw new UserCheckRoleException();
        }
    }

    public function searchBook($title)
    {
        $book = Book::where('title', 'like', '%' . $title . '%')->first();

        if ($book == null) {
            return response(
                [
                    "error" => "not-found-0001",
                    'timestamp' => Carbon::now(),
                    'status' => 404,
                    'message' => 'Ne postoji knjiga sa tim nazivom',
                    'path' => url()->current(),
                ]
                , 404);
        } else {
            return response([
                'data' => new ShowBookResource($book)
            ], Response::HTTP_OK);
        }
    }
  
}
