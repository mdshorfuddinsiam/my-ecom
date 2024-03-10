<?php

namespace App\Http\Controllers;

use App\Models\Variantitem;
use App\Models\Variant;
use App\Models\Product;
use Illuminate\Http\Request;

class VariantitemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product, Variant $variant)
    {
        $variantitems = Variantitem::with('product', 'variant')->latest()->get();
        return view('backend.product.variant-item.index', compact('product', 'variant', 'variantitems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product, Variant $variant)
    {
        return view('backend.product.variant-item.create', compact('product', 'variant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product, Variant $variant)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:variantitems',
            'price' => 'required|numeric|min:0|between:0,9999999.99',
            'is_default'  => 'required|boolean',
            'status'  => 'required|boolean',
        ]);

        // dd($variant->id);
        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['product_id'] = $product->id;
        $data['variant_id'] = $variant->id;

        Variantitem::create($data);

        $notifications = array(
            'messege' => 'Variant Item created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.variantitems.index', ['product' => $product->id, 'variant' => $variant->id])->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(Variantitem $variantitem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, Variant $variant, Variantitem $variantitem)
    {
        return view('backend.product.variant-item.edit', compact('variant', 'product', 'variantitem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, Variant $variant, Variantitem $variantitem)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:variantitems,name,'. $variantitem->id,
            'price' => 'required|numeric|min:0|between:0,9999999.99',
            'is_default'  => 'required|boolean',
            'status'  => 'required|boolean',
        ]);

        $data = [];
        $data = $request->all();

        $variantitem->update($data);

        $notifications = array(
            'messege' => 'Variant Item updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.variantitems.index', ['product' => $product->id, 'variant' => $variant->id])->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Variant $variant, Variantitem $variantitem)
    {
        $variantitem->delete();
        $notifications = array(
            'messege' => 'Variant Item deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.variantitems.index', ['product' => $product->id, 'variant' => $variant->id])->with($notifications);
    }



    // Ajax Update Status
    public function updateStatus(Request $request){
        dd($request->all());

        $data = Variantitem::find($request->id);
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
