<?php

namespace App\Http\Controllers;
use App\Models\blogdata;
use App\Models\trendcategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AddBlog()
    {
        $catdata = trendcategory::all();
        return view('Admin.AddBlog' , compact('catdata'));
    }

    public function StoreBlog(Request $request)
    {
        $blogData = new blogdata();
        $blogData->title = $request->input('title');
        $blogData->heading = $request->input('heading');
        $blogData->short_desc = $request->input('short_desc');
        $blogData->description = $request->input('description');
        $blogData->cat_id = $request->input('cat_id');
        $blogData->blog_summary = $request->input('blog_summary');
       
        if($request->hasFile('bannerimage'))
        {
            $file=$request->file('bannerimage');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/images',$filename);
            $blogData->banner_img  =$filename;
        }
            $blogData->save();
            return redirect()->back()->with("message","Blog Added Successfully");
            
            
    }

    public function AddCategory()
    {
        $catdata = trendcategory::all();
        return view('Admin.AddCategory', compact('catdata'));
    }

    public function StoreCategory(Request $request)
    {
        $category_data = new trendcategory();
        $category_data->category_name =$request->input('category_name');
        if($category_data->save())
        echo "Data Inserted Successfully";
        else
        echo "Failed to insert data";
        return redirect('/add-category');
    }
}