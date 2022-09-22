<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookCategory;
use App\Models\BookGenre;
use App\Models\Gallery;
use Illuminate\Http\Request;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.settings.extra.settings-extra');
    }

    function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;
    
        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
    
        return $data;
    }

    public function csvAuthors(Request $request) {
        $input = $request->validate([
            'csv_author' => 'required|mimes:csv,txt',
        ]);
        
        $get_file = $request->file('csv_author');
        $name = $get_file->getClientOriginalName();
        $store = $get_file->move('csv', $name);
    
        $file = public_path('csv\\' . $name);
       
        $customerArr = $this->csvToArray($file);
    
        for ($i = 0; $i < count($customerArr); $i ++)
        {
            Author::firstOrCreate($customerArr[$i]);
        }
        unlink('csv\\' . $name);
        
        return back()->with('success', 'Uspješno ste popunili bazu podataka');    
    }

    public function csvBooks(Request $request) {
        $input = $request->validate([
            'csv_book' => 'required',
        ]);
        
        $get_file = $request->file('csv_book');
        $name = $get_file->getClientOriginalName();
        $store = $get_file->move('csv', $name);
    
        $file = public_path('csv\\' . $name);
       
        $customerArr = $this->csvToArray($file);
    
        for ($i = 0; $i < count($customerArr); $i ++)
        {
            Book::firstOrCreate($customerArr[$i]);
        }
        unlink('csv\\' . $name);
        
        return back()->with('success', 'Uspješno ste popunili bazu podataka');    
    }

    public function csvGallery(Request $request) {
        $input = $request->validate([
            'csv_gallery' => 'required',
        ]);
        
        $get_file = $request->file('csv_gallery');
        $name = $get_file->getClientOriginalName();
        $store = $get_file->move('csv', $name);
    
        $file = public_path('csv\\' . $name);
       
        $customerArr = $this->csvToArray($file);
    
        for ($i = 0; $i < count($customerArr); $i ++)
        {
            Gallery::firstOrCreate($customerArr[$i]);
        }
        unlink('csv\\' . $name);
        
        return back()->with('success', 'Uspješno ste popunili bazu podataka');    
    }

    public function csvBookAuthors(Request $request) {
        $input = $request->validate([
            'csv_book_author' => 'required|mimes:csv,txt',
        ]);
        
        $get_file = $request->file('csv_book_author');
        $name = $get_file->getClientOriginalName();
        $store = $get_file->move('csv', $name);
    
        $file = public_path('csv\\' . $name);
       
        $customerArr = $this->csvToArray($file);
    
        for ($i = 0; $i < count($customerArr); $i ++)
        {
            BookAuthor::firstOrCreate($customerArr[$i]);
        }
        unlink('csv\\' . $name);
        
        return back()->with('success', 'Uspješno ste popunili bazu podataka');    
    }

    public function csvBookCategories(Request $request) {
        $input = $request->validate([
            'csv_book_category' => 'required',
        ]);
        
        $get_file = $request->file('csv_book_category');
        $name = $get_file->getClientOriginalName();
        $store = $get_file->move('csv', $name);
    
        $file = public_path('csv\\' . $name);
       
        $customerArr = $this->csvToArray($file);
    
        for ($i = 0; $i < count($customerArr); $i ++)
        {
            BookCategory::firstOrCreate($customerArr[$i]);
        }
        unlink('csv\\' . $name);
        
        return back()->with('success', 'Uspješno ste popunili bazu podataka');    
    }

    public function csvBookGenres(Request $request) {
        $input = $request->validate([
            'csv_book_genre' => 'required',
        ]);
        
        $get_file = $request->file('csv_book_genre');
        $name = $get_file->getClientOriginalName();
        $store = $get_file->move('csv', $name);
    
        $file = public_path('csv\\' . $name);
       
        $customerArr = $this->csvToArray($file);
    
        for ($i = 0; $i < count($customerArr); $i ++)
        {
            BookGenre::firstOrCreate($customerArr[$i]);
        }
        unlink('csv\\' . $name);
        
        return back()->with('success', 'Uspješno ste popunili bazu podataka');    
    }

}
