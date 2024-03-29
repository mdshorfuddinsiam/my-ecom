<?php

use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogcategoryController;
use App\Http\Controllers\BlogpostController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FooterGridThreeController;
use App\Http\Controllers\FooterGridTitleController;
use App\Http\Controllers\FooterGridTwoController;
use App\Http\Controllers\FooterInfoController;
use App\Http\Controllers\FooterSocialController;
use App\Http\Controllers\FooterpaymentController;
use App\Http\Controllers\GalleryimageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SubsubcategoryController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\VariantitemController;
use App\Models\Blogpost;
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
	$blogposts = Blogpost::whereStatus(1)->latest()->get();
    return view('frontend.index', compact('blogposts'));
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
	});

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

// Admin
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
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

	// Admin Product
	Route::resource('products', ProductController::class);
	Route::get('product/delete/{product}',[ProductController::class,'destroy'])->name('product.delete');
	Route::get('product/active/{product}',[ProductController::class,'active'])->name('product.active');
	Route::get('product/inactive/{product}',[ProductController::class,'inactive'])->name('product.inactive');
		// Ajax Get Sub-SubCategory
		Route::post('get/subsubcat',[ProductController::class,'getSubSubCat'])->name('getsubsubcat');
		// Status Update
		Route::post('product/update/status',[ProductController::class,'updateStatus'])->name('product.update-status');

	// Admin Size
	Route::resource('sizes', SizeController::class);
	Route::get('size/delete/{size}',[SizeController::class,'destroy'])->name('size.delete');
		// Status Update
		Route::post('size/update/status',[SizeController::class,'updateStatus'])->name('size.update-status');

	// Admin Color
	Route::resource('colors', ColorController::class);
	Route::get('color/delete/{color}',[ColorController::class,'destroy'])->name('color.delete');
		// Status Update
		Route::post('color/update/status',[ColorController::class,'updateStatus'])->name('color.update-status');

	// Admin Galllery Image
	Route::get('galleryimages/{product}',[GalleryimageController::class,'index'])->name('galleryimages.index');
	Route::get('galleryimages/create/{product}',[GalleryimageController::class,'create'])->name('galleryimages.create');
	Route::post('galleryimages/{product}',[GalleryimageController::class,'store'])->name('galleryimages.store');
	Route::get('galleryimages/edit/{product}/{galleryimage}',[GalleryimageController::class,'edit'])->name('galleryimages.edit');
	Route::put('galleryimages/update/{product}/{galleryimage}',[GalleryimageController::class,'update'])->name('galleryimages.update');
	Route::get('galleryimage/delete/{product}/{galleryimage}',[GalleryimageController::class,'destroy'])->name('galleryimages.delete');
		// Status Update
		// Route::post('galleryimage/update/status',[GalleryimageController::class,'updateStatus'])->name('galleryimage.update-status');

	// Admin Variant
	Route::get('variants/{product}',[VariantController::class,'index'])->name('variants.index');
	Route::get('variants/create/{product}',[VariantController::class,'create'])->name('variants.create');
	Route::post('variants/{product}',[VariantController::class,'store'])->name('variants.store');
	Route::get('variants/edit/{product}/{variant}',[VariantController::class,'edit'])->name('variants.edit');
	Route::put('variants/update/{product}/{variant}',[VariantController::class,'update'])->name('variants.update');
	Route::get('variants/delete/{product}/{variant}',[VariantController::class,'destroy'])->name('variants.delete');
		// Status Update
		Route::post('variants/update/status',[VariantController::class,'updateStatus'])->name('variants.update-status');

	// Admin Variant Item
	Route::get('variantitems/{product}/{variant}',[VariantitemController::class,'index'])->name('variantitems.index');
	Route::get('variantitems/create/{product}/{variant}',[VariantitemController::class,'create'])->name('variantitems.create');
	Route::post('variantitems/{product}/{variant}',[VariantitemController::class,'store'])->name('variantitems.store');
	Route::get('variantitems/edit/{product}/{variant}/{variantitem}',[VariantitemController::class,'edit'])->name('variantitems.edit');
	Route::put('variantitems/update/{product}/{variant}/{variantitem}',[VariantitemController::class,'update'])->name('variantitems.update');
	Route::get('variantitems/delete/{product}/{variant}/{variantitem}',[VariantitemController::class,'destroy'])->name('variantitems.delete');
		// Status Update
		// Route::post('variantitems/update/status',[VariantitemController::class,'updateStatus'])->name('variantitems.update-status');

	// Admin Slider
	Route::resource('sliders', SliderController::class);
	Route::get('slider/delete/{slider}',[SliderController::class,'destroy'])->name('slider.delete');
		// Status Update
		Route::post('slider/update/status',[SliderController::class,'updateStatus'])->name('slider.update-status');	

	// Admin Footer Info
	Route::get('footerinfo/edit',[FooterInfoController::class,'edit'])->name('footerinfos.edit');
	Route::put('footerinfo/update/{footerInfo}',[FooterInfoController::class,'update'])->name('footerinfos.update');

	// Admin Footer Social
	Route::resource('footersocials', FooterSocialController::class);
	Route::get('footersocial/delete/{footersocial}',[FooterSocialController::class,'destroy'])->name('footersocial.delete');
		// Status Update
		Route::post('footersocial/update/status',[FooterSocialController::class,'updateStatus'])->name('footersocial.update-status');	

	// Admin Footer Grid Two
	Route::resource('footergridtwos', FooterGridTwoController::class);
	Route::get('footergridtwo/delete/{footergridtwo}',[FooterGridTwoController::class,'destroy'])->name('footergridtwo.delete');
		// Status Update
		Route::post('footergridtwo/update/status',[FooterGridTwoController::class,'updateStatus'])->name('footergridtwo.update-status');	
		
	// Admin Footer Grid Three
	Route::resource('footergridthrees', FooterGridThreeController::class);
	Route::get('footergridthree/delete/{footergridthree}',[FooterGridThreeController::class,'destroy'])->name('footergridthree.delete');
		// Status Update
		Route::post('footergridthree/update/status',[FooterGridThreeController::class,'updateStatus'])->name('footergridthree.update-status');	
		
	// Admin Footer Info
	Route::get('footergridtitle/edit',[FooterGridTitleController::class,'edit'])->name('footergridtitle.edit');
	Route::put('footergridtitle/update/{footergridtitle}',[FooterGridTitleController::class,'update'])->name('footergridtitle.update');

	// Admin Footer Payment
	Route::resource('footerpayments', FooterpaymentController::class);
	Route::get('footerpayment/delete/{footerpayment}',[FooterpaymentController::class,'destroy'])->name('footerpayment.delete');
		// Status Update
		Route::post('footerpayment/update/status',[FooterpaymentController::class,'updateStatus'])->name('footerpayment.update-status');	
	
	// Admin Blog Category
	Route::resource('blogcategories', BlogcategoryController::class);
	Route::get('blogcategory/delete/{blogcategory}',[BlogcategoryController::class,'destroy'])->name('blogcategory.delete');
		// Status Update
		Route::post('blogcategory/update/status',[BlogcategoryController::class,'updateStatus'])->name('blogcategory.update-status');	
		
	// Admin Blog Post
	Route::resource('blogposts', BlogpostController::class);
	Route::get('blogpost/delete/{blogpost}',[BlogpostController::class,'destroy'])->name('blogpost.delete');
		// Status Update
		Route::post('blogpost/update/status',[BlogpostController::class,'updateStatus'])->name('blogpost.update-status');

	// // Admin Setting
	// Route::get('setting/edit/{setting}',[SettingController::class,'edit'])->name('setting.edit');
	// Route::put('setting/update/{setting}',[SettingController::class,'update'])->name('setting.update');
	// Route::get('setting/delete/{setting}',[SettingController::class,'destroy'])->name('setting.delete');
	// 	// Status Update
	// 	Route::post('setting/update/status',[SettingController::class,'updateStatus'])->name('setting.update-status');	
		
});

// Fontend Contact Form
Route::get('contact', [PageController::class, 'contactview'])->name('contact.view');
Route::post('contact/submit', [PageController::class, 'contactFormSubmit'])->name('contact.form.submit');

// Frontend Blog Details
Route::get('blog/details/{blogpost}', [PageController::class, 'blogDetailsView'])->name('blog.details');
	// Blog Comment Submit
	Route::post('blog/comment/{blogpost}', [CommentController::class, 'blogCommentStore'])->name('blogpost.comment.store');
	// Blog Reply Submit
	Route::post('blog/reply-comment/{blogpost}/{comment}', [CommentController::class, 'blogReplyStore'])->name('blogpost.reply-comment.store');

