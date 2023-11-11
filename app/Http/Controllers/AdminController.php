<?php

namespace App\Http\Controllers;
use App\Models\blogdata;
use App\Models\blogimage;
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
        
        if ($request->hasFile('bannerimage')) {
            // Get the file extension
            $filename = time(). "-Trendblog.".$request->file('bannerimage')->getClientOriginalExtension();
            $request->file('bannerimage')->storeAs('public/blogimages',$filename);
            $blogData->banner_img = $filename;
        } else {
            // Handle the case when no file is uploaded
            echo "No file was uploaded";
        }
            if($blogData->save())
            {
                if ($request->hasFile('blogimgs')) 
                {
                    foreach ($request->file('blogimgs') as $image) 
                    {
                        $name=$image->getClientOriginalName();
                         $image->storeAs('public/blogimages',$name);    
                        
                        $bimg = new blogimage();
                        $bimg->blog_id = $blogData->blog_id;                    
                        $bimg->blogimgs = $name;
                        $bimg->save();
                    }
                }
                    echo "success";
                    return redirect()->back()->with("message","Blog Added Successfully");
             }
                else
                {
                    return redirect('/admin/error');
                        echo("error");
                }           
            
    }

    public function ShowBlogs(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $blogs = blogdata::where('title','LIKE',"%$search%")->orwhere('blog_id','LIKE',"%$search%")->with('trendcategory')->get();
        }else{
            $blogs = blogdata::paginate(10);
        }
        
        //$blogs = blogdata::with('trendcategory')->get();
        $data = compact('blogs','search');

        return view('Admin.BlogList')->with($data);
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