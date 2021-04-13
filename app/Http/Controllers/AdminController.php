<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\User;
class AdminController extends Controller
{
   
    
    public function index()
    {
      if (Auth::user()->level==2) {
        Auth::logout();
        return view('Admin.login');
      }else{
        return view('Admin.home');
      }

     
          
        
    }
    public function getLogin(){
      return view('admin.login');
    }
    public function Login(Request $request){
        $email=$request->input('email');
        $password=$request->input('password');
      
        if (Auth::attempt(['email' => $email, 'password' => $password])){

          $user=User::where('email', $email)->first();
          $name=$user->name;
          $level=$user->level;
          Session::put('id_user',$user->id);
          Session::put('name_admin',$name);
          Session::put('name_user',$name);
          Session::put('level',$level);
          if (Auth::user()->level==2) {
            Auth::logout();
            return redirect('Admin.home');
          }else{
            return view('Admin.home');
          }
          
        }else{
          $error="Sai Email Hoặc Mật Khẩu";
          return view('admin.login',compact('error'));

        }
      }
}
