<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

use App\Http\Traits\ImageUpload;

class SliderController extends Controller
{

    use ImageUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'title' => 'required|string|max:255|unique:sliders',
            'type' => 'required|string|max:255',
            'starting_price' => 'required|numeric|min:1|between:1,9999999.99',
            'btn_text' => 'required|string|max:50',
            'btn_url' => 'required|string|url:http,https',
            'serial' => 'required|numeric|min:1|digits_between:1,50',
            'status'  => 'required|boolean',
        ]);
 
        // dd($request->all());

        $data = [];
        $data = $request->all();

        $data['image'] = $this->uploadImage($request, 'image', 'slider_image-', 'slider_images', 1300, 500);

        Slider::create($data);

        $notifications = array(
            'messege' => 'Slider created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.sliders.index')->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image' => 'required_if:type,file|image|mimes:jpeg,png,jpg,svg|max:2048',
            'title' => 'required|string|max:255|unique:sliders,title,'. $slider->id,
            'type' => 'required|string|max:255',
            'starting_price' => 'required|numeric|min:1|between:1,9999999.99',
            'btn_text' => 'required|string|max:50',
            'btn_url' => 'required|string|url:http,https',
            'serial' => 'required|numeric|min:1|digits_between:1,50',
            'status'  => 'required|boolean',
        ]);
 
        // dd($request->all());

        $data = [];
        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = $this->updateImage($request, $slider->image, 'image', 'slider_image-', 'slider_images', 1300, 500);
        }
        else{
            $data['image'] = $slider->image;
        }

        $slider->update($data);

        $notifications = array(
            'messege' => 'Slider updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.sliders.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        $this->deleteImage($slider->image);
        $slider->delete();
        $notifications = array(
            'messege' => 'Slider deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }


    // Ajax Update Status
    public function updateStatus(Request $request){
        $data = Slider::find($request->id);
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
