<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ClaimApproved;
use App\Notifications\ClaimRejected;
use App\User;
use App\Claim;
use App\Found;

class ClaimController extends Controller
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
        $claims = Claim::where('user_id', auth()->user()->id)->get();

        return view('claim.index')->with('claims', $claims);
    }

    // Display Claim Request from Students
    public function claimRequest($id)
    {
        $claims = Claim::where('found_id', $id)->where('status', 'Pending')->paginate(10);
        $found = Found::find($id);
        return view('claim.ashow')->with([
            'claims' => $claims,
            'found' => $found
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
        $this->validate($request, [
            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required',
        ]);

        //Create Claim Post
        $claim = new Claim;
        $claim->answer_one = $request->input('question1');
        $claim->answer_two = $request->input('question2');
        $claim->answer_three = $request->input('question3');
        $claim->user_id = auth()->user()->id;
        $claim->found_id = $request->input('found_id');
        $claim->save();

        return redirect('/founds/'.$request->input('found_id'))->with('success', 'Claim request is sent.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $claim = Claim::find($id);

        return view('claim.show')->with('claim', $claim);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $claim = Claim::find($id);
        $colors = [
            'Red' => 'Red',
            'Orange' => 'Orange',
            'Yellow' => 'Yellow',
            'Green' => 'Green',
            'Blue' => 'Blue',
            'Purple' => 'Purple',
            'Brown' => 'Brown',
            'Black' => 'Black',
            'White' => 'White',
            'Gray' => 'Gray',
        ];

        return view('claim.edit')->with([
            'claim' => $claim,
            'colors' => $colors
        ]);
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
        $this->validate($request, [
            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required',
        ]);

        //Create Claim Post
        $claim = Claim::find($id);
        $claim->answer_one = $request->input('question1');
        $claim->answer_two = $request->input('question2');
        $claim->answer_three = $request->input('question3');
        $claim->save();

        return redirect('/claims/'.$id)->with('success', 'Claim request is updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $claim = Claim::find($id);

        if(auth()->user()->id == $claim->user_id) {
            $claim->delete();
            return redirect('/claims')->with('success', 'Claim Request Removed');
        } else {
            return redirect()->back()->with('error', 'This action is unauthorized.');
        }
    }

    //Claim Approval
    public function approve($id)
    {
        $claim = Claim::find($id);
        $claim->status = "Approved";
        
        // Sending Email Notification
        $claim->user->notify(new ClaimApproved($claim));
        $claim->save();

        // Create a Claim Receipt here?

        return redirect('/claim-requests/'.$claim->found_id)->with('success', 'Claim Request Approved');
    }

    public function reject($id)
    {
        $claim = Claim::find($id);
        $claim->status = "Rejected";

        // Sending Email Notification
        $claim->user->notify(new ClaimRejected($claim));
        $claim->save();

        return redirect('/claim-requests/'.$claim->found_id)->with('success', 'Claim Request Rejected');
    }

    public function receipt($id)
    {
        $claim = Claim::find($id);
        return view('claim.receipt', compact('claim'));
    }
}
