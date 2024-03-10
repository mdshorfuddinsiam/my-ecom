<?php

namespace App\Http\Controllers;

use App\Models\Galleryimage;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Traits\ImageUpload;

class GalleryimageController extends Controller
{

    use ImageUpload;


    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        // dd($product);
        $galleryimages = Galleryimage::with('product')->latest()->get();
        return view('backend.product.gallery-image.index', compact('product', 'galleryimages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('backend.product.gallery-image.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $request->validate([
            'multi_image.*' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['product_id'] = $product->id;

        $data['multi_image'] = $this->multiImageUpload($request, 'multi_image', 'multi_image-', 'product/multi_images');

        // dd($data);

        foreach ($data['multi_image'] as $image) {
            Galleryimage::create([
                'product_id' => $data['product_id'],
                'multi_image' => $image,
                'status' => $data['status'],
            ]);
        }

        $notifications = array(
            'messege' => 'Gallery Image created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.galleryimages.index', ['product' => $product->id])->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(Galleryimage $galleryimage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, Galleryimage $galleryimage)
    {
        return view('backend.product.gallery-image.edit', compact('galleryimage', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, Galleryimage $galleryimage)
    {
        $request->validate([
            'multi_image' => 'required_if:type,file|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();

        $data['multi_image'] = $this->updateImage($request, $galleryimage->multi_image, 'multi_image', 'multi_image-', 'product/multi_images');

        // dd($data);

        $galleryimage->update($data);

        $notifications = array(
            'messege' => 'Gallery Image updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.galleryimages.index', ['product' => $product->id])->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Galleryimage $galleryimage)
    {   
        $this->deleteImage($galleryimage->multi_image);
        $galleryimage->delete();
        $notifications = array(
            'messege' => 'Gallery Image deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.galleryimages.index', ['product' => $product->id])->with($notifications);
    }
}
