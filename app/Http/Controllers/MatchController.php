<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\SendConfirmation;
use App\Found;
use App\Lost;
use Carbon\Carbon;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $founds = Found::orderBy('id','asc')->whereDate('created_at', '>=', Carbon::now()->subDays(90))->paginate(18);

        return view('match.index')->with([
            'founds' => $founds,
        ]);
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
        $found = Found::find($id);
        //Matching Possible (color, category, date)
        $losts = Lost::query()->where('color', $found->color)->where('category_id', $found->category->id)->whereDate('date', '<=', date($found->date))->where('status', '!=', 'Solved')->get();
        return view('match.show')->with([
            'found' => $found,
            'losts' => $losts,
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

    public function compare($found_id, $lost_id)
    {
        $found = Found::find($found_id);
        $lost = Lost::find($lost_id);

        return view('match.compare')->with([
            'found' => $found,
            'lost' => $lost,
        ]);
    }

    public function sendConfirmation($found_id, $lost_id)
    {
        $lost = Lost::find($lost_id);
        $lost->user->notify(new sendConfirmation(Found::find($found_id)));

        return redirect('found-compare/'.$found_id.'/'.$lost_id)->with('success', 'Confirmation is sent');
    }
}
