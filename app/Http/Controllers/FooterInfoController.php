<?php

namespace App\Http\Controllers;

use App\Models\FooterInfo;
use Illuminate\Http\Request;

use App\Http\Traits\ImageUpload;

class FooterInfoController extends Controller
{

    use ImageUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FooterInfo $footerInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $footerInfo = FooterInfo::latest()->first();
        return view('backend.footer.footer-info.edit', compact('footerInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FooterInfo $footerInfo)
    {
        $request->validate([
            'image'      => 'required_if:type,file|image|mimes:jpeg,png,jpg,svg|max:2048',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric|min:11',
            'address' => 'required|string',
            'copyright' => 'required|string',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = $this->updateImage($request, $footerInfo->image, 'image', 'footer_image-', 'footer_images', 249, 87);
        }
        else{
            $data['image'] = $footerInfo->image;
        }

        $footerInfo->update($data);

        $notifications = array(
            'messege' => 'Footer info updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->back()->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FooterInfo $footerInfo)
    {
        //
    }
}
