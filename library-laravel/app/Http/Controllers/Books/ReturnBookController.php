<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookStatus;
use App\Models\Rent;
use Illuminate\Http\Request;

class ReturnBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $rents = Rent::all();

        if (count($rents)) {
            foreach ($books as $book) {
                if ($book->rent[0]->rent_status[0]->book_status->status == 'true') {
                    foreach ($book->rent as $collection) {
                        $data = $collection->orderBy('id', 'desc')->paginate(5);
                    }
                } else {
                    $data = [];
                }
            }
        } else {
            $data = [];
        }

        return view('pages.books.transactions.return.returned_books', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $book = Book::findOrFail($id);

        $books = Book::all();
        $rents = Rent::all();

        if (count($rents)) {
            foreach ($books as $book) {
                foreach ($book->rent as $collection) {
                    $data = $collection->orderBy('id', 'desc')->paginate(5);
                }
            }
        } else {
            $data = [];
        }

        return view('pages.books.transactions.return.return_book', compact('book', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $book_status = BookStatus::findOrFail($id);
        $book_status->whereId($id)->update(['status' => 'false', 'return_time' => now()]);

        return back()->with('return-success', 'Uspješno ste vratili knjigu.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rent = Rent::findOrFail($id);

        return view('pages.books.transactions.return.return_info', compact('rent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
