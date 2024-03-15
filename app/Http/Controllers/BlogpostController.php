<?php

namespace App\Http\Controllers;

use App\Models\Blogcategory;
use App\Models\Blogpost;
use Illuminate\Http\Request;

use App\Http\Traits\ImageUpload;

class BlogpostController extends Controller
{

    use ImageUpload;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogposts = Blogpost::with('blogcategory')->latest()->get();
        return view('backend.blog.blog-post.index', compact('blogposts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogcategories = Blogcategory::orderBy('name', 'asc')->get();
        return view('backend.blog.blog-post.create', compact('blogcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:blogposts',
            'blogcategory_id' => 'required|exists:blogcategories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'description' => 'required|string',
            'is_popular'  => 'required|boolean',
            'seo_title' => 'nullable|string',
            'seo_description' => 'nullable|string',
            'status'  => 'required|boolean',
        ]);
 
        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['admin_id'] = auth()->guard('admin')->id();
        $data['slug'] = \Str::slug($request->title);

        $data['image'] = $this->uploadImage($request, 'image', 'blogpost_image-', 'blogpost_images', 1210, 637);

        Blogpost::create($data);

        $notifications = array(
            'messege' => 'Blog post created successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->route('admin.blogposts.index')->with($notifications);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blogpost $blogpost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blogpost $blogpost)
    {
        $blogcategories = Blogcategory::orderBy('name', 'asc')->get();
        return view('backend.blog.blog-post.edit', compact('blogpost', 'blogcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blogpost $blogpost)
    {
        $request->validate([
            'image' => 'required_if:type,file|image|mimes:jpeg,png,jpg,svg|max:2048',
            'blogcategory_id' => 'required|exists:blogcategories,id',
            'title' => 'required|string|max:255|unique:blogposts,title,'. $blogpost->id,
            'description' => 'required|string',
            'is_popular'  => 'required|boolean',
            'seo_title' => 'nullable|string',
            'seo_description' => 'nullable|string',
            'status'  => 'required|boolean',
        ]);
 
        // dd($request->all());

        $data = [];
        $data = $request->all();
        $data['admin_id'] = auth()->guard('admin')->id();
        $data['slug'] = \Str::slug($request->title);

        if($request->hasFile('image')){
            $data['image'] = $this->updateImage($request, $blogpost->image, 'image', 'blogpost_image-', 'blogpost_images', 1210, 637);
        }
        else{
            $data['image'] = $blogpost->image;
        }

        $blogpost->update($data);

        $notifications = array(
            'messege' => 'Blog post updated successfully!!',
            'alert-type' => 'info',
        );
        return redirect()->route('admin.blogposts.index')->with($notifications);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blogpost $blogpost)
    {
        $this->deleteImage($blogpost->image);
        $blogpost->delete();
        $notifications = array(
            'messege' => 'Blog post deleted successfully!!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notifications);
    }


    // Ajax Update Status
    public function updateStatus(Request $request){
        $data = Blogpost::find($request->id);
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
