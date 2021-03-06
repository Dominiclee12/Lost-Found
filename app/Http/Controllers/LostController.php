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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('lost.create')->with('categories', $categories);
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
            'brand' => 'required',
            'pcolor' => 'required',
            'scolor' => 'required',
            'llocation' => 'required',
            'ldate' => 'required',
            'description' => 'required'
        ]);

        //Create Lost Post
        $lost = new Lost;
        $lost->title = $request->input('title');
        $lost->category = $request->input('category');
        $lost->brand = $request->input('brand');
        $lost->primary_color = $request->input('pcolor');
        $lost->secondary_color = $request->input('scolor');
        $lost->location = $request->input('llocation');
        $lost->date = $request->input('ldate');
        $lost->description = $request->input('description');
        $lost->save();

        return redirect('/')->with('success', 'Lost Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
