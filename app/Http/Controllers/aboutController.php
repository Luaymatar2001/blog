<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;

class aboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = about::firstOrFail();
        return view('blog.home')->with('about', $about);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $destroy = about::truncate();
        $file = $request->file('logo');
        $path = $file->store('news', ['disk' => 'public']);
        $status = about::create($request->all());
        $status->logo = $path;
        $status->save();
        if ($status) {
            return redirect()->back()->with('status', $status);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
