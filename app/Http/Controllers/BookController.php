<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookCategory;
use App\Models\BookGenre;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\GlobalVariable;
use App\Models\Rent;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'librarian-protect'])
        ->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
        }else{
            $books = Book::latest('id')->paginate($items);
            $show_criterium = false;
        }

        $show_all = Book::latest('id')->count();
      
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

        return view('pages.books.books', compact('books', 'count', 'authors', 'categories', 'searched', 'error', 
        'selected_a', 
        'selected_c', 
        'id_a',
        'id_c',
        'error',
        'show',
        'items', 
        'variable', 
        'show_all',
        'searched_book',
        'show_criterium',
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
    public function store(Request $request)
    {
        $input = Validator::make($request->all(), [
            'title' => 'required',
            'page_count' => 'required',
            'ISBN' => 'required|unique:books',   
            'quantity_count' => 'required',
            'rented_count' => 'required',
            'reserved_count' => 'required',
            'body' => 'required',
            'year' => 'required',
            'category_id' => 'required',
            'genre_id' => 'required',
            'author_id' => 'required',
            'publisher_id' => 'required',
            'language_id' => 'required',
            'letter_id' => 'required',
            'binding_id' => 'required',
            'format_id' => 'required',
            'cover' => 'required',
        ])->safe()->all();

        $category = $request->input('category_id');
        $category = str_replace(['[', ']'], null, $category);
        $categoryIds= explode( ',', $category);

        $genre = $request->input('genre_id');
        $genre = str_replace(['[', ']'], null, $genre);
        $genreIds= explode( ',', $genre);

        $author = $request->input('author_id');
        $author = str_replace(['[', ']'], null, $author);
        $authorIds= explode( ',', $author);

        $pdf = $request->pdf;

        if ($pdf) {
           $name = $pdf->getClientOriginalName();
           $pdf->move('storage/pdf', $name); 
        } else {
           $name = 0;
        }

        $book = new Book();
        $book->title = $request->input('title');
        $book->body = $request->input('body');
        $book->publisher_id = $request->input('publisher_id');
        $book->quantity_count = $request->input('quantity_count');
        $book->page_count = $request->input('page_count');;
        $book->binding_id = $request->input('binding_id');
        $book->letter_id = $request->input('letter_id');
        $book->format_id = $request->input('format_id');
        $book->language_id = $request->input('language_id');
        $book->ISBN = $request->input('ISBN');
        $book->year = $request->input('year');
        $book->pdf =  $name;
        $book->save();

        foreach($categoryIds as $id) {
            BookCategory::create([
                'book_id' => $book->id,
                'category_id' => $id,
            ]);
        }

        foreach($genreIds as $id) {
            BookGenre::create([
                'book_id' => $book->id,
                'genre_id' => $id,
            ]);
        }

        foreach($authorIds as $id) {
            BookAuthor::create([
                'book_id' => $book->id,
                'author_id' => $id,
            ]);
        }
     
        if ($request->file('cover')) {
            $cover = $request->file('cover');
            $name = $cover->getClientOriginalName();
            $cover->move('storage/book-covers', $name);
            DB::table('galleries')->insert([
                'book_id' => $book->id,
                'photo' => $name,
                'cover' => 1,
            ]);
        }


        if ($request->file('photos') && $request->file('cover')) {
            $photos = $request->file('photos');
            foreach ($photos as $photo) {
            $file = $photo;
            $name = $file->getClientOriginalName();
            $file->move('storage/book-covers', $name);
            DB::table('galleries')->insert([
                'book_id' => $book->id,
                'photo' => $name,
                'cover' => 0,
            ]);}
        } 
        FacadesSession::flash('success-book'); 

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
        $book = $book;
        $books = Book::all();

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

        if ($count > 0 || $count % 10 == 1 && $count % 10 == 11 || $count == 1) {
        $count = $count;
        $text = 'primjerak';
        } elseif ($count > 0 && $count % 10 == 2 || $count % 10 == 3 || $count % 10 == 4) {
        $count = $count;
        $text = 'primjerka';
        } elseif ($count <= 0) {
        $count = null;
        $text = "0 primjeraka";
        } else {
        $count = $count;
        $text = 'primjeraka';
        }

        return view('pages.books.show_book', compact('book', 'count', 'text'));
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
    public function update(Request $request, $id)
    {
        $input = Validator::make($request->all(), [
            'title' => 'required|min:2|max:255',
            'page_count' => 'required|min:1|max:1000',
            'ISBN' => 'required|min:13|max:13',
            'quantity_count' => 'required|min:0',
            'rented_count' => 'required|min:0',
            'reserved_count' => 'required|min:0',
            'body' => 'required|min:0|max:255',
            'year' => 'required|min:0',
        ])->safe()->all();

        $book = Book::findOrFail($id);  

        // Categories update
        if ($request->category_id) {
        $category = $request->input('category_id');
        $category = str_replace(['[', ']'], null, $category);
        $categoryIds= explode( ',', $category);
    
        $count = BookCategory::where('category_id', $request->category_id)->count();
        if ($count >= 1) {
            BookCategory::where('category_id', $request->category_id)->delete();
        } else {
            foreach($categoryIds as $id) {
                BookCategory::create
                ([
                    'book_id' => $book->id,
                    'category_id' => $id,
                ]);
        };}}

        // Genres update
        if ($request->genre_id) {
        $genre = $request->input('genre_id');
        $genre = str_replace(['[', ']'], null, $genre);
        $genreIds= explode( ',', $genre);

        $count = BookGenre::where('genre_id', $request->genre_id)->count();
        if ($count >= 1) {
            BookGenre::where('genre_id', $request->genre_id)->delete();
        } else {
            foreach($genreIds as $id) {
                BookGenre::create
                ([
                    'book_id' => $book->id,
                    'genre_id' => $id,
                ]);
        };}}

        // Authors update
        if ($request->author_id) {
        $category = $request->input('author_id');
        $category = str_replace(['[', ']'], null, $category);
        $categoryIds= explode( ',', $category);
        
        $count = BookAuthor::where('author_id', $request->author_id)->count();
        if ($count >= 1) {
            BookAuthor::where('author_id', $request->author_id)->delete();
            foreach($categoryIds as $id) {
                BookAuthor::create
                ([
                    'book_id' => $book->id,
                    'author_id' => $id,
                ]);}

        } else {
            foreach($categoryIds as $id) {
                BookAuthor::create
                ([
                    'book_id' => $book->id,
                    'author_id' => $id,
                ]);
        };}}

        if ($request->file('cover') || $request->file('photos')) {

            if ($request->file('cover')) {

                $cover_old = Gallery::where([
                    'book_id' => $book->id,
                    'cover' => 1,
                ])->first();

                if ($cover_old) {
                    $path = '\\storage\\book-covers\\' . $cover_old->photo;
                    unlink(public_path() . $path); 
                    $cover_old->delete();
                }

                $cover = $request->file('cover');
                $name = $cover->getClientOriginalName();
                $cover->move('storage/book-covers', $name);
                DB::table('galleries')->insert([
                    'book_id' => $book->id,
                    'photo' => $name,
                    'cover' => 1,
                ]);
            } 
    
            if ($request->file('photos')) {

            $photos = $request->file('photos');
            foreach ($photos as $photo) {
            $file = $photo;
            $name = $file->getClientOriginalName();
            $file->move('storage/book-covers', $name);
            DB::table('galleries')->insert([
                'book_id' => $book->id,
                'photo' => $name,
                'cover' => 0,
            ]);}

            }
        } 
        $book->update($input);
        FacadesSession::flash('update-book'); 

        return to_route('show-book', $request->title);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
       
        if ($book->placeholder == 0) {
            foreach ($book->gallery as $photos) {
                foreach ($photos->get() as $photo) {
                    // Preventing if image does not exist in storage
                    if (Storage::disk('local')->has("$photo->photo")) {
                        $path = '\\storage\\book-covers\\' . $photo->photo;
                        unlink(public_path() . $path); 
                        $book->delete();
                    } else {
                        $book->delete();
                    }
                }
            }
        }
        
        if ($book->pdf != 0) {
        $path_pdf = '\\storage\\pdf\\' . $book->pdf;
        unlink(public_path() . $path_pdf); 
        }

        $book->delete();

        $URL = url()->current();
        if (!str_contains($URL, '/bibliotekari')) {
            FacadesSession::flash('book-deleted'); 
            
            return to_route('all-books');
        } 
      
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;

        $books = Book::whereIn('id', explode(",", $ids))->get();
      
        foreach ($books as $book) {
            foreach ($book->gallery as $photos) {
                foreach ($photos->get() as $photo) {
                    if ($book->placeholder == 0) {
                    $path = '\\storage\\book-covers\\' . $photo->photo;
                    unlink(public_path() . $path); 
                    $book->delete();
                   }
                }
            }
        if ($book->pdf != 0) {
            $path_pdf = '\\storage\\pdf\\' . $book->pdf;
            unlink(public_path() . $path_pdf); 
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
        FacadesSession::flash('book-photo-deleted'); 
        } else {
            FacadesSession::flash('tried-cover'); 
        }

        return back();
    }
}
