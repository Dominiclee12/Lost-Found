<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Lost;

class ProfileController extends Controller
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
        $user = User::find($id);
        $losts = Lost::where('user_id', $id)->get();
        return view('profile.show')->with('user', $user)->with('losts', $losts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $faculties = [
            'FEP',
            'FF',
            'FKAB',
            'FPI',
            'FP',
            'FPEND',
            'FPERG',
            'FSK',
            'FST',
            'FSSK',
            'FTSM',
            'FUU',
        ];
        return view('profile.edit')->with([
            'user' => $user,
            'faculties' => $faculties,
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
            'name' => 'required',
            'phone' => 'required',
            'image' => 'image|nullable',
            'gender' => 'required',
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
            $request->file('image')->storeAs('public/profile_images', $fileNameToStore);
        }

        // Update Post
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->gender = $request->input('gender');
        $user->faculty = $request->input('faculty');
        if($request->hasFile('image'))
        {
            if ($user->image != 'noimage.jpg') {
                Storage::delete('public/profile_images/'.$user->image);
            }
            $user->image = $fileNameToStore;
        }
        $user->save();

        return redirect()->back()->with('success', 'Profile Updated');
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
