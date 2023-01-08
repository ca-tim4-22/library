<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ {
    Book,
    User
};
use App\Services\CSVService;

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
            'adminToday' => User::whereDate('created_at', today())
                                ->where('user_type_id', 3)->count(),
            'librarianCount' => User::where('user_type_id', 2)->count(),
            'librarianToday' => User::whereDate('created_at', today())
                                    ->where('user_type_id', 2)->count(),
            'studentCount' => User::where('user_type_id', 1)->count(),
            'studentToday' => User::whereDate('created_at', today())
                                  ->where('user_type_id', 2)->count(),
            'bookCount' => Book::count(),
        ];

        return view('pages.settings.extra.statistics', compact('data'));
    }

    public function csvAuthors(Request $request, CSVService $csvService)
    {
        $csvService->csvAuthors($request);

        return back()->with('success', 'Uspješno ste popunili bazu podataka');
    }

    public function csvBooks(Request $request, CSVService $csvService)
    {
        $csvService->csvBooks($request);

        return back()->with('success', 'Uspješno ste popunili bazu podataka');
    }

    public function csvGallery(Request $request, CSVService $csvService)
    {
        $csvService->csvGallery($request);

        return back()->with('success', 'Uspješno ste popunili bazu podataka');
    }

    public function csvBookAuthors(Request $request, CSVService $csvService)
    {
        $csvService->csvBookAuthors($request);

        return back()->with('success', 'Uspješno ste popunili bazu podataka');
    }

    public function csvBookCategories(Request $request, CSVService $csvService)
    {
        $csvService->csvBookCategories($request);

        return back()->with('success', 'Uspješno ste popunili bazu podataka');
    }

    public function csvBookGenres(Request $request, CSVService $csvService)
    {
        $csvService->csvBookGenres($request);

        return back()->with('success', 'Uspješno ste popunili bazu podataka');
    }

    public function readme()
    {
        return view('pages.settings.extra.readme');
    }
}
