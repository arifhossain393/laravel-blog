<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.insertpost', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|unique:posts',
            'image' => 'required|mimes:jpeg,bmp,png,jpg',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required'
        ]);

        $image = $request->image;
        $slug = str_slug($request->title);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }
            $postimage = Image::make($image)->resize(1600,1066)->save($imagename);
            Storage::disk('public')->put('post/'.$imagename,$postimage);
            }else{
                $imagename = "default.png";
            }
            $post = new Post();
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->slug = $slug;
            $post->image = $imagename;
            $post->body = $request->body;
            if(isset($request->status)){
                $post->status = true;
            }else{
                $post->status = false;
            }
            $post->is_approved = true;
            $post->save();

            $post->categories()->attach($request->categories);
            $post->tags()->attach($request->tags);
            Toastr::success('Post saved successfully :)', 'success');
            return redirect()->route('admin.post.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //show the post edit page
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.editpost', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //update post
        $this->validate($request,[
            'title' => 'required|unique:posts',
            'image' => 'image',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required'
        ]);

        $image = $request->image;
        $slug = str_slug($request->title);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('post'))
            {
                Storage::disk('public')->makeDirectory('post');
            }
            // delete old image
            if(Storage::disk('public')->exists('post/'.$post->image))
            {
                Storage::disk('public')->delete('post/'.$post->image);
            }
            $postimage = Image::make($image)->resize(1600,1066)->save($imagename);
            Storage::disk('public')->put('post/'.$imagename,$postimage);
            }else{
                $imagename = $post->image;
            }
            
            $post->user_id = Auth::id();
            $post->title = $request->title;
            $post->slug = $slug;
            $post->image = $imagename;
            $post->body = $request->body;
            if(isset($request->status)){
                $post->status = true;
            }else{
                $post->status = false;
            }
            $post->is_approved = true;
            $post->save();

            $post->categories()->sync($request->categories);
            $post->tags()->sync($request->tags);

            Toastr::success('Post Update successfully :)', 'success');
            return redirect()->route('admin.post.index');
    }

    public function pending()
    {
        $posts = Post::where('is_approved', false)->get();
        return view('admin.post.pending', compact('posts'));
    }
    public function approve($id)
    {
        $post = Post::find($id);
        if($post->is_approved == false){
            $post->is_approved = true;
            $post->save();
            Toastr::success('Post Approve:)', 'success');
        }else{
            Toastr::info('this post already approved)', 'Info');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
