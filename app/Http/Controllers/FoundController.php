<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Found;
use App\Category;

class FoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $founds = Found::orderBy('id','asc')->paginate(10);

        return view('found.index')->with('founds', $founds);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');

        return view('found.create')->with('categories', $categories);
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
            'flocation' => 'required',
            'fdate' => 'required',
            'description' => 'required',
            'image' => 'image|nullable'
        ]);

        // Handle File Upload
        if($request->hasFile('image'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $request->file('image')->storeAs('public/found_images', $fileNameToStore);
        }

        //Create Lost Post
        $found = new Found;
        $found->title = $request->input('title');
        $found->category_id = $request->input('category');
        $found->brand = $request->input('brand');
        $found->primary_color = $request->input('pcolor');
        $found->secondary_color = $request->input('scolor');
        $found->location = $request->input('flocation');
        $found->date = $request->input('fdate');
        $found->description = $request->input('description');
        $found->image = $fileNameToStore;
        $found->save();

        return redirect('/founds')->with('success', 'Found Post Created');
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
        $categories = Category::pluck('name', 'id');
        $found = Found::find($id);

        return view('found.edit')->with('found', $found)->with('categories', $categories);
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
            'brand' => 'required',
            'pcolor' => 'required',
            'scolor' => 'required',
            'flocation' => 'required',
            'fdate' => 'required',
            'description' => 'required',
            'image' => 'image|nullable'
        ]);

        // Handle File Upload
        if($request->hasFile('image'))
        {
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $request->file('image')->storeAs('public/found_images', $fileNameToStore);
        }

        //Update Lost Post
        $found = Found::find($id);
        $found->title = $request->input('title');
        $found->category_id = $request->input('category');
        $found->brand = $request->input('brand');
        $found->primary_color = $request->input('pcolor');
        $found->secondary_color = $request->input('scolor');
        $found->location = $request->input('flocation');
        $found->date = $request->input('fdate');
        $found->description = $request->input('description');
        if($request->hasFile('image'))
        {
            if ($found->image != 'noimage.jpg') {
                Storage::delete('public/found_images/'.$found->image);
            }
            $found->image = $fileNameToStore;
        }
        $found->save();

        return redirect('/founds')->with('success', 'Found Post Updated');
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
