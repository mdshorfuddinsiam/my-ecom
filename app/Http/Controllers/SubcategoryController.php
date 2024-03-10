<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = Subcategory::with('category')->latest()->get();
        return view('backend.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:subcategories',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);

        Subcategory::create($data);

        $notifications = array(
            'messege' => 'Sub-Category created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.subcategories.index')->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('backend.subcategory.edit', compact('categories', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255|unique:subcategories,name,'. $subcategory->id,
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);

        $subcategory->update($data);

        $notifications = array(
            'messege' => 'Sub-Category updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.subcategories.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        // dd($subcategory->subcategories->count() > 0);
        if($subcategory->subsubcategories->count() < 1){
            $subcategory->delete();
            $notifications = array(
                'messege' => 'Sub-Category deleted successfully!!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notifications);
        }else{
            $notifications = array(
                'messege' => 'This subcateogory have subsubcategory. Delete subsubcategory first!!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notifications);
        }
    }



    public function active(Subcategory $subcategory){
        $subcategory->update(['status' => 1]);
        $notifications = array(
            'messege' => 'Subcategory status active successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }

    public function inactive(Subcategory $subcategory){
        $subcategory->update(['status' => 0]);
        $notifications = array(
            'messege' => 'Subcategory status inactive successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }


}
