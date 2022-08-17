<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCreateRequest;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\BookAuthor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $books = Book::all();

        return view('pages.books.books', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $models = [
            'categories'=> DB::table('categories')->get(),
            'genres' => DB::table('genres')->get(),
            'authors' => DB::table('authors')->get(),
            'publishers' => DB::table('publishers')->get(),
            'bindings' => DB::table('bindings')->get(),
            'formats' => DB::table('formats')->get(),
            'languages' => DB::table('languages')->get(),
            'letters' =>DB::table('letters')->get()
        ];

        return view('pages.books.new_book', compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BookCreateRequest $request)
    {
        $input = $request->all();

        $book = new Book();
        $book->title = $request->input('title');
        $book->body = $request->input('body');
        $book->publisher_id = $request->input('publisher_id');
        $book->quantity_count = $request->input('quantity_count');
        $book->page_count = $request->input('page_count');
        // $book->genre_id = $request->input('genre_id');
        $book->binding_id = $request->input('binding_id');
        $book->letter_id = $request->input('letter_id');
        $book->format_id = $request->input('format_id');
        $book->language_id = $request->input('language_id');
        $book->ISBN = $request->input('ISBN');
        $book->save();

        DB::table('book_categories')->insert(
            ['book_id' => $book->id, 'category_id' => $input['category_id']],
        );
        DB::table('book_authors')->insert(
            ['book_id' => $book->id, 'author_id' => $input['author_id']],
        );
        DB::table('book_genres')->insert(
            ['book_id' => $book->id, 'genre_id' => $input['genre_id']],
        );

        return to_route('all-books')->with('success-book','Uspješno ste dodali knjigu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('pages.books.show_book', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $models = [
            'categories'=> DB::table('categories')->get(),
            'genres' => DB::table('genres')->get(),
            'authors' => DB::table('authors')->get(),
            'publishers' => DB::table('publishers')->get(),
            'bindings' => DB::table('bindings')->get(),
            'formats' => DB::table('formats')->get(),
            'languages' => DB::table('languages')->get(),
            'letters' =>DB::table('letters')->get()
        ];

        $book = Book::findOrFail($id);

        return view('pages.books.edit_book', compact('book','models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,Book $book, $id)
    {
        $book->title=request('title');
        $book->page_count=request('page_count');
        $book->letter_id=request('letter_id');
        $book->language_id=request('language_id');
        $book->format_id=request('format_id');
        $book->publisher_id=request('publisher_id');
        $book->ISBN=request('ISBN');
        $book->binding_id=request('binding_id');
        $book->body=request('binding_id');
        $book->quantity_count=request('quantity_count');
        $book->rented_count=0;
        $book->reserved_count=0;
        if(request('category_id')){
            DB::table('book_categories')->insert(
                ['book_id' => $book->id, 'category_id' => request('category_id')],
            );
        }


        if(request('book_authors')){
            DB::table('book_authors')->insert(
                ['book_id' => $book->id, 'author_id' => request('author_id')],
            );
        }
        if(request('book_genres')){
            DB::table('book_genres')->insert(
                ['book_id' => $book->id, 'genre_id' => request('genre_id')],
            );

        }

        return to_route('all-books')->with('success-edited-book','Uspješno ste izmijenili knjigu.');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return to_route('all-books')->with('book-deleted', 'Uspješno ste izbrisali knjigu.');
    }
}
