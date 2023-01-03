<?php

namespace App\Services;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookCategory;
use App\Models\BookGenre;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\GlobalVariable;
use DB;
use Illuminate\Http\Request;
use Session;

class BookService
{
    public function imagesStore(Request $request, $book) {
        if ($request->file('cover')->isValid()) {
            $cover = $request->file('cover');
            $name = $cover->getClientOriginalName();
            $cover->move('storage/book-covers', $name);
            DB::table('galleries')->insert([
                'book_id' => $book->id,
                'photo' => $name,
                'cover' => 1,
            ]);
        }

        if ($request->hasFile('photos') && $request->hasFile('cover')) {
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

    public function imagesUpdate(Request $request, $book) {
        if ($request->hasFile('cover') || $request->hasFile('photos')) {
            if ($request->hasFile('cover')) {
                $cover_old = Gallery::where([
                    'book_id' => $book->id,
                    'cover' => 1,
                ])->first();
                if ($cover_old) {
                    $URL = url()->current();
                    if (str_contains($URL, 'tim4') && file_exists('storage/book-covers/' . $cover_old->photo)) {
                        unlink('storage/book-covers/' . $cover_old->photo);
                    } elseif(!str_contains($URL, 'tim4')) {
                        $path = '\\storage\\book-covers\\' . $cover_old->photo;
                        unlink(public_path() . $path);
                    }
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
    
            if ($request->hasFile('photos')) {
            $photos = $request->file('photos');
            foreach ($photos as $photo) {
            $file = $photo;
            $name = $file->getClientOriginalName();
            $file->move('storage/book-covers', $name);
            DB::table('galleries')->insert([
                'book_id' => $book->id,
                'photo' => $name,
                'cover' => 0,
            ]);
        }}}  
    }

    public function foreachStore(Request $request, $book) {
        $category = $request->category_id;
        $category = str_replace(['[', ']'], [], $category);
        $categoryIds= explode( ',', $category);

        $genre = $request->genre_id;
        $genre = str_replace(['[', ']'], [], $genre);
        $genreIds= explode( ',', $genre);

        $author = $request->author_id;
        $author = str_replace(['[', ']'], [], $author);
        $authorIds= explode( ',', $author);

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
    }

    public function foreachUpdate(Request $request, $book) {
        // Categories update
        if ($request->category_id) {
            $category = $request->input('category_id');
            $category = str_replace(['[', ']'], [], $category);
            $categoryIds= explode( ',', $category);
            $count = BookCategory::where('category_id', $request->category_id)->count();
            if ($count >= 1) {
                BookCategory::where('category_id', $request->category_id)->delete();
            } else {
                foreach($categoryIds as $id) {
                    BookCategory::create([
                        'book_id' => $book->id,
                        'category_id' => $id,
                    ]);
            };}}
    
            // Genres update
            if ($request->genre_id) {
            $genre = $request->input('genre_id');
            $genre = str_replace(['[', ']'], [], $genre);
            $genreIds= explode( ',', $genre);
            $count = BookGenre::where('genre_id', $request->genre_id)->count();
            if ($count >= 1) {
                BookGenre::where('genre_id', $request->genre_id)->delete();
            } else {
                foreach($genreIds as $id) {
                    BookGenre::create([
                        'book_id' => $book->id,
                        'genre_id' => $id,
                    ]);
            };}}
    
            // Authors update
            if ($request->author_id) {
            $category = $request->input('author_id');
            $category = str_replace(['[', ']'], [], $category);
            $categoryIds= explode( ',', $category);
            $count = BookAuthor::where('author_id', $request->author_id)->count();
            if ($count >= 1) {
                BookAuthor::where('author_id', $request->author_id)->delete();
                foreach($categoryIds as $id) {
                    BookAuthor::create([
                        'book_id' => $book->id,
                        'author_id' => $id,
                    ]);}
    
            } else {
                foreach($categoryIds as $id) {
                    BookAuthor::create([
                        'book_id' => $book->id,
                        'author_id' => $id,
                    ]);
            };}}
    
    }

    public function index(Request $request, $books, $authors, $categories) {

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
                    $books = $collection->orderBy('id', 'desc')->whereIn('category_id',$request->id_category)->get();
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
    }

    public function destroyBook($book) {
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

        if ($book->pdf != 0) {
        // Preventing if pdf does not exist in storage
        if (str_contains($URL, 'tim4') && file_exists('storage/pdf/' . $book->pdf)) {
            unlink('storage/pdf/' . $book->pdf);
        } elseif(file_exists('\\storage\\pdf\\' . $book->pdf)) {
            $path_pdf = '\\storage\\pdf\\' . $book->pdf;
            unlink(public_path() . $path_pdf); 
        }
        }
    }

    public function destroyMultiple($ids) {
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
    }

    public function destroyPhoto($check, $photo) {
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
    }
}