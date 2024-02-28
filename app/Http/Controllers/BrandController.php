<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:brands',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'status'  => 'required|boolean',
        ]);
 
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // dd($request->all());

        $data = [];
        $data = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = 'brand_images-'.rand(10000, 999999).time().'.'.$image->extension();
            $image->move('uploads/brand_images/', $imageName);
            $imageUrl = 'uploads/brand_images/'.$imageName;
            $data['image'] = $imageUrl;
        }

        Brand::create($data);

        $notifications = array(
            'messege' => 'Brand created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.brands.index')->with($notifications);

    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('backend.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:brands,name,'. $brand->id,
            'image'      => 'required_if:type,file|image|mimes:jpeg,png,jpg,svg|max:2048',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();

        if($request->hasFile('image')){
            if(file_exists($brand->image)){
                unlink($brand->image);
            }

            $image = $request->file('image');
            $imageName = 'brand_images-'.rand(10000, 999999).time().'.'.$image->extension();
            $image->move('uploads/brand_images/', $imageName);
            $imageUrl = 'uploads/brand_images/'.$imageName;
            $data['image'] = $imageUrl;
        }else{
            $imageUrl = $brand->image;
            $data['image'] = $imageUrl;
        }

        $brand->update($data);

        $notifications = array(
            'messege' => 'Brand updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.brands.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if(file_exists($brand->image)){
            unlink($brand->image);
        }
        $brand->delete();

        $notifications = array(
            'messege' => 'Brand deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }

    public function active(Brand $brand){
        $brand->update(['status' => 1]);
        $notifications = array(
            'messege' => 'Brand status active successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }

    public function inactive(Brand $brand){
        $brand->update(['status' => 0]);
        $notifications = array(
            'messege' => 'Brand status inactive successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }

}
