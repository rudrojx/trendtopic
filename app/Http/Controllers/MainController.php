<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Auth;
use App\Models\contactquerys;
use App\Models\trendcategory;
use App\Models\blogcomment;
use App\Models\blogdata;
use App\Models\bookmark;
use Illuminate\Support\Facades\Session;
class MainController extends Controller
{
    public function home(Request $request)
    {
        // $name = session('username');
        // $g_id = session('g_id');
       
        // if(session()->has('name')){
        // return view('home',['name' => $name],['g_id' => $g_id]);
        // }else{
        //     return redirect('/signup_sublime');
        // }
       //$getname = request()->cookie('user_name');
        //request()->cookie('user_email');

        // if(Auth::check()){
        //     return view('Public.Main');
        //     }else{
        //         return redirect('/signup');
        //     }
        $keyword = $request->input('keyword');
        if($keyword !="")
        {       
       // $results = Blogdata::with('trendcategory')->where('title', 'like', '%' . $keyword . '%')->get();
       $results = Blogdata::with('trendcategory')->where(function ($query) use ($keyword) {
        $query->where('title', 'like', '%' . $keyword . '%')
            ->orWhereHas('trendcategory', function ($categoryQuery) use ($keyword) {
                $categoryQuery->where('category_name', 'like', '%' . $keyword . '%');
            });
         })->get();

        return view('Public.searchresult', compact('results', 'keyword'));
        }
        else
        {
        $shuffledBlogData = Blogdata::with('trendcategory')->inRandomOrder()->first();
        $secondBlogPost = Blogdata::with('trendcategory')->inRandomOrder()->where('blog_id', '!=', $shuffledBlogData->blog_id)->first();
        $listcategory = trendcategory::all();
        return view('Public.Main',compact('shuffledBlogData','secondBlogPost','listcategory'));
        }
        
    }

    public function toggleBookmark($blog_id)
    {
        $userId = request()->cookie('user-id');
        if($userId){
            // Check if the user has already bookmarked the post
        $bookmark = bookmark::where('user_id', $userId)->where('blog_id', $blog_id)->first();
        if ($bookmark) {
            // If bookmark exists, remove it
            $bookmark->delete();
        } else {
           // dd($userId);
          $bookmarks = new bookmark();
          $bookmarks->user_id = $userId;
          $bookmarks->blog_id = $blog_id;
          $bookmarks->save();
        }
        return redirect()->back();
    }
    else{
        return redirect('/signup');
    }
    }

    public function showBookmarks()
    {
        $userId = request()->cookie('user-id');
        $blogData = blogdata::all();
        $bookmarks = Bookmark::where('user_id', $userId)->with(['blogdata'])->get();

        return view('Public.bookmarks', compact('bookmarks'));
    }

    public function topiclisting()
    {
        $shuffledBlogData = Blogdata::with('trendcategory')->inRandomOrder()->first();
        $secondBlogPost = Blogdata::with('trendcategory')->inRandomOrder()->where('blog_id', '!=', $shuffledBlogData->blog_id)->first();
        $listcategory = trendcategory::all();
        $data = blogdata::paginate(10);
        return view('Public.TopicListing',compact('data','shuffledBlogData','secondBlogPost','listcategory'));
    }

    public function topicdetails ($id)
    {
        $blogPost = Blogdata::with('trendcategory','blogimages')->findOrFail($id);
        $commentpost = blogcomment::where('blog_id', '=', $id)->get();
        return view('Public.TopicDetails',compact('blogPost', 'commentpost'));

    }

    public function contact()
    {
       return view('Public.contact');
    }

    public function UserLogin()
    {
        return view('Public.Log');
    }

    public function storecomments(Request $request)
    {
        $comments = new blogcomment();
        $comments->username = $request->input('username');
        $comments->userid = $request->input('userid');
        $comments->blog_id = $request->input('blog_id');
        $comments->comment = $request->input('comment');
        $comments->save();
        return back()->with('success','Comment Submitted Successfully!');
    }    
  
    public function storecontact(Request $request)
    {
       // $subject = $request['subject'];
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
            'subject' => $request->input('subject'),
        ];

        // Mail::send('Layout.mailformat', $data, function ($message) use ($data) {
        //     $message->to('emailid@example.com')
        //             ->subject('Customer Query');
        // });
        Mail::send(new ContactMail($data));
        //contactquerys::create($data);
       $contact = new contactquerys();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        $contact->subject = $request->input('subject');
        $contact->save();
        Session::flash('success','Your message has been sent!');

        return redirect('/contact');
    }

    
}
