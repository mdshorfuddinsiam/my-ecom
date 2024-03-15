<?php

namespace App\Http\Controllers;

use App\Models\Blogcategory;
use Illuminate\Http\Request;

class BlogcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.blog.blog-category.index', [
            'blogcategories' => Blogcategory::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.blog.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blogcategories',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);

        Blogcategory::create($data);

        $notifications = array(
            'messege' => 'Blog category created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.blogcategories.index')->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogcategory $blogcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogcategory $blogcategory)
    {
        return view('backend.blog.blog-category.edit', compact('blogcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blogcategory $blogcategory)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:blogcategories,name,'. $blogcategory->id,
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);

        $blogcategory->update($data);

        $notifications = array(
            'messege' => 'Blog category updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.blogcategories.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogcategory $blogcategory)
    {
        $blogcategory->delete();
        $notifications = array(
            'messege' => 'Blog category deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }


    // Ajax Update Status
    public function updateStatus(Request $request){
        $data = Blogcategory::find($request->id);
        if($request->check == "true"){
            $data->update(['status' => 1]);
        }else{
            $data->update(['status' => 0]);
        }

        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }


}
