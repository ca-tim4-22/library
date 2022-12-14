<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\ReservationStatuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActiveReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['protect-all', 'librarian-protect']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $is_null = ReservationStatuses::where('status_reservations_id', 1)
        ->orWhere('status_reservations_id', 3)
        ->count();

        $data_true = ReservationStatuses::latest('updated_at')->where('status_reservations_id', 1)->get();
        $data_await = ReservationStatuses::latest('updated_at')->where('status_reservations_id', 3)->get();
        
        return view('pages.books.transactions.reservation.active_reservations', compact('data_true', 'data_await', 'is_null'));
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
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);

        return view('pages.books.transactions.reservation.reservation_info', compact('reservation'));
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

    public function approve(Request $request, $id) {
        $input = $request->all();

        DB::table('reservation_statuses')->where('id', $id)->update([
            'status_reservations_id' => 1,
            'updated_at' => now(),
        ]);

        // Add reserved count to a reserved book
        $status = ReservationStatuses::find($id);
        
        $save = $status->reservation->book->update([
            'reserved_count' => $status->reservation->book->reserved_count + 1,
        ]);

        return back()->with('approve', 'Rezervacija je prihvaćena.');
    }

    public function deny(Request $request, $id) {
        $input = $request->all();

        DB::table('reservation_statuses')->where('id', $id)->update([
            'status_reservations_id' => 2,
            'updated_at' => now(),
        ]);

        return back()->with('deny', 'Rezervacija je odbijena.');
    }
}
