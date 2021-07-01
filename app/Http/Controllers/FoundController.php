<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Found;
use App\Lost;
use App\Category;
use App\Claim;
use DB;

class FoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $founds = Found::orderBy('id','asc')->get();

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

        return view('found.create')->with([
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
            'brand' => 'required',
            'color' => 'required',
            'location' => 'required',
            'fdate' => 'required',
            'description' => 'required',
            'images' => 'required',
            'images.*' => 'mimes:jpg,png|max:2048',            
        ]);

        //Create Lost Post
        $found = new Found;
        $found->title = $request->input('title');
        $found->category_id = $request->input('category');
        $found->brand = $request->input('brand');
        $found->color = $request->input('color');
        $found->location = $request->input('location');
        $found->date = $request->input('fdate');
        $found->description = $request->input('description');
        $found->user_id = auth()->user()->id;
        // $found->image = $fileNameToStore;
        $found->save();

        // Handle File Upload
        if($request->hasFile('images'))
        {
            $files = $request->file('images');
            foreach ($files as $file) {
                $name = time().'-'.$file->getClientOriginalName();
                $name = str_replace(' ','-',$name);
                $file->storeAs('public/found_images', $name);
                $found->images()->create(['name'=>$name]);
            }
            // Get filename with the extension
            // $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            // $filename = pathInfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            // $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            // $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            // $request->file('image')->storeAs('public/found_images', $fileNameToStore);
        }

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
        $found = Found::find($id);
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

        return view('found.show')->with([
            'found' => $found,
            'colors' => $colors,
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
        $found = Found::find($id);

        return view('found.edit')->with([
            'found' => $found,
            'colors' => $colors,
            'categories' => $categories
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
            'brand' => 'required',
            'color' => 'required',
            'location' => 'required',
            'fdate' => 'required',
            'description' => 'required',
            'images.*' => 'mimes:jpg,png|max:2048',
        ]);

        //Update Lost Post
        $found = Found::find($id);
        $found->title = $request->input('title');
        $found->category_id = $request->input('category');
        $found->brand = $request->input('brand');
        $found->color = $request->input('color');
        $found->location = $request->input('location');
        $found->date = $request->input('fdate');
        $found->description = $request->input('description');
        // Handle File Upload
        if($request->hasFile('images'))
        {
            // Delete Old Files in Storage and Table
            foreach($found->images as $image) {
                Storage::delete('public/found_images/'.$image->name);
                DB::table('found_images')->delete($image->id);
            }
            // Save New Files
            $files = $request->file('images');
            foreach ($files as $file) {
                $name = time().'-'.$file->getClientOriginalName();
                $name = str_replace(' ','-',$name);
                $file->storeAs('public/found_images', $name);
                $found->images()->create(['name'=>$name]);
            }
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
        $found = Found::find($id);

        if(auth()->user()->user_level != 'user') {
            //Delete photo in storage
            foreach($found->images as $image) {
                Storage::delete('public/found_images/'.$image->name);
            }
            $found->delete();
            return redirect('/founds')->with('success', 'Found Post Removed');
        } else {
            return redirect()->back()->with('error', 'This action is unauthorized.');
        }
    }

    //Student view lost item using filter function
    public function catalog(Request $request)
    {
        $categories = Category::all();
        // Dunno what this line is used for
        // $category_id = DB::table('founds')->select('category_id')->distinct()->get()->pluck('category_id')->sort();
        
        $found = Found::query();

        if($request->filled('category')) {
            $found->where('category_id', $request->category);
        }
        if($request->filled('color')) {
            $found->where('color', $request->color);
        }

        return view('found.catalog')->with([
            'categories' => $categories,
            'category_id' => $request->category,
            'color' => $request->color,
            'founds' => $found->orderBy('id', 'DESC')->paginate(8),
        ]);
    }

    //Student send claim request
    // public function claim(Request $request, $id) {
       
    //     $this->validate($request, [
    //         'a1' => 'required',
    //         'a2' => 'required',
    //         'a3' => 'required',
    //     ]);

    //     //Create Claim Post
    //     $claim = new Claim;
    //     $claim->answer_one = $request->input('a1');
    //     $claim->answer_two = $request->input('a2');
    //     $claim->answer_three = $request->input('a3');
    //     $claim->user_id = auth()->user()->id;
    //     $claim->found_id = $id;
    //     $claim->save();

    //     return redirect('/founds/'.$id)->with('success', 'Claim request is sent.');
    // }

    //Admin found detail
    public function detail($id)
    {
        $found = Found::find($id);
        
        return view('found.ashow')->with([
            'found' => $found,
        ]);
    }

    public function approval()
    {
        $founds = Found::all();
        
        return view('found.approval')->with('founds', $founds);   
    }

    public function solve($id) {
        $found = Found::find($id);

        $found->status = 'Solved';
        $found->save();

        return redirect()->back()->with('success', 'This found item has been resolved.');
    }

    public function unsolve($id) {
        $found = Found::find($id);

        $found->status = 'Unsolve';
        $found->save();

        return redirect()->back()->with('success', 'This found item has been set to unsolve.');
    }
}
