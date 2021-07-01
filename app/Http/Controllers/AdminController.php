<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Lost;
use App\Found;
use DB;
use Carbon\Carbon;
use App\Charts\MonthlyUserChart;
use App\Charts\MonthlyLostChart;
use App\Charts\TopCategoryChart;
use App\Charts\TopFacultyChart;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Monthly User
        $month = ['01','02','03','04','05','06','07','08','09','10','11','12'];
        $users_2021 = [];
        foreach ($month as $key => $value) {
            $users_2021[] = User::where(\DB::raw("DATE_FORMAT(created_at, '%m')"),$value)->where('user_level', 'user')->where('created_at','LIKE',"2021%")->count();
        }
        $muChart = new MonthlyUserChart;
        $muChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $muChart->dataset('2021 No of User', 'line', $users_2021)->options([
            'backgroundColor' => 'rgba(255,0,0,0.4)',
        ]);
        // Monthly Lost
        $losts_2021 = [];
        foreach ($month as $key => $value) {
            $losts_2021[] = Lost::where(\DB::raw("DATE_FORMAT(created_at, '%m')"),$value)->where('created_at','LIKE',"2021%")->count();
        }
        $mlChart = new MonthlyLostChart;
        $mlChart->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']);
        $mlChart->dataset('2021', 'bar', $losts_2021)->options([
            'backgroundColor' => 'rgba(255,92,32)',
        ]);
        // Top Category
        $categories = DB::table('categories')
                        ->join('founds', 'categories.id', '=', 'founds.category_id')
                        ->select('categories.name', DB::raw("count(*) AS total"))
                        ->groupBy('categories.name')
                        ->orderBy('total', 'desc')
                        ->pluck('total', 'categories.name')->take(3);

        $tcChart = new TopCategoryChart;
        $tcChart->labels($categories->keys())->displaylegend(false);
        $tcChart->dataset('Total lost', 'bar', $categories->values())->options([
            'backgroundColor' => [
                'rgba(100,76,135)',
                'rgba(100,150,210)',
                'rgba(125,155,150)',
            ],
            'borderColor' => '#777',
            // 'borderWidth' => '4',
            'hoverBorderColor' => '#000',
            'hoverBorderWidth' => '3',
        ]);

        // Top Faculty Lost
        $faculties = DB::table('users')
        ->join('losts', 'users.id', '=', 'losts.user_id')
        ->select('users.faculty', DB::raw("count(*) AS total"))
        ->groupBy('users.faculty')
        ->orderBy('total', 'desc')
        ->pluck('total', 'users.faculty')->take(3);

        $tfChart = new TopFacultyChart;
        $tfChart->labels($faculties->keys())->displaylegend(true);
        $tfChart->dataset('Total lost', 'pie', $faculties->values())->options([
            'backgroundColor' => [
                'rgba(200,176,175)',
                'rgba(200,120,140)',
                'rgba(225,115,120)',
            ],
        ]);

        $users = User::where('user_level', 'user')->get();
        $losts = Lost::all();
        $founds = Found::all();

        //Check user access control
        if(auth()->user()->user_level == 'user'){
            return redirect('/')->with('error', 'This action is unauthorized.');
        }

        return view('admin.dashboard', compact('muChart', 'mlChart', 'tcChart', 'tfChart'))->with([
            'users' => $users,
            'losts' => $losts,
            'founds' => $founds,
        ]);
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
}
