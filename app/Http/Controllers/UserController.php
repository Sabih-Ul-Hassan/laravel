<?php

namespace App\Http\Controllers;
use App\Models\user;
use App\Models\book;
use Illuminate\Http\Request;
use Validator;
use Session;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function signUp(Request $request){
        

        return view("signup")->with(['message'=>$request->message]);
    }
    public function authenticate(Request $request){
        $ok = $request->validate(['username'=>'required','password'=>'required']);
        $user = user::where('username', $request->username)->first();
        if($user && Hash::check($request->password,$user->password) )
        {
            Session::put('username',$request->username);
            return redirect()->route('books');
        }
        
        return redirect()->route('login',['message'=>"login failed! invalid username or password"]);

    }
    public function login (Request $request){
        if(Session::has('username')) return redirect()->route('books');
         
        return view('login')->with(['message'=>$request->message]);


    }
    public function logout (Request $request){
        if(Session::has('username')) {
            Session::forget('username');
               } 
        return redirect('login');


    }
    public function createUser(Request $request){
       $ok = $request->validate(['username'=>'required','password'=>'required']);
       $user =  new user;
       $user->username =  $request->username;
       $user->password =  $request->password;
        $duplicate = user::where('username',$request->username)->first();
        if(!$duplicate)
        {    $user->save(); 
            return redirect()->route("login",['message'=>'user '.$request->username.' created successfully']);
        }
    else  return redirect()->route("signup",['message'=>'user already exists with the username ' .  $request->username]);
    }
}
