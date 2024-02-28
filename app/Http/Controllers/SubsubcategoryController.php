<?php

namespace App\Http\Controllers;

use App\Models\Subsubcategory;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Request;

class SubsubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subsubcategories = Subsubcategory::with('category', 'subcategory')->latest()->get();
        return view('backend.subsubcategory.index', compact('subsubcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        // $subcategories = Subcategory::orderBy('name', 'asc')->get();
        return view('backend.subsubcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'name' => 'required|string|max:255|unique:subsubcategories',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);

        Subsubcategory::create($data);

        $notifications = array(
            'messege' => 'Sub-SubCategory created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.subsubcategories.index')->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(Subsubcategory $subsubcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subsubcategory $subsubcategory)
    {
        $subsubcategory = Subsubcategory::with('category', 'category.subcategories')->find($subsubcategory->id);
        $categories = Category::with('subcategories')->orderBy('name', 'asc')->get();
        // $subcategories = Subcategory::where('category_id', $subsubcategory->category_id)->orderBy('name', 'asc')->get();
        return view('backend.subsubcategory.edit', compact('categories', 'subsubcategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subsubcategory $subsubcategory)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'name' => 'required|string|max:255|unique:subsubcategories,name,'. $subsubcategory->id,
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);

        $subsubcategory->update($data);

        $notifications = array(
            'messege' => 'Sub-SubCategory created successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.subsubcategories.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subsubcategory $subsubcategory)
    {
        $subsubcategory->delete();
        $notifications = array(
            'messege' => 'Sub-SubCategory deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }

    public function active(Subsubcategory $subsubcategory){
        $subsubcategory->update(['status' => 1]);
        $notifications = array(
            'messege' => 'Subsubcategory status active successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }

    public function inactive(Subsubcategory $subsubcategory){
        $subsubcategory->update(['status' => 0]);
        $notifications = array(
            'messege' => 'Subsubcategory status inactive successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }

    // ajax (get subcategory)
    public function getSubCat(Request $request)
    {
        // dd($request->all());
        $subcategories = Subcategory::where('category_id', $request->category_id)->orderBy('name', 'asc')->get();
        // dd($subcategories);

        return response()->json([
            'data' => $subcategories,
            'status' => '200',
        ]);
    }


}
