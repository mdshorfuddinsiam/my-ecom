<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Http\Request;

use App\Http\Traits\ImageUpload;

class ProductController extends Controller
{

    use ImageUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('backend.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::whereStatus(1)->orderBy('name', 'asc')->get();
        $categories = Category::whereStatus(1)->orderBy('name', 'asc')->get();
        return view('backend.product.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'title' => 'required|string|max:255|unique:products',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'subsubcategory_id' => 'nullable|exists:subsubcategories,id',
            // 'selling_price' => 'required|integer|min:1|digits_between:1,6',
            'selling_price' => 'required|numeric|min:1|between:1,9999999.99',
            // 'discount_price' => 'nullable|integer|min:1|lt:selling_price|digits_between:1,6',
            'discount_price' => 'nullable|integer|min:1|lt:selling_price|between:1,9999999.99',
            'start_discount_date' => 'nullable|before:end_discount_date',
            'end_discount_date' => 'nullable|after:start_discount_date',
            'unit'  => 'required|string',
            'sku'  => 'required|string|max:50',
            'short_description'  => 'required|string',
            'long_description'  => 'required|string',
            'video_link'  => 'nullable|url:http,https',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'is_new'  => 'nullable|boolean',
            'is_top'  => 'nullable|boolean',
            'is_featureds'  => 'nullable|boolean',
            'is_best'  => 'nullable|boolean',
            'is_today_deals'  => 'nullable|boolean',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['admin_id'] = auth()->guard('admin')->id(); 
        $data['slug'] = \Str::slug($request->name);

        $data['thumbnail_image'] = $this->uploadImage($request, 'thumbnail_image', 'product/thumbnail_images-', 'product_images');
        // dd($data['thumbnail_image']);  

        Product::create($data);

        $notifications = array(
            'messege' => 'Product created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.products.index')->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::orderBy('name', 'asc')->get();
        $categories = Category::with('subcategories')->orderBy('name', 'asc')->get();
        $product = Product::with('category', 'category.subcategories', 'subcategory', 'subcategory.subsubcategories')->find($product->id);
        return view('backend.product.edit', compact('product', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'thumbnail_image' => 'required_if:type,file|image|mimes:jpeg,png,jpg,svg|max:2048',
            'title' => 'required|string|max:255|unique:products,title,'. $product->id,
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'nullable|exists:subcategories,id',
            'subsubcategory_id' => 'nullable|exists:subsubcategories,id',
            // 'selling_price' => 'required|integer|min:1|digits_between:1,6',
            'selling_price' => 'required|numeric|min:1|between:1,9999999.99',
            // 'discount_price' => 'nullable|integer|min:1|lt:selling_price|digits_between:1,6',
            'discount_price' => 'nullable|integer|min:1|lt:selling_price|between:1,9999999.99',
            'start_discount_date' => 'nullable|before:end_discount_date',
            'end_discount_date' => 'nullable|after:start_discount_date',
            'unit'  => 'required|string',
            'sku'  => 'required|string|max:50',
            'short_description'  => 'required|string',
            'long_description'  => 'required|string',
            'video_link'  => 'nullable|url:http,https',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'is_new'  => 'nullable|boolean',
            'is_top'  => 'nullable|boolean',
            'is_featureds'  => 'nullable|boolean',
            'is_best'  => 'nullable|boolean',
            'is_today_deals'  => 'nullable|boolean',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['admin_id'] = auth()->guard('admin')->id(); 
        $data['slug'] = \Str::slug($request->name);

        if($request->hasFile('thumbnail_image')){
            $data['thumbnail_image'] = $this->updateImage($request, $product->thumbnail_image, 'thumbnail_image', 'product/thumbnail_images-', 'product_images');
            // dd($data['thumbnail_image']);  
        }
        else{
            $data['thumbnail_image'] = $product->thumbnail_image;
        }

        $product->update($data);

        $notifications = array(
            'messege' => 'Product updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.products.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->deleteImage($product->thumbnail_image);
        $product->delete();
        $notifications = array(
            'messege' => 'Product deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }



    // ajax (get subsubcategory)
    public function getSubSubCat(Request $request)
    {
        // dd($request->all());
        $subsubcategories = Subsubcategory::where('subcategory_id', $request->subcategory_id)->orderBy('name', 'asc')->get();
        // dd($subsubcategories);

        return response()->json([
            'data' => $subsubcategories,
            'status' => '200',
        ]);
    }

    // Ajax Update Status
    public function updateStatus(Request $request){
        $data = Product::find($request->id);
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
