<?php

namespace App\Http\Controllers;
use App\Models\blogdata;
use App\Models\blogimage;
use App\Models\contactquerys;
use App\Models\trendcategory;
use App\Models\TrendUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    public function Dashboard()
    {
        return view('Admin.Dashboard');
    }

    public function ShowCustomerQuerys(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $userquerys = contactquerys::where('name','LIKE',"%$search%")->orwhere('id','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")->get();
        }else{
            $userquerys = contactquerys::all();
        }        
      
        $data = compact('userquerys','search');
        return view('Admin.CustomerQuerysList')->with($data);
    }

    public function DeleteQuery($id)
    {
        $querys = contactquerys::find($id);
        if(!is_null($querys))
        {
        $querys->delete();
        Session::flash('message', 'Contact Query move to trash successfully!');
        //return back()->withInput();
        return Redirect::to("/customer-querys")->withSuccessMessage('Contact Query move to trash Successfully.');
        //return redirect()->back();
        }else{
            abort(403, "Unauthorized action.");
            
        }
    }

    public function DeleteUsers($id)
    {
        $querys = TrendUsers::find($id);
        if(!is_null($querys))
        {
        $querys->delete();
        Session::flash('message', 'User move to trash successfully!');
        //return back()->withInput();
        return Redirect::to("/new-users")->withSuccessMessage('User move to trash Successfully.');
        //return redirect()->back();
        }else{
            abort(403, "Unauthorized action.");
            
        }
    }

    public function ShowUsers(Request $request)
    {
        $search = $request['search'] ?? "";
        if($search != "")
        {
            $users = TrendUsers::where('name','LIKE',"%$search%")->orwhere('id','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")->get();
        }else{
            $users =  TrendUsers::all();
        }        
      
        $data = compact('users','search');
        return view('Admin.UserLists')->with($data);
    }
    public function AddBlog()
    {
        $catdata = trendcategory::all();
        return view('Admin.AddBlog' , compact('catdata'));
    }

    public function EditBlog($id)
    {
        $blogData = blogdata::where("blog_id",$id)->with('trendcategory')->first();
        $catdata = trendcategory::all();
        return view('Admin.EditBlog' ,compact('blogData','catdata'));
        //return view('Admin.EditBlog');
    }

    public function UpdateBlog($id, Request $request)
    {
        $previousimage = blogdata::where('blog_id',$id)->first();
        $validatedData = Validator::make($request->all(), [
            'title'=> ['required'],
            'description'=> ['required'],
            'banner_img'=> ['mimes:jpeg,png,jpg|max:2048'],
            'short_desc'=> ['required'],
            'heading'=> ['required'],
            ]);
            if ($validatedData->fails()) {
                return response()->json(['errors' => $validatedData->errors()->all()]);
                } else {
                    $file = $request->file('banner_img');
                    if (!empty($file)) {
                         // Get the file extension
                        $filename = time(). "-Trendblog.".$request->file('banner_img')->getClientOriginalExtension();
                        $request->file('banner_img')->storeAs('public/blogimages',$filename);                       
                        $img=$filename;
                        } else {
                            $img=$previousimage->banner_img;
                            }
                            $update=blogdata::findOrFail($id);
                            $update->title = $request->input('title');
                            $update->description = $request->input('description');
                            $update->short_desc = $request->input('short_desc');
                            $update->heading = $request->input('heading');
                            $update->image = $img;
                            $update->blog_summary = $request->input('blog_summary');
                            $update->cat_id = $request->input('cat_id');
                            $update->save();
                            return redirect('/blog-list')->with('success', 'Updated Successfully!');
                            }   
                            

    }

    public function deleteBlog($id)
        {
            $blog = BlogData::find($id);
            
            if (!is_null($blog)) {
                // Get associated images
                $images = BlogImage::where('blog_id', $id)->get();
                
                // Delete each image
                foreach ($images as $image) {
                    // Delete image file from storage
                    // Uncomment the following lines if you want to delete the actual image files
                    // unlink(public_path("/upload/" . $image->image));
                    // unlink(public_path("/upload/" . "thumb_" . $image->image));

                    // Delete the image record from the database
                    $image->delete();
                }

                // Delete the blog record from the database
                $blog->delete();

                Session::flash('message', 'Blog moved to trash successfully!');
                return redirect("/blog-list")->withSuccessMessage('Blog moved to trash successfully.');
            } else {
                abort(403, "Unauthorized action.");
            }
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
            $blogs = blogdata::all();
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