<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;

class AdminProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.profile.profile_view', ['admin' => auth()->guard('admin')->user()]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('backend.profile.profile_edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email,'. $id,
            'phone' => 'required|min:11|numeric',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image'      => 'required_if:type,file|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        // dd($request->all());

        $admin = Admin::find($id);

        if($request->hasFile('image')){
            if(file_exists($admin->image)){
                unlink($admin->image);
            }

            $image = $request->file('image');
            $imageName = 'admin_profile-'.rand(10000, 999999).time().'.'.$image->extension();
            $image->move('uploads/admin_profile/', $imageName);
            $imageUrl = 'uploads/admin_profile/'.$imageName;
        }else{
            $imageUrl = $admin->image;
        }

        $data = [];
        $data = $request->all();
        $data['image'] = $imageUrl;

        $admin->update($data);

        $notifications = array(
            'messege' => 'Admin profile updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->back()->with($notifications);
    }

    public function adminEmailUpdate(Request $request, $id){
        $request->validate([
            'email_address' => 'required|string|email|max:255|unique:admins,email,'. $id,
            'password' => ['required', 'string', 'min:8'],
        ]);

        // dd($request->all());

        $admin = Admin::find($id);

         if(Hash::check($request->password, $admin->password)){
            $admin->email = $request->email_address;
            $admin->update();
            auth()->guard('admin')->logout();

            $notifications = array(
                'messege' => 'Admin email changed successfully!!',
                'alert-type' => 'success',
            );
            return redirect()->route('admin.login')->with($notifications);
        }else{
            $notifications = array(
                'messege' => 'Password does not match!!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notifications);
        }
    }

    public function adminPasswordUpdate(Request $request, $id){

        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8', 'same:confirm_password'],
        ]);

        // dd($request->all());

        $admin = Admin::find($id);

        if(Hash::check($request->current_password, $admin->password)){
            $admin->password = Hash::make($request->new_password);
            $admin->update();
            auth()->guard('admin')->logout();

            $notifications = array(
                'messege' => 'Admin password changed successfully!!',
                'alert-type' => 'success',
            );
            return redirect()->route('admin.login')->with($notifications);
        }else{
            $notifications = array(
                'messege' => 'Current password does not match!!',
                'alert-type' => 'warning',
            );
            return redirect()->back()->with($notifications);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
