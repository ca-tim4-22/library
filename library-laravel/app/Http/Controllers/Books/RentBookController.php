<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\GlobalVariable;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentBookController extends Controller
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

        // foreach ($books as $book) {
        //     $data = $book->rent()->paginate(5);
        // }

        if (count($rents)) {
            foreach ($books as $book) {
                foreach ($book->rent as $collection) {
                    $data = $collection->orderBy('id', 'desc')->paginate(5);
                }
            }
        } else {
            $data = [];
        }

        return view('pages.books.transactions.rent.rented_books', compact('books', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $students = User::where('user_type_id', 1)->get();
        $book = Book::findOrFail($id);
        $variable = GlobalVariable::findOrFail(2);

        return view('pages.books.transactions.rent.rent_book', compact('students', 'book', 'variable'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
       $input = $request->all();
       $book = Book::findOrFail($id);
       $user = Auth::user();

       $book_rent = new Rent();
       $book_rent->book_id = $book->id;
       $book_rent->rent_user_id = $user->id;
       $book_rent->borrow_user_id = $request->input('borrow_user_id');;
       $book_rent->issue_date = $request->input('issue_date');;
       $book_rent->return_date = $request->input('return_date');;
       $book_rent->save();

       $book->rented_count = $book->rented_count + 1;
       $book->save();

    //    $rent_status = new RentStatus();
    //    $rent_status->rent_id = '1';
    //    $rent_status->book_status_id = '1';
    //    $rent_status->date = '1';
    //    $rent_status->save();

       return to_route('rented-books')->with('rented-book', 'Uspješno ste iznajmili knjigu!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
