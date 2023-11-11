<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Auth;
use App\Models\contactquerys;
use App\Models\trendcategory;
use App\Models\blogdata;
use Illuminate\Support\Facades\Session;
class MainController extends Controller
{
    public function home()
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

        return view('Public.Main');
    }

    public function topiclisting()
    {
        $data = blogdata::paginate(10);
        return view('Public.TopicListing',compact('data'));
    }

    public function topicdetails ($id)
    {
        $blogPost = Blogdata::with('trendcategory','blogimages')->findOrFail($id);
        return view('Public.TopicDetails',compact('blogPost'));

    }

    public function contact()
    {
       return view('Public.contact');
    }

    public function UserLogin()
    {
        return view('Public.Log');
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
