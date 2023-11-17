<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrendUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
class AuthController extends Controller
{
    // Google Control Functions :- 
    
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try{

            $user = Socialite::driver('google')->user();

           $check_user =  TrendUsers::where('google_id',$user->getId())->first();

           if(!$check_user)
           {
            $saveUser = TrendUsers::updateOrCreate(
                ['google_id'=>$user->getId()],
                [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_token' => $user->token,
                ]
             );
           }
           else{
           $saveUser =  TrendUsers::where('google_id',$user->getId())->update([
                'email' => $user->getEmail(),'google_token' => $user->token
            ]);
            $saveUser = TrendUsers::where('google_id',$user->getId())->first();
           }

           Auth::loginUsingId($saveUser->id); 
           sleep(1);
          // dd(session()->all());                
            //dd(Auth::check());
           

        }catch(\Throwable $th){
            throw $th;
        }
        return redirect('/')->withCookie(cookie('user_name', $user->name, 60))
        ->withCookie(cookie('user_email', $user->email, 60))->withCookie(cookie('user-id', $saveUser->id,60));
      
    }

    // Github Control Functions :

    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGitHubCallback()
    {
        try{

            $user = Socialite::driver('github')->user();

           $check_user =  TrendUsers::where('github_id',$user->getId())->first();

           if(!$check_user)
           {
            $saveUser = TrendUsers::updateOrCreate(
                ['github_id'=>$user->getId()],
                [
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'github_token' => $user->token,
                ]
             );
           }
           else{
           $saveUser =  TrendUsers::where('github_id',$user->getId())->update([
                'email' => $user->getEmail(),'github_token' => $user->token,
            ]);
            $saveUser = TrendUsers::where('github_id',$user->getId())->first();
           }

           Auth::loginUsingId($saveUser->id);       
           sleep(1);

        }catch(\Throwable $th){
            throw $th;
        }
        return redirect('/')->withCookie(cookie('user_name', $user->name, 60))
        ->withCookie(cookie('user_email', $user->email, 60));
      
    }

    public function UserLogout()
    {
        // Auth::logout();  
        // request()->session()->regenerate();       
        return redirect('/')->withCookie(Cookie::forget('user_name'));
    }

        
}
