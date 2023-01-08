<?php

namespace App\Http\Controllers\Books;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\GlobalVariable;
use App\Models\Rent;
use Illuminate\Http\Request;

class WriteOffController extends Controller
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
    public function index(Book $book)
    {
        $variable = GlobalVariable::whereId(2)->pluck('value')[0];
        $count = $book->rent->where('return_date', '<', now())->count();

        return view('pages.books.write_off.write_off_book',
            compact('book', 'count', 'variable'));
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $book = Book::findOrFail($id);
        $value = $request->input('checkbox');
        Rent::whereIn('borrow_user_id', $value)->delete();
        $book->quantity_count = $book->quantity_count - 1;
        if ($book->rented_count != 0) {
            $book->rented_count = $book->rented_count - 1;
        }
        $book->update();

        return back()->with('write-off',
            'Uspješno ste otpisali primjerak knjige.');
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
