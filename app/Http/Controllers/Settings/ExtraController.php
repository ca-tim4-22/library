<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ {
    Author,
    Book,
    BookAuthor,
    BookCategory,
    BookGenre,
    Gallery,
    User
};

class ExtraController extends Controller
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
    public function index()
    {
        return view('pages.settings.extra.settings-extra');
    }

    public function indexStatistics()
    {
        $data = [
        'adminCount' => User::where('user_type_id', 3)->count(),
        'adminToday' => User::whereDate('created_at', today())->where('user_type_id', 3)->count(),
        'librarianCount' => User::where('user_type_id', 2)->count(),
        'librarianToday' => User::whereDate('created_at', today())->where('user_type_id', 2)->count(),
        'studentCount' => User::where('user_type_id', 1)->count(),
        'studentToday' => User::whereDate('created_at', today())->where('user_type_id', 2)->count(),
        'bookCount' => Book::count(),
        ];
    
        return view('pages.settings.extra.statistics', compact('data'));
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
        $URL = url()->current();

        if (str_contains($URL, 'tim4')) {
            $file = 'csv/' . $name;
        } else {
            $file = public_path('csv\\' . $name);
        }

        $customerArr = $this->csvToArray($file);
    
        for ($i = 0; $i < count($customerArr); $i ++)
        {
            Author::firstOrCreate($customerArr[$i]);
        }

        if (str_contains($URL, 'tim4')) {
            unlink('csv/' . $name);
        } else {
            unlink('csv\\' . $name);
        }
        
        return back()->with('success', 'Uspješno ste popunili bazu podataka');    
    }

    public function csvBooks(Request $request) {
        $input = $request->validate([
            'csv_book' => 'required|mimes:csv,txt',
        ]);
        
        $get_file = $request->file('csv_book');
        $name = $get_file->getClientOriginalName();
        $store = $get_file->move('csv', $name);
        $URL = url()->current();

        if (str_contains($URL, 'tim4')) {
            $file = 'csv/' . $name;
        } else {
            $file = public_path('csv\\' . $name);
        }
       
        $customerArr = $this->csvToArray($file);
    
        for ($i = 0; $i < count($customerArr); $i ++)
        {
            Book::firstOrCreate($customerArr[$i]);
        }
        
        if (str_contains($URL, 'tim4')) {
            unlink('csv/' . $name);
        } else {
            unlink('csv\\' . $name);
        }
        
        return back()->with('success', 'Uspješno ste popunili bazu podataka');    
    }

    public function csvGallery(Request $request) {
        $input = $request->validate([
            'csv_gallery' => 'required|mimes:csv,txt',
        ]);
        
        $get_file = $request->file('csv_gallery');
        $name = $get_file->getClientOriginalName();
        $store = $get_file->move('csv', $name);
        $URL = url()->current();

        if (str_contains($URL, 'tim4')) {
            $file = 'csv/' . $name;
        } else {
            $file = public_path('csv\\' . $name);
        }
       
        $customerArr = $this->csvToArray($file);
    
        for ($i = 0; $i < count($customerArr); $i ++)
        {
            Gallery::firstOrCreate($customerArr[$i]);
        }
        
        if (str_contains($URL, 'tim4')) {
            unlink('csv/' . $name);
        } else {
            unlink('csv\\' . $name);
        }
        
        return back()->with('success', 'Uspješno ste popunili bazu podataka');    
    }

    public function csvBookAuthors(Request $request) {
        $input = $request->validate([
            'csv_book_author' => 'required|mimes:csv,txt',
        ]);
        
        $get_file = $request->file('csv_book_author');
        $name = $get_file->getClientOriginalName();
        $store = $get_file->move('csv', $name);
        $URL = url()->current();

        if (str_contains($URL, 'tim4')) {
            $file = 'csv/' . $name;
        } else {
            $file = public_path('csv\\' . $name);
        }
       
        $customerArr = $this->csvToArray($file);
    
        for ($i = 0; $i < count($customerArr); $i ++)
        {
            BookAuthor::firstOrCreate($customerArr[$i]);
        }
        
        if (str_contains($URL, 'tim4')) {
            unlink('csv/' . $name);
        } else {
            unlink('csv\\' . $name);
        }
        
        return back()->with('success', 'Uspješno ste popunili bazu podataka');    
    }

    public function csvBookCategories(Request $request) {
        $input = $request->validate([
            'csv_book_category' => 'required|mimes:csv,txt',
        ]);
        
        $get_file = $request->file('csv_book_category');
        $name = $get_file->getClientOriginalName();
        $store = $get_file->move('csv', $name);
        $URL = url()->current();

        if (str_contains($URL, 'tim4')) {
            $file = 'csv/' . $name;
        } else {
            $file = public_path('csv\\' . $name);
        }
        $customerArr = $this->csvToArray($file);
    
        for ($i = 0; $i < count($customerArr); $i ++)
        {
            BookCategory::firstOrCreate($customerArr[$i]);
        }
    
        if (str_contains($URL, 'tim4')) {
            unlink('csv/' . $name);
        } else {
            unlink('csv\\' . $name);
        }
        
        return back()->with('success', 'Uspješno ste popunili bazu podataka');    
    }

    public function csvBookGenres(Request $request) {
        $input = $request->validate([
            'csv_book_genre' => 'required|mimes:csv,txt',
        ]);
        
        $get_file = $request->file('csv_book_genre');
        $name = $get_file->getClientOriginalName();
        $store = $get_file->move('csv', $name);
        $URL = url()->current();

        if (str_contains($URL, 'tim4')) {
            $file = 'csv/' . $name;
        } else {
            $file = public_path('csv\\' . $name);
        }
       
        $customerArr = $this->csvToArray($file);
    
        for ($i = 0; $i < count($customerArr); $i ++)
        {
            BookGenre::firstOrCreate($customerArr[$i]);
        }
       
        if (str_contains($URL, 'tim4')) {
            unlink('csv/' . $name);
        } else {
            unlink('csv\\' . $name);
        }
        
        return back()->with('success', 'Uspješno ste popunili bazu podataka');    
    }

    public function readme() {
        return view('pages.settings.extra.readme');
    }

}
