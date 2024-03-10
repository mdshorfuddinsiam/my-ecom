<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use App\Models\Product;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        $variants = Variant::with('product')->latest()->get();
        return view('backend.product.variant.index', compact('product', 'variants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('backend.product.variant.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:variants',
            // 'name' => 'required|string|max:255|unique:variants,name,'. $variant->id,
            'status'  => 'required|boolean',
        ]);

        $data = [];
        $data = $request->all();
        $data['product_id'] = $product->id;

        Variant::create($data);

        $notifications = array(
            'messege' => 'Variant created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.variants.index', ['product' => $product->id])->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(Variant $variant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, Variant $variant)
    {
        return view('backend.product.variant.edit', compact('variant', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, Variant $variant)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:variants,name,'. $variant->id,
            'status'  => 'required|boolean',
        ]);

        $data = [];
        $data = $request->all();

        $variant->update($data);

        $notifications = array(
            'messege' => 'Variant updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.variants.index', ['product' => $product->id])->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Variant $variant)
    {
        $variant->delete();
        $notifications = array(
            'messege' => 'Variant deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.variants.index', ['product' => $product->id])->with($notifications);
    }



    // Ajax Update Status
    public function updateStatus(Request $request){
        // dd($request->all());

        $data = Variant::find($request->id);
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
