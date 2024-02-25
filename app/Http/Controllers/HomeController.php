<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        return view('frontend.user.dashboard');
    }

    public function userProfile()
    {
        return view('frontend.user.dashboard_profile');
    }

    public function userProfileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'. auth()->user()->id,
            'phone' => 'required|min:11|numeric',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image'      => 'required_if:type,file|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        // dd($request->all());
        $user = auth()->user();

        if($request->hasFile('image')){
            if(file_exists($user->image)){
                unlink($user->image);
            }

            $image = $request->file('image');
            $imageName = 'user_profile-'.rand(10000, 999999).time().'.'.$image->extension();
            $image->move('uploads/user_profile/', $imageName);
            $imageUrl = 'uploads/user_profile/'.$imageName;
        }else{
            $imageUrl = $user->image;
        }

        $data = [];
        $data = $request->all();
        $data['image'] = $imageUrl;

        $user->update($data);

        $notifications = array(
            'messege' => 'User profile updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->back()->with($notifications);
    }

    public function userPasswordUpdate(Request $request){
        // dd($request->all());

        $user = auth()->user();

        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'same:confirm_password'],
        ]);

        if(Hash::check($request->current_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->update();
            auth()->logout();

            $notifications = array(
                'messege' => 'User password changed successfully!!',
                'alert-type' => 'success',
            );
            return redirect()->route('login')->with($notifications);
        }else{
            $notifications = array(
                'messege' => 'Current password does not match!!',
                'alert-type' => 'warning',
            );
            return redirect()->back()->with($notifications);
        }

        
    }

}
