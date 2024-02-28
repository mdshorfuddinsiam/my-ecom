<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SubsubcategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
    // return view('frontend.layouts.master');
    // return view('welcome');
});

Auth::routes();

// ---------- Admin Login & Register -------------
Route::prefix('admin')->name('admin.')->group(function () {

	Route::get('/login',[LoginController::class,'showAdminLoginForm'])->name('login-view');
	Route::post('/login',[LoginController::class,'adminLogin'])->name('login');

	Route::get('/password/reset',[ForgotPasswordController::class,'showLinkRequestForm'])->name('password.request');
	Route::post('/password/email',[ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
	Route::get('/password/reset/{token}',[ResetPasswordController::class,'showResetForm'])->name('password.reset');
	Route::post('/password/reset',[ResetPasswordController::class,'reset'])->name('password.update');

	Route::get('/register',[RegisterController::class,'showAdminRegisterForm'])->name('register-view');
	Route::post('/register',[RegisterController::class,'createAdmin'])->name('register');

	// Route::get('/logout', function () {
	//     auth()->guard('admin')->logout();
 //        return redirect('/admin/login');
	// })->name('logout')->middleware('auth:admin');
});
// ---------------------------------------------

// User Dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Dashboard & Logout
Route::middleware('auth:admin')->name('admin.')->group(function () {
	Route::get('/admin/dashboard',function(){
	    return view('backend.index');
	    // return view('backend.layouts.admin_master');
	    // return view('admin');
	})->middleware('auth:admin');

	Route::get('/logout', function () {
	    auth()->guard('admin')->logout();
        return redirect('/admin/login');
	})->name('logout');
	// Route::post('/logout',[LoginController::class,'adminLogout'])->name('logout');
});

// User profile
Route::prefix('user')->name('user.')->group(function () {
	Route::get('/profile', [App\Http\Controllers\HomeController::class, 'userProfile'])->name('profile');
	Route::post('/profile/update', [App\Http\Controllers\HomeController::class, 'userProfileUpdate'])->name('profile.update');
	Route::post('/password/update', [App\Http\Controllers\HomeController::class, 'userPasswordUpdate'])->name('password.update');
});

Route::prefix('admin')->name('admin.')->group(function () {
	// Admin Profile
	Route::resource('profiles', AdminProfileController::class);
	Route::post('password/update/{id}',[AdminProfileController::class,'adminPasswordUpdate'])->name('password.update');
	Route::post('email/update/{id}',[AdminProfileController::class,'adminEmailUpdate'])->name('email.update');

	// Admin Brand
	Route::resource('brands', BrandController::class);	
	Route::get('brand/delete/{brand}',[BrandController::class,'destroy'])->name('brand.delete');
	Route::get('brand/active/{brand}',[BrandController::class,'active'])->name('brand.active');
	Route::get('brand/inactive/{brand}',[BrandController::class,'inactive'])->name('brand.inactive');

	// Admin Category
	Route::resource('categories', CategoryController::class);
	Route::get('category/delete/{category}',[CategoryController::class,'destroy'])->name('category.delete');
	Route::get('category/active/{category}',[CategoryController::class,'active'])->name('category.active');
	Route::get('category/inactive/{category}',[CategoryController::class,'inactive'])->name('category.inactive');

	// Admin Subcategory
	Route::resource('subcategories', SubcategoryController::class);
	Route::get('subcategory/delete/{subcategory}',[SubcategoryController::class,'destroy'])->name('subcategory.delete');
	Route::get('subcategory/active/{subcategory}',[SubcategoryController::class,'active'])->name('subcategory.active');
	Route::get('subcategory/inactive/{subcategory}',[SubcategoryController::class,'inactive'])->name('subcategory.inactive');

	// Admin Subsubcategory
	Route::resource('subsubcategories', SubsubcategoryController::class);
	Route::get('subsubcategory/delete/{subsubcategory}',[SubsubcategoryController::class,'destroy'])->name('subsubcategory.delete');
	Route::get('subsubcategory/active/{subsubcategory}',[SubsubcategoryController::class,'active'])->name('subsubcategory.active');
	Route::get('subsubcategory/inactive/{subsubcategory}',[SubsubcategoryController::class,'inactive'])->name('subsubcategory.inactive');
		// Ajax Get SubCategory
		Route::post('get/subcat',[SubsubcategoryController::class,'getSubCat'])->name('getsubcat');

})->middleware('auth:admin');