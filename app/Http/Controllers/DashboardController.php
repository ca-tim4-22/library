<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rent;
use App\Models\RentStatus;
use App\Models\Reservation;
use App\Models\ReservationStatuses;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('protect-all');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $books = Book::all();

        $rented_books = RentStatus::where('book_status_id', 1)->count();
        $rented_real = $rented_books;
        $reserved_books = ReservationStatuses::where('status_reservations_id',
            1)->count();
        $reserved_real = $reserved_books;

        if ($rented_books <= 0) {
            $width = 0;
        } else {
            $width = 300;
        }

        $prefix_yellow = null;
        $prefix_green = null;

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
            $overdue_books = $data2->rent->whereDate('return_date', '<',
                date('Y-m-d'))->count();
            $overdue_real = $overdue_books;

            if ($overdue_books > $rented_books
                && $overdue_books > $reserved_books
            ) {
                $max = 300 / $overdue_books;
                $prefix_yellow = $max * $reserved_books;
                $prefix_green = $max * $rented_books;
            } elseif ($reserved_books > $overdue_books
                      && $reserved_books > $rented_books
            ) {
                $max = 300 / $reserved_books;
                $prefix_yellow = $max * $overdue_books;
                $prefix_green = $max * $rented_books;
            } elseif ($rented_books < $reserved_books
                      && $rented_books < $overdue_books
                      && $reserved_books == $overdue_books
            ) {
                $max = 300 / $overdue_books;
                $prefix_yellow = $max * $reserved_books;
                $prefix_green = $max * $rented_books;
            } else {
                // If there are no active rents - archived only
                if ($rented_books > 0) {
                    $max = 300 / $rented_books;
                } else {
                    $max = 300 / 1;
                }
                if ($reserved_books > $overdue_books) {
                    $prefix_yellow = $max * $reserved_books;
                    $prefix_green = $max * $overdue_books;
                } else {
                    $prefix_yellow = $max * $overdue_books;
                    $prefix_green = $max * $reserved_books;
                }
            }
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
                    $data = $collection->whereDate('issue_date', today())
                                       ->orderBy('id', 'desc')->get();
                }
            }
        } else {
            $data = [];
        }

        if (Reservation::count() > 0) {
            $reservations = Reservation::whereDate('reservation_date', today())
                                       ->get();
        } else {
            $reservations = [];
        }
        if (count($reservations)) {
            foreach ($books as $book) {
                foreach ($book->reservations as $collection) {
                    foreach ($collection->reservations as $collection2) {
                        $data2 = $collection2->where('status_reservations_id',
                            1)->get();
                    }
                }
            }
        } else {
            $data2 = [];
        }

        $data_await = ReservationStatuses::latest('updated_at')
                                         ->where('status_reservations_id', 3)->get();

        return view('pages.dashboard.dashboard_content', compact(
            'books',
            'data',
            'data2',
            'rented_books',
            'reserved_books',
            'overdue_books',
            'data_await',
            'rented_real',
            'reserved_real',
            'overdue_real',
            'prefix_yellow',
            'prefix_green',
            'width',
        ));
    }

    public function index_activity(Request $request)
    {
        $books = Book::all();
        $librarians = User::latest('id')->where('user_type_id', 2)->get();
        $students = User::latest('id')->where('user_type_id', 1)->get();
        $rents = Rent::all();
        // $reservations = Reservation::all();
        $reservations = ReservationStatuses::where('status_reservations_id', 1)
                                           ->get();
        $error = 'false';
        $selected_s = [];
        $selected_l = [];
        $selected_b = [];
        $id_s = 0;
        $id_l = 0;
        $id_b = 0;
        $to = null;
        $from = null;

        if (count($rents)) {
            foreach ($books as $book) {
                foreach ($book->rent as $collection) {
                    if ($request->id_student) {
                        $data = $collection->orderBy('id', 'desc')
                                           ->whereIn('borrow_user_id', $request->id_student)
                                           ->get();
                        $selected_s = User::whereIn('id', $request->id_student)
                                          ->first();
                        $id_s = $selected_s->id;
                        if ($data->count() <= 0) {
                            $error = 'true';
                        }
                        $reservations = null;
                    } elseif ($request->id_librarian) {
                        $data = $collection->orderBy('id', 'desc')
                                           ->whereIn('rent_user_id', $request->id_librarian)
                                           ->get();
                        $selected_l = User::whereIn('id',
                            $request->id_librarian)->first();
                        $id_l = $selected_l->id;
                        if ($data->count() <= 0) {
                            $error = 'true';
                        }
                        $reservations = null;
                    } elseif ($request->id_book) {
                        $data = $collection->orderBy('id', 'desc')
                                           ->whereIn('book_id', $request->id_book)->get();
                        $selected_b = Book::whereIn('id', $request->id_book)
                                          ->first();
                        $id_b = $selected_b->id;
                        if ($data->count() <= 0) {
                            $error = 'true';
                        }
                        $reservations = null;
                    } elseif ($request->from && $request->to) {
                        $from = $request->from;
                        $to = $request->to;
                        $data = $collection->orderBy('id', 'desc')
                                           ->whereBetween('issue_date', [$from, $to])->get();
                        $from = date("d-m-Y", strtotime($from));
                        $to = date("d-m-Y", strtotime($to));
                        if ($data->count() <= 0) {
                            $error = 'true';
                        }
                        $reservations = null;
                    } else {
                        $data = $collection->orderBy('id', 'desc')->get();
                        $to = null;
                        $from = null;
                    }
                }
            }
        } else {
            $data = [];
        }

        return view('pages.dashboard.dashboard_activity',
            compact('books', 'librarians', 'students', 'data', 'from', 'to',
                'error',
                'selected_s',
                'selected_l',
                'selected_b',
                'id_s',
                'id_l',
                'id_b',
                'reservations',
            ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->noContent();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->noContent();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->noContent();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->noContent();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->noContent();
    }
}
