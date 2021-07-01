<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lost;
use App\Category;

class LostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $losts = Lost::orderBy('id','asc')->where('status', '!=', 'Solved')->orWhereNull('status')->get();

        return view('lost.index')->with('losts', $losts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
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

        return view('lost.create')->with([
            'categories' => $categories,
            'colors' => $colors,
        ]);
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
            'title' => 'required',
            'category' => 'required',
            'color' => 'required',
            'location' => 'required',
            'ldate' => 'required',
            'description' => 'required'
        ]);

        //Create Lost Post
        $lost = new Lost;
        $lost->title = $request->input('title');
        $lost->category_id = $request->input('category');
        // $lost->brand = $request->input('brand');
        $lost->color = $request->input('color');
        $lost->location = $request->input('location');
        $lost->date = $request->input('ldate');
        $lost->description = $request->input('description');
        $lost->user_id = auth()->user()->id;
        $lost->save();

        return redirect('/profiles/'.auth()->user()->id)->with('success', 'Lost Report is successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lost = Lost::find($id);

        return view('lost.show')->with('lost', $lost);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lost = Lost::find($id);
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');
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
        
        return view('lost.edit')->with([
            'lost' => $lost,
            'categories' => $categories,
            'colors' => $colors,
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
            'title' => 'required',
            'category' => 'required',
            // 'brand' => 'required',
            'color' => 'required',
            'location' => 'required',
            'ldate' => 'required',
            'description' => 'required'
        ]);

        //Update Lost Post
        $lost = Lost::find($id);
        $lost->title = $request->input('title');
        $lost->category_id = $request->input('category');
        // $lost->brand = $request->input('brand');
        $lost->color = $request->input('color');
        $lost->location = $request->input('location');
        $lost->date = $request->input('ldate');
        $lost->description = $request->input('description');
        $lost->save();

        return redirect('/losts/'.$id)->with('success', 'Lost Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lost = Lost::find($id);

        if(auth()->user()->user_level == 'admin' || $lost->user_id == auth()->user()->id) {
            $lost->delete();
            return redirect('/profiles/'.$lost->user_id)->with('success', 'Lost Report Removed');
        } else {
            return redirect()->back()->with('error', 'This action is unauthorized.');
        }
    }

    public function solve($id) {
        $lost = Lost::find($id);

        $lost->status = 'Solved';
        $lost->save();

        return redirect()->back()->with('success', 'This lost report has been set to solved.');
    }

    public function unsolve($id) {
        $lost = Lost::find($id);

        $lost->status = 'Unsolve';
        $lost->save();

        return redirect()->back()->with('success', 'This lost report has been set to unsolve.');
    }
}
