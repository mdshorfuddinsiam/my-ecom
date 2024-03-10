<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.category.index', [
            'categories' => Category::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'icon' => 'required|string|max:50',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);

        Category::create($data);

        $notifications = array(
            'messege' => 'Category created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.categories.index')->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'. $category->id,
            'icon' => 'required|string|max:50',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);

        $category->update($data);

        $notifications = array(
            'messege' => 'Category updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.categories.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // dd($category->subcategories->count() > 0);
        if($category->subcategories->count() < 1){
            $category->delete();
            $notifications = array(
                'messege' => 'Category deleted successfully!!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notifications);
        }else{
            $notifications = array(
                'messege' => 'This cateogory have subcategory. Delete subcategory first!!',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notifications);
        }
        
    }

    public function active(Category $category){
        $category->update(['status' => 1]);
        $notifications = array(
            'messege' => 'Category status active successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }

    public function inactive(Category $category){
        $category->update(['status' => 0]);
        $notifications = array(
            'messege' => 'Category status inactive successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }

}
