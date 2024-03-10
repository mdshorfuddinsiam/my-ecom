<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.size.index', [
            // 'sizes' => Size::orderBy('name', 'asc')->get(),
            'sizes' => Size::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.size.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sizes',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);

        Size::create($data);

        $notifications = array(
            'messege' => 'Size created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.sizes.index')->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        return view('backend.size.edit', [
            'size' => $size,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:sizes,name,'. $size->id,
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);

        $size->update($data);

        $notifications = array(
            'messege' => 'Size updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.sizes.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        $notifications = array(
            'messege' => 'Size deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }

    // Ajax Update Status
    public function updateStatus(Request $request){
        // dd($request->all());

        $data = Size::find($request->id);
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
