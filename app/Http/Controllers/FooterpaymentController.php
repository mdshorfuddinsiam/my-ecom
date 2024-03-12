<?php

namespace App\Http\Controllers;

use App\Models\Footerpayment;
use Illuminate\Http\Request;

use App\Http\Traits\ImageUpload;

class FooterpaymentController extends Controller
{

    use ImageUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footerpayments = Footerpayment::latest()->get();
        return view('backend.footer.footer-payment.index', compact('footerpayments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.footer.footer-payment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'status'  => 'required|boolean',
        ]);
 
        // dd($request->all());

        $data = [];
        $data = $request->all();

        $data['image'] = $this->uploadImage($request, 'image', 'footer_payment_image-', 'footer_payment_images', 614, 44);

        Footerpayment::create($data);

        $notifications = array(
            'messege' => 'Footer payment image created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.footerpayments.index')->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(Footerpayment $footerpayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Footerpayment $footerpayment)
    {
        return view('backend.footer.footer-payment.edit', compact('footerpayment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Footerpayment $footerpayment)
    {
        $request->validate([
            'image' => 'required_if:type,file|image|mimes:jpeg,png,jpg,svg|max:2048',
            'status'  => 'required|boolean',
        ]);
 
        // dd($request->all());

        $data = [];
        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = $this->updateImage($request, $footerpayment->image, 'image', 'footer_payment_image-', 'footer_payment_images', 614, 44);
        }
        else{
            $data['image'] = $footerpayment->image;
        }

        $footerpayment->update($data);

        $notifications = array(
            'messege' => 'Footer payment image updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.footerpayments.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Footerpayment $footerpayment)
    {
        $this->deleteImage($footerpayment->image);
        $footerpayment->delete();
        $notifications = array(
            'messege' => 'Footer pyament image deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }

    // Ajax Update Status
    public function updateStatus(Request $request){
        $data = Footerpayment::find($request->id);
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
