<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\GlobalVariable;
use App\Models\Rent;
use App\Models\RentStatus;
use Illuminate\Http\Request;

class ReturnBookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['protect-all', 'librarian-protect']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $books = Book::all();

       if (RentStatus::where('book_status_id', 2)->count() > 0) {
       foreach ($books as $book) {
            foreach ($book->rent as $rent) {
                foreach ($rent->rent_status as $key) {
                    $data = $key->where('book_status_id', 2)->orderBy('id', 'asc');
                }
            }
           }
       } else {
        $data = 'no-values';
       }

        return view('pages.books.transactions.return.returned_books', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        $get_book = $book;
        $books = Book::all();
        $rents = RentStatus::where('book_status_id', 1)->count();
        $variable = GlobalVariable::findOrFail(2);

        if ($rents > 0) {
            $data = RentStatus::where('book_status_id', 1)->latest()->get();
        } else {
            $data = [];
        }

        return view('pages.books.transactions.return.return_book', compact('data', 'get_book', 'variable'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http \Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id2 = $request->input('id2');
        $book_status = RentStatus::findOrFail($id2);
        $book_status->whereId($id2)->update(['book_status_id' => '2']);

        $book = Book::findOrFail($book_status->rent->book->id);  
        $book->rented_count = $book->rented_count - 1;  
        $book->save();

        return to_route('returned-books')->with('return-success', 'Vratili ste knjigu.');
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
