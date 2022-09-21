<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Http\Requests\Book\ReserveBookRequest;
use App\Models\Book;
use App\Models\GlobalVariable;
use App\Models\Reservation;
use App\Models\ReservationStatuses;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReserveBookController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Book $book)
    {
        $students = User::where('user_type_id', 1)->get();
        $variable = GlobalVariable::findOrFail(1);
        $max_date = Carbon::now()->addDays($variable->value)->format('Y-m-d');
        $today = Carbon::now()->format('Y-m-d');

        return view('pages.books.transactions.reservation.reserve_book', compact('book', 'students', 'variable', 'max_date', 'today'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReserveBookRequest $request, $id)
    {
        $user = Auth::user();
        $reservation = Reservation::where('reservationMadeFor_user_id', $request->reservationMadeFor_user_id)->count();
        if ($reservation == 0) {
            $variable = GlobalVariable::findOrFail(1);

            $reservation = new Reservation();
            $reservation->book_id = $id;
            $reservation->reservationMadeFor_user_id = $request->input('reservationMadeFor_user_id');
            $reservation->reservationMadeBy_user_id = $user->id;
            $reservation->reservation_date = $request->input('reservation_date');
            $reservation->request_date = Carbon::parse($reservation->reservation_date)->addDays($variable->value);
            $reservation->save();
    
            DB::table('reservation_statuses')->insert([
                'reservation_id' => $reservation->id,
                'status_reservations_id' => 3,
            ]);
        } else {
            return back()->with('reservation-failed', 'Već postoje rezervacije sa Vašim imenom!');
        }

        if ($user->type->id == 1) {
            return back()->with('reservation-sent', 'Uspješno! Vaša rezervacija je za sada na čekanju!');
        } else {
            return to_route('active-reservations')->with('reserve-success', 'Rezervacija je na čekanju!');
        }
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
