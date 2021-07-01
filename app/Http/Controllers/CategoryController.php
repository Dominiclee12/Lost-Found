<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at','asc')->get();

        return view('admin.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'category' => 'required',
        ]);

        //Create New Category
        $category = new Category;
        $category->name = $request->input('category');
        $category->save();

        return redirect()->back()->with('success', 'Category Created');
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
        $category = Category::find($id);

        //Check for correct user / admin
        if(auth()->user()->user_level != 'user'){
            return view('admin.category.edit')->with('category', $category);
        }
        else{
            return redirect('/categories')->with('error', 'This action is unauthorized.');
        }  
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
            'category' => 'required',
        ]);

        //Update Category
        $category = Category::find($id);
        $category->name = $request->input('category');
        $category->save();

        // return redirect()->back()->with('success', 'Category Updated');
        return redirect('/categories')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if(auth()->user()->user_level != 'user') {
            $category->delete();
            return redirect()->back()->with('success', 'Category Removed');
        } else {
            return redirect()->back()->with('error', 'This action is unauthorized.');
        }
    }
}
