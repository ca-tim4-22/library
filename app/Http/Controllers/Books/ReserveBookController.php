<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Http\Requests\Books\ReserveBookRequest;
use App\Models\Book;
use App\Models\GlobalVariable;
use App\Models\Reservation;
use App\Models\ReservationStatuses;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReserveBookController extends Controller
{
    public function __construct()
    {
        $this->middleware('protect-all');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->noContent();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Book $book)
    {
        $students = User::where('user_type_id', 1)->latest()->get();
        $variable = GlobalVariable::findOrFail(1);
        $max_date = Carbon::now()->addDays($variable->value)->format('Y-m-d');
        $today = Carbon::now()->format('Y-m-d');

        return view('pages.books.transactions.reservation.reserve_book', compact('book', 'students', 'variable', 'max_date', 'today'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ReserveBookRequest $request, $id)
    {
        $user = Auth::user();

        $reservation_old = Reservation::where('reservationMadeFor_user_id', $request->reservationMadeFor_user_id)->latest('id')->first();
        if ($reservation_old) {
            $check = ReservationStatuses::where('reservation_id', $reservation_old->id)->latest('id')->first();
            if ($check->status_reservations_id == 2 || $check->status_reservations_id == 4 || $check->status_reservations_id == 5) {
                $status = true;
            } else {
                $status = false;
            }
        } else {
            $status = true;
        }

        if ($status == true) {
            $variable = GlobalVariable::findOrFail(1);

            $reservation = new Reservation();
            $reservation->book_id = $id;
            $reservation->reservationMadeFor_user_id = $request->input('reservationMadeFor_user_id');
            $reservation->reservationMadeBy_user_id = $user->id;
            $reservation->reservation_date = $request->input('reservation_date');
            $reservation->request_date = Carbon::parse($reservation->reservation_date)->addDays($variable->value);
            $reservation->save();
    
            if ($user->type->id == 2 || $user->type->id == 3) {
                DB::table('reservation_statuses')->insert([
                    'reservation_id' => $reservation->id,
                    'status_reservations_id' => 1,
                    'created_at' => Carbon::now(),
                ]);
            } else {
                DB::table('reservation_statuses')->insert([
                    'reservation_id' => $reservation->id,
                    'status_reservations_id' => 3,
                    'created_at' => Carbon::now(),
                ]);
            }
        } else {
            return back()->with('reservation-failed', 'Već postoje rezervacije sa Vašim imenom!');
        }

        if ($user->type->id == 1) {
            return back()->with('reservation-sent', 'Vaša rezervacija je za sada na čekanju!');
        } else {
            if ($user->type->id == 2 || $user->type->id == 3) {
                return to_route('active-reservations')->with('reserve-success', 'Rezervisali ste knjigu!');
            } else {
                return to_route('active-reservations')->with('reserve-success', 'Rezervacija je na čekanju!');
            }
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
        return response()->noContent();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->noContent();
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
        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return response()->noContent();
    }
}
