<?php

namespace App\Http\Controllers;

use App\Models\FooterGridTitle;
use Illuminate\Http\Request;

class FooterGridTitleController extends Controller
{
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
    public function show(FooterGridTitle $footerGridTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $footergridtitle = FooterGridTitle::latest()->first();
        return view('backend.footer.footer-grid-title.edit', compact('footergridtitle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'grid_title_one' => 'required|string|max:255',
            'grid_title_two' => 'required|string|max:255',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();

        FooterGridTitle::find($id)->update($data);

        $notifications = array(
            'messege' => 'Footer grid title updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->back()->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FooterGridTitle $footerGridTitle)
    {
        //
    }
}
