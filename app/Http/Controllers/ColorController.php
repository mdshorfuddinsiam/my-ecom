<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.color.index', [
            // 'colors' => Color::orderBy('name', 'asc')->get(),
            'colors' => Color::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:colors',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);

        Color::create($data);

        $notifications = array(
            'messege' => 'Color created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.colors.index')->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        return view('backend.color.edit', [
            'color' => $color,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:colors,name,'. $color->id,
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);

        $color->update($data);

        $notifications = array(
            'messege' => 'Color updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.colors.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        $notifications = array(
            'messege' => 'Color deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }

    // Ajax Update Status
    public function updateStatus(Request $request){
        // dd($request->all());

        $data = Color::find($request->id);
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
