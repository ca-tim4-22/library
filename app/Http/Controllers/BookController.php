<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

use App\Http\Requests\Books\ {
    BookStoreRequest,
    BookUpdateRequest,
};

use App\Models\ {
    Author,
    Book,
    Category,
    Gallery,
    GlobalVariable,
    Rent,
};
use App\Services\BookService;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['librarian-protect'])
        ->except('index', 'show');
        $this->middleware('protect-all');
    }

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->items) {
            $items = $request->items;
            $variable = GlobalVariable::findOrFail(4);
        } else {
            $variable = GlobalVariable::findOrFail(4);
            $items = $variable->value;
        }

        $show_criterium = false;

        $searched_book = $request->trazeno;
        if($searched_book){
            $books = Book::search($request->trazeno)->paginate($items);
            $count = Book::search($request->trazeno)->get()->count();
            if ($count == 0) {
                $show_criterium = true;
            } else {
                $show_criterium = false;
            }
        } else{
            $books = Book::with('cover', 'authors', 'categories', 'rent')->latest('id')->paginate($items);
            $show_criterium = false;
        }

        $show_all = Book::count();
        $count = 0;

        if (Rent::count() > 0) {
        foreach ($books as $book) {
            foreach ($book->rent as $rent) {
                $count = $rent->whereDate('return_date', '<', date('Y-m-d'))->count();
            }
        }} else {
            $count = 0;
        }

        // Default values
        $books = $books;
        $searched = false;
        $error = false;
        $selected_a = [];
        $selected_c = [];
        $id_a = [];
        $id_c = [];
       
        if ($books->count() > 0) {
            $show = true;
        } else {
            $show = false;
        }

        $authors = Author::latest('id')->get();
        $categories = Category::latest('id')->get();

        if (count($authors) && $request->id_author) {
            foreach ($books as $book) {
                foreach ($book->authors as $collection) {
                    $searched = true;
                    $books = $collection->orderBy('id', 'desc')->whereIn('author_id', $request->id_author)->get();
                    $result = $books->count();
                    $ids = $request->id_author;
                    $array = [];
                    foreach ($ids as $id => $val) {
                        $array[] = $val;
                    }
                    $id_a = $ids;
                    $selected_a = Author::whereIn('id', $array)->get();
                    if ($result > 0) {
                        $error = false;
                    } else {
                        $error = true;
                    }
                }
            }
        }

        if (count($categories) && $request->id_category) {
            foreach ($books as $book) {
                foreach ($book->categories as $collection) {
                    $searched = true;
                    $books = $collection->orderBy('id', 'desc')->whereIn('category_id', $request->id_category)->get();
                    $result = $books->count();
                    $ids = $request->id_category;
                    $array = [];
                    foreach ($ids as $id => $val) {
                        $array[] = $val;
                    }
                    $id_c = $ids;
                    $selected_c = Category::whereIn('id', $array)->get();
                    if ($result > 0) {
                        $error = false;
                    } else {
                        $error = true;
                    }
                }
            }
        }

        return view('pages.books.books', compact('books', 
        'count', 'authors', 'categories', 'searched', 'error', 'selected_a', 'selected_c', 'id_a', 'id_c', 'error', 'show', 'items',  'variable', 'show_all', 'searched_book', 'show_criterium',
    ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $models = [
            'categories'=> DB::table('categories')->get(),
            'genres' => DB::table('genres')->get(),
            'authors' => DB::table('authors')->latest()->get(),
            'publishers' => DB::table('publishers')->get(),
            'bindings' => DB::table('bindings')->get(),
            'formats' => DB::table('formats')->get(),
            'languages' => DB::table('languages')->get(),
            'letters' =>DB::table('letters')->get()
        ];

        return view('pages.books.new_book', compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(BookStoreRequest $request, BookService $bookService)
    {
        $validated = $request->validated();

        if ($pdf = $request->pdf) {
           $name = $pdf->getClientOriginalName();
           $pdf->move('storage/pdf', $name); 
           $validated['pdf'] = $name;
        } else {
           $name = null;
        }
        $validated['rented_count'] = 0;
        $validated['reserved_count'] = 0;
        $book = Book::create(collect($validated)->except(['category_id', 'author_id', 'genre_id'])->toArray());
       
        $bookService->foreachStore($request, $book);
        $bookService->imagesStore($request, $book);
        Session::flash('success-book'); 

        return to_route('all-books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Book $book)
    {
        $books = Book::with('rent')->get();
        $rents = Rent::with('rent_status')->where('book_id', $book->id)->get();
        if (Rent::count() > 0) {
            foreach ($books as $booke) {
                foreach ($booke->rent as $rent) {
                    $count = $rent->whereDate('return_date', '<', date('Y-m-d'))->count();
                }
            }
        } else {
        $count = null;
        $text = '0 primjeraka';
        }
        $count = null;

        if (isset($count) && $count > 0 || $count % 10 == 1 && $count % 10 == 11 || $count == 1) {
        $count = $count;
        $text = 'primjerak';
        } elseif (isset($count) && $count > 0 && $count % 10 == 2 || $count % 10 == 3 || $count % 10 == 4) {
        $count = $count;
        $text = 'primjerka';
        } elseif (isset($count) && $count <= 0) {
        $count = null;
        $text = "0 primjeraka";
        } else {
        $count = $count;
        $text = 'primjeraka';
        }

        return view('pages.books.show_book', compact('book', 'count', 'text', 'rents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Book $book)
    {
        $models = [
            'categories'=> DB::table('categories')->get(),
            'genres' => DB::table('genres')->get(),
            'authors' => DB::table('authors')->get(),
            'publishers' => DB::table('publishers')->get(),
            'bindings' => DB::table('bindings')->get(),
            'formats' => DB::table('formats')->get(),
            'languages' => DB::table('languages')->get(),
            'letters' =>DB::table('letters')->get()
        ];

        return view('pages.books.edit_book', compact('book', 'models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BookUpdateRequest $request, $id, BookService $bookService)
    {
        $book = Book::findOrFail($id);  
        $bookService->foreachUpdate($request, $book);
        $bookService->imagesUpdate($request, $book);

        $book->update(collect($request->validated())
        ->except(['category_id', 'author_id', 'genre_id'])
        ->toArray());
        Session::flash('update-book'); 

        return to_route('show-book', $request->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
       
        if ($book->placeholder == 0) {
            foreach ($book->gallery as $photos) {
                foreach ($photos->get() as $photo) {
                    // Preventing if image does not exist in storage
                    $URL = url()->current();

                    if (str_contains($URL, 'tim4') && file_exists('storage/book-covers/' . $photo->photo)) {
                    unlink('storage/book-covers/' . $photo->photo); 
                    $book->delete();
                    } elseif(file_exists('\\storage\\book-covers\\' . $photo->photo)) {
                        $path = '\\storage\\book-covers\\' . $photo->photo;
                        unlink(public_path() . $path); 
                        $book->delete();
                    } else {
                        $book->delete();
                    }
                }
            }
        }
        
        $URL = url()->current();

        if ($book->pdf != 0) {
        // Preventing if pdf does not exist in storage
        if (str_contains($URL, 'tim4') && file_exists('storage/pdf/' . $book->pdf)) {
            unlink('storage/pdf/' . $book->pdf);
        } elseif(file_exists('\\storage\\pdf\\' . $book->pdf)) {
            $path_pdf = '\\storage\\pdf\\' . $book->pdf;
            unlink(public_path() . $path_pdf); 
        }
        }

        if (!str_contains($URL, '/bibliotekari')) {
            Session::flash('book-deleted'); 
            
            return to_route('all-books');
        } 

        return $book->delete();
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;

        $books = Book::whereIn('id', explode(",", $ids))->get();
        $URL = url()->current();

        foreach ($books as $book) {
            if ($book->pdf != 0) {
                // Preventing if pdf does not exist in storage
                if (str_contains($URL, 'tim4')  && file_exists('storage/pdf/' . $book->pdf)) {
                    unlink('storage/pdf/' . $book->pdf);
                } elseif(file_exists('\\storage\\pdf\\' . $book->pdf)) {
                    $path_pdf = '\\storage\\pdf\\' . $book->pdf;
                    unlink(public_path() . $path_pdf); 
                }
                }
        }

        Book::whereIn('id', explode(",", $ids))->delete();
    }

    public function destroyBookPhoto(Request $request, $id) {
       
        $photo = $request->photo;
        $check = Gallery::where('photo', $photo)->first();

        if ($check->cover != 1) {
        Gallery::where('photo', $photo)->delete();
        $URL = url()->current();
        if (str_contains($URL, '127.0.0.1:8000')) {
            $path = '\\storage\\book-covers\\' . $photo;
            unlink(public_path() . $path); 
        } else {
            unlink('storage/book-covers/' . $photo);
        }
        Session::flash('book-photo-deleted'); 
        } else {
            Session::flash('tried-cover'); 
        }

        return back();
    }
}
