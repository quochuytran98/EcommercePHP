<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\User;
use Socialite;
class UserController extends Controller
{
    public function getLogin(){
        return view('user.login');
    }
    public function Login(Request $request)
    {
        $email=$request->input('emailUser');
        $password=$request->input('lgPassword');
      
        if (Auth::attempt(['email' => $email, 'password' => $password])){

          $user=User::where('email', $email)->first();
          $name=$user->name;
          $level=$user->level;
          Session::put('id_user',$user->id);
          Session::put('name_admin',$name);
          Session::put('name_user',$name);
          Session::put('level',$level);
          if (Auth::user()->level==2){
            return redirect('/');
          }else{
            $error="Sai Email Hoặc Mật Khẩu";
            return view('User.login',compact('error'));
  
          }
         
          
        }else{
          $error="Sai Email Hoặc Mật Khẩu";
          return view('User.login',compact('error'));

        }
        
    }
    public function Register(Request $request){
       $email=$request->email;
      $password=$request->password;
      $name=$request->name;
      $repassword=$request->repassword;
      $result = "";
      if($email== ""){
        echo "Email not is Empty!";
        return;
      }
      if($name == ""){
        echo "Name not is Empty!";
        return;
      }
      if($password != $repassword || $password == ""){
        $result = "Password error";
        echo $result;
        
      }
      else{
        $old_user = User::where('email',$email)->first();
          
              if($old_user){
                echo "Email not available";
              }
              else{
                $pass=bcrypt($password);
                if( DB::table('users')->insert(['name'=>$name,'email'=>$email,'password'=>$pass,'level'=>2])){
            
                  echo "Resgiter Success";
            
                }
              }
      }
      

      
    }
    public function profile(){
      $id = Session::get('id_user');
     
      if($id){
        $listbill = DB::table('tbl_orders')->where('user',$id)->get();
        
        
        return view('User.profile',compact('listbill'));
      }

      else
        return view('User.login');
      }

      public function Details_order(Request $request)
      {
        $id= $request->detail;
        $user = DB::table('tbl_orders')->where('id_order',$id)->first();
    
        $result = DB::table('tbl_details')->join('tbl_product', 'tbl_details.idProduct', '=', 'tbl_product.id')
        ->select('tbl_details.*', 'tbl_product.name')
        ->where('tbl_details.id_order',$id)->get();
         return view('User.details_bill',compact('result','user'));
      }
}
