<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::latest()->get();
        return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.insertcat');
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
            'name' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,bmp,png,jpg'
       ]);
    //    get form image
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
           $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        //    check category dir
            if(!Storage::disk('public')->exists('category')){
                Storage::disk('public')->makeDirectory('category');
            }
            $category = Image::make($image)->resize(700,500)->save($imagename);
            Storage::disk('public')->put('category/'.$imagename,$category);
            // check category slider dir
            if(!Storage::disk('public')->exists('category/slider')){
                Storage::disk('public')->makeDirectory('category/slider');
            }
            $slider = Image::make($image)->resize(500,300)->save($imagename);
            Storage::disk('public')->put('category/slider/'.$imagename,$slider);
        }else{
            $imagename = "default.png";
        }
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->image = $imagename;
        $category->save();
        Toastr::success('Category saved successfully :)', 'success');
        return redirect()->route('admin.category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
