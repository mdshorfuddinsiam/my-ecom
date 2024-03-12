<?php

namespace App\Http\Controllers;

use App\Models\FooterSocial;
use Illuminate\Http\Request;

class FooterSocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.footer.footer-social.index', [
            'footersocials' => FooterSocial::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.footer.footer-social.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:footer_socials',
            'icon' => 'required|string|max:50',
            'link' => 'required|string|url:http,https',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();

        FooterSocial::create($data);

        $notifications = array(
            'messege' => 'FooterSocial created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.footersocials.index')->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(FooterSocial $footerSocial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $footerSocial = FooterSocial::find($id);
        return view('backend.footer.footer-social.edit', compact('footerSocial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $footerSocial = FooterSocial::find($id);
        $request->validate([
            'name' => 'required|string|max:255|unique:footer_socials,name,'. $footerSocial->id,
            'icon' => 'required|string|max:50',
            'link' => 'required|string|url:http,https',
            'status'  => 'required|boolean',
        ]);

        // dd($request->all());

        $data = [];
        $data = $request->all();

        $footerSocial->update($data);

        $notifications = array(
            'messege' => 'Footer Social updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.footersocials.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        FooterSocial::find($id)->delete();
        $notifications = array(
            'messege' => 'Footer Social deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }


    // Ajax Update Status
    public function updateStatus(Request $request){
        $data = FooterSocial::find($request->id);
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
