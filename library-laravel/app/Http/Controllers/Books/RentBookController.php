<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\GlobalVariable;
use App\Models\Rent;
use App\Models\RentStatus;
use App\Models\User;
use Carbon\Carbon;
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

       if (RentStatus::where('book_status_id', 1)->count() > 0) {
       foreach ($books as $book) {
            foreach ($book->rent as $rent) {
                foreach ($rent->rent_status as $key) {
                    $data = $key->where('book_status_id', 1)->orderBy('id', 'desc');
                }
            }
           }
       } else {
        $data = 'no-values';
       }

       return view('pages.books.transactions.rent.rented_books', compact('data'));
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
        $books = Book::all();
        $current_one = Carbon::now()->format('Y-m-d');
        $date = Carbon::now()->addDays($variable->value)->format('m-d-Y');
        $current_two = str_replace('-', '/', $date);

        if (Rent::count() > 0) {
        foreach ($books as $book) {
            foreach ($book->rent as $rent) {
                $count = $rent->whereDate('return_date', '<', date('Y-m-d'))->count();
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
            }}
        } else {
            $count = null;
            $text = '0 primjeraka';
        }

        return view('pages.books.transactions.rent.rent_book', compact('students', 'book', 'variable', 'count', 'text', 'current_one', 'current_two'));
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
       // Grabbing return date and formatting it to Y/m/d
       $myDate = $request->input('return_date');

       $book_rent = new Rent();
       $book_rent->book_id = $book->id;
       $book_rent->rent_user_id = $user->id;
       $book_rent->borrow_user_id = $request->input('borrow_user_id');
       $book_rent->issue_date = $request->input('issue_date');
       $book_rent->return_date = Carbon::createFromFormat('m/d/Y', $myDate)->format('Y/m/d');
       $book_rent->save();

       $book->rented_count = $book->rented_count + 1;
       $book->save();

       $rent_status = new RentStatus();
       $rent_status->book_status_id = 1;
       $rent_status->rent_id = $book_rent->id;
       $rent_status->save();

       return to_route('rented-books')->with('rent-success', 'Uspješno ste izdali knjigu!');
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

        return view('pages.books.transactions.rent.rent_info', compact('rent'));
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
