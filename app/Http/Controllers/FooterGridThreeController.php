<?php

namespace App\Http\Controllers;

use App\Models\FooterGridThree;
use Illuminate\Http\Request;

class FooterGridThreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.footer.footer-grid-three.index', [
            'footergridthrees' => FooterGridThree::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.footer.footer-grid-three.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:footer_grid_threes',
            'link' => 'required|string|url:http,https',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();

        FooterGridThree::create($data);

        $notifications = array(
            'messege' => 'Footer Grid Three created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.footergridthrees.index')->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(FooterGridThree $footerGridThree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $footergridthree = FooterGridThree::find($id);
        return view('backend.footer.footer-grid-three.edit', compact('footergridthree'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $footergridthree = FooterGridThree::find($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:footer_grid_threes,name,'. $footergridthree->id,
            'link' => 'required|string|url:http,https',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();

        $footergridthree->update($data);

        $notifications = array(
            'messege' => 'Footer Social updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.footergridthrees.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        FooterGridThree::find($id)->delete();
        $notifications = array(
            'messege' => 'Footer Grid Three deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }


    // Ajax Update Status
    public function updateStatus(Request $request){
        $data = FooterGridThree::find($request->id);
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
