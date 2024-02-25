<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }



    public function showAdminLoginForm()
    {
        return view('admin.login', ['url' => route('admin.login-view'), 'title'=>'Admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // dd($request->all());

        if (\Auth::guard('admin')->attempt($request->only(['email','password']), $request->get('remember'))){
            return redirect()->intended('/admin/dashboard');
        }
        else{
            session()->flash('error', 'Either Email/Password is incorrect');
            return back()->withInput($request->only('email'));
        }

        // dd(6);
        // return back()->withInput($request->only('email', 'remember'));
    }



    // public function adminLogout(Request $request){
    //     dd($request->all());
    //     auth()->guard('admin')->logout();
    //     return redirect('/admin/login');
    // }

   //  public function adminLogout(Request $request){

   //      dd($request->all());

   //     //logout the admin…
   //     \Auth::guard('admin')->logout();
     
   //     $request->session()->invalidate();
     
   //     $request->session()->regenerateToken();
   //     return $this->loggedOut($request) ?: redirect('/admin/login');  
   // }


}
