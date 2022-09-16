<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rent;
use App\Models\RentStatus;
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
    public function index(Request $request)
    {
        $books = Book::all();

        $rented_books = RentStatus::where('book_status_id', 1)->count();
        $rented_real = $rented_books;
        $reserved_books = ReservationStatuses::where('status_reservations_id', 1)->count();
        $reserved_real = $reserved_books;

        // Conditions for analytics - fit width
        if ($rented_books >= 300) {
            $rented_books = 320;
        }
        if ($reserved_books >= 300) {
            $reserved_books = 320;
        }

        if (Rent::count() > 0) {
            foreach ($books as $book) {
                foreach ($book->rent as $rent) {
                    foreach ($rent->rent_status as $collection) {
                       $data2 = $collection;
                    }
                }
            }
            $overdue_books = $data2->rent->whereDate('return_date', '<', date('Y-m-d'))->count();
            $overdue_real = $overdue_books;
        } else {
            $overdue_books = 0;
            $overdue_real = 0;
        }

        // Condition for analytics - fit width
        if ($overdue_books >= 300) {
            $overdue_books = 320;
        }

        if (Rent::count() > 0) {
            $rents = Rent::whereDate('issue_date', today())->get();
        } else {
            $rents = [];
        }

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

        return view('pages.dashboard.dashboard_content', compact('books', 'data', 'rented_books', 'reserved_books', 'overdue_books', 'data_await', 
        'rented_real',
        'reserved_real',
        'overdue_real',
    ));
    }

    public function index_activity(Request $request) 
    {
        $books = Book::all();
        $admins = User::latest('id')->where('user_type_id', 2)->get();
        $students = User::latest('id')->where('user_type_id', 1)->get();
        $rents = Rent::all();
        $error = 'false';
        $selected = null;
        $to = null;
        $from = null;
       
        if (count($rents)) {
            foreach ($books as $book) {
                foreach ($book->rent as $collection) {
                    if ($request->id_student) {
                        $data = $collection->orderBy('id', 'desc')->where('borrow_user_id', $request->id_student)->get();
                        $selected = $request->id_student;
                        if($data->count() <= 0) {
                        $error = 'true';
                        } 
                    } elseif ($request->id_admin) {
                        $data = $collection->orderBy('id', 'desc')->where('rent_user_id', $request->id_admin)->get();
                        $selected = $request->id_admin;
                        if($data->count() <= 0) {
                        $error = 'true';
                        }
                    } elseif ($request->id_book) {
                        $data = $collection->orderBy('id', 'desc')->where('book_id', $request->id_book)->get();
                        $selected = $request->id_book;
                        if($data->count() <= 0) {
                        $error = 'true';
                        }
                    } elseif ($request->from && $request->to) {
                        $from = $request->from;
                        $to = $request->to;
                        $data = $collection->orderBy('id', 'desc')->whereBetween('issue_date', [$from, $to])->get();
                        $selected = null;
                        $from = date("d-m-Y", strtotime($from));
                        $to = date("d-m-Y", strtotime($to));
                        if($data->count() <= 0) {
                        $error = 'true';
                        }
                    } else {
                        $data = $collection->orderBy('id', 'desc')->get();
                        $selected = null;
                        $to = null;
                        $from = null;
                    }
                }
            }
        } else {
            $data = [];
        }

        return view('pages.dashboard.dashboard_activity', compact('books', 'admins', 'students', 'data', 'selected', 'from', 'to', 'error'));
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
