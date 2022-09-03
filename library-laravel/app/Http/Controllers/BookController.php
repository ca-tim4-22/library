<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCreateRequest;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookCategory;
use App\Models\BookGenre;
use App\Models\Rent;
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
        $books = Book::latest('id')->paginate(5);
        $count = 0;

        if (Rent::count() > 0) {
        foreach ($books as $book) {
            foreach ($book->rent as $rent) {
                $count = $rent->whereDate('return_date', '<', date('Y-m-d'))->count();
            }
        }} else {
            $count = 0;
        }

        return view('pages.books.books', compact('books', 'count'));
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
        $book->page_count = $request->input('page_count');;
        $book->binding_id = $request->input('binding_id');
        $book->letter_id = $request->input('letter_id');
        $book->format_id = $request->input('format_id');
        $book->language_id = $request->input('language_id');
        $book->ISBN = $request->input('ISBN');
        $book->year = $request->input('year');
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

        if ($file = $request->file('photo')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('storage/book-covers', $name);
            DB::table('galleries')->insert(
                ['book_id' => $book->id, 'photo' => $name, 'cover' => 1],
            );
        } 

        return to_route('all-books')->with('success-book', 'Uspješno ste dodali knjigu.');
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
        $books = Book::all();

        if (Rent::count() > 0) {
            foreach ($books as $booke) {
                foreach ($booke->rent as $rent) {
                    $count = $rent->whereDate('return_date', '<', date('Y-m-d'))->count();
                }
            }
        } else {
        $count = null;
        $text = '0 primjeraka';
        }

        if ($count > 0 && $count % 10 == 1) {
        $count = $count;
        $text = 'primjerak';
        } elseif ($count > 0 && $count % 10 == 2 || $count % 10 == 3 || $count % 10 == 4) {
        $count = $count;
        $text = 'primjerka';
        } else {
        $count = $count;
        $text = 'primjeraka';
        }

        return view('pages.books.show_book', compact('book', 'count', 'text'));
    }

    public function archivedReservations()
    {
        return view('pages.books.transactions.archived_reservations');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

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

        return view('pages.books.edit_book', compact('book','models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        //return to_route('all-books')->with('success-edited-book', 'Uspješno ste izmijenili knjigu.');
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
