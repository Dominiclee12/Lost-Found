<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Found;
use App\Category;
// use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // home page doesn't required login
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $founds = Found::orderBy('id', 'DESC')->where('status', null)->orWhere('status', 'Unsolve')->Paginate(12);

        return view('home')->with('founds', $founds);
    }

    // public function catalog(Request $request) {
    //     $categories = Category::all();
    //     // Dunno what this line is used for
    //     // $category_id = DB::table('founds')->select('category_id')->distinct()->get()->pluck('category_id')->sort();
        
    //     $found = Found::query();

    //     if($request->filled('category')) {
    //         $found->where('category_id', $request->category);
    //     }
    //     if($request->filled('pcolor')) {
    //         $found->where('primary_color', $request->pcolor);
    //     }

    //     return view('found.catalog')->with([
    //         'categories' => $categories,
    //         'category_id' => $request->category,
    //         'primary_color' => $request->pcolor,
    //         'founds' => $found->get(),
    //     ]);
    // }

    public function search(){
        $search = request()->query('search');
        $founds = Found::where('title','LIKE',"%{$search}%")->orderBy('id', 'DESC')->paginate(8);
        return view('found.search')->with('founds', $founds);
    }
}
