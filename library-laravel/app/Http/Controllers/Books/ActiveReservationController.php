<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\ReservationStatuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActiveReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_true = ReservationStatuses::latest('updated_at')->where('status_reservations_id', 1)->get();
        $data_false = ReservationStatuses::latest('updated_at')->where('status_reservations_id', 2)->get();
        $data_await = ReservationStatuses::latest('updated_at')->where('status_reservations_id', 3)->get();
        
        return view('pages.books.transactions.reservation.active_reservations', compact('data_true', 'data_false', 'data_await'));
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

    public function approve(Request $request, $id) {
        $input = $request->all();

        DB::table('reservation_statuses')->where('id', $id)->update([
            'status_reservations_id' => 1,
            'updated_at' => now(),
        ]);

        return back();
    }

    public function deny(Request $request, $id) {
        $input = $request->all();

        DB::table('reservation_statuses')->where('id', $id)->update([
            'status_reservations_id' => 2,
            'updated_at' => now(),
        ]);

        return back();
    }
}
