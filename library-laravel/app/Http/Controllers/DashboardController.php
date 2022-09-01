<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rent;
use App\Models\ReservationStatuses;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
        $rented_books = Rent::count();
        $reserved_books = User::count();

        if (Rent::count() > 0) {
            foreach ($books as $book) {
                foreach ($book->rent as $rent) {
                    foreach ($rent->rent_status as $collection) {
                       $data2 = $collection;
                    }
                }
            }
            $overdue_books = $data2->book_status->whereDate('return_time', '<', date('Y-m-d'))->count();
        } else {
            $overdue_books = 0;
        }

        $rents = Rent::whereDate('issue_date', today())->get();

        if (count($rents)) {
            foreach ($books as $book) {
                foreach ($book->rent as $collection) {
                    $data = $collection->whereDay('issue_date', date('d'))->orderBy('id', 'desc')->get();
                }
            }
        } else {
            $data = [];
        }

        $data_await = ReservationStatuses::latest('updated_at')->where('status_reservations_id', 3)->get();

        return view('pages.dashboard.dashboard_content', compact('books', 'data', 'rented_books', 'reserved_books', 'overdue_books', 'data_await'));
    }

    public function index_activity() 
    {
        $books = Book::all();
        $librarians = User::latest('id')->where('user_type_id', 2)->get();
        $rents = Rent::all();

        if (count($rents)) {
            foreach ($books as $book) {
                foreach ($book->rent as $collection) {
                    $data = $collection->orderBy('id', 'desc')->get();
                }
            }
        } else {
            $data = [];
        }

        return view('pages.dashboard.dashboard_activity', compact('books', 'librarians', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
