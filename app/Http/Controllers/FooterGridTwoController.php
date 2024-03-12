<?php

namespace App\Http\Controllers;

use App\Models\FooterGridTwo;
use Illuminate\Http\Request;

class FooterGridTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.footer.footer-grid-two.index', [
            'footergridtwos' => FooterGridTwo::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.footer.footer-grid-two.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:footer_grid_twos',
            'link' => 'required|string|url:http,https',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();

        FooterGridTwo::create($data);

        $notifications = array(
            'messege' => 'Footer Grid Two created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.footergridtwos.index')->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(FooterGridTwo $footerGridTwo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $footergridtwo = FooterGridTwo::find($id);
        return view('backend.footer.footer-grid-two.edit', compact('footergridtwo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $footergridtwo = FooterGridTwo::find($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:footer_grid_twos,name,'. $footergridtwo->id,
            'link' => 'required|string|url:http,https',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();

        $footergridtwo->update($data);

        $notifications = array(
            'messege' => 'Footer Social updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.footergridtwos.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        FooterGridTwo::find($id)->delete();
        $notifications = array(
            'messege' => 'Footer Grid Two deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }


    // Ajax Update Status
    public function updateStatus(Request $request){
        $data = FooterGridTwo::find($request->id);
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
