<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function addCart(Request $request){
       
      
        Cart::add([
           
            ['id' => $request->cart_product_id, 
            'name' => $request->cart_product_name, 
            'qty' => 1, 
            'price' => ($request->cart_product_price), 
            'weight' => 0, 
            'options' => ['image' => $request->cart_product_image]]
          ]);
         
        return view('User.cart');
       
    }
    public function Cart(){
        return view('User.listcart');
    }
    public function updateCart(Request $request){
        
        Cart::update($request->id, $request->cart_product_quantity);
        return view('User.cart');
    }
    public function deleteItemCart(Request $request){
        Cart::remove($request->id);
        return view('User.cart');
    }
    public function loadCart(Request $request){
        
         return view('User.iconcart');
    }
    public function SessionCart(Request $request){
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $address = $request->address;
        $token = $request->_token;
        session(['name' => $name]);
        session(['phone' => $phone]);
        session(['email' => $email]);
        session(['address' => $address]);
        session(['token' => $token]);
    }

    public function Order($type){
        // 1 online 2shipcod
        // status 1 da thanh toan 2 chua thanh toan
        if(Session::get('token')!=""){
            $mytime = Carbon::now('Asia/Ho_Chi_Minh');
            $name = Session::get('name');
            $phone = Session::get('phone');
            $email = Session::get('email');
            $address = Session::get('address');
            $user = Session::get('id_user');
            if($type == 1){
                DB::table('tbl_orders')->insert(['name'=>$name ,
                'phone'=>$phone,
                'email'=>$email,
                'address'=>$address,
                'status'=>1,
                'type'=>1,
                'user'=>$user,
                'date'=>$mytime]);
            }elseif($type == 2){
                DB::table('tbl_orders')->insert(['name'=>$name ,
                'phone'=>$phone,
                'email'=>$email,
                'address'=>$address,
                'status'=>2,
                'type'=>2,
                'user'=>$user,
                'date'=>$mytime]);
            }
           else{
            return view('User.Error');
           }
          
            $id_order = DB::table('tbl_orders')->orderBy('id_order', 'desc')->first();
            foreach(Cart::content() as $row){
                $total = $row->qty * $row->price;
               
                DB::table('tbl_details')->insert(['id_order'=>$id_order->id_order ,
                                            'idProduct'=>$row->id,
                                            'price'=>$row->price,
                                            'subtotal'=>$total,
                                            'qty'=>$row->qty,
                                           ]);
            }
            Cart::destroy();
            // session()->flush();
            return view('User.Success');
        }
        else
         return view('User.Error');

        
    }
    public function wishlist(Request $request){
        $id = $request->wishlist;
        $cart_product_price = $request->cart_product_image;
        echo $cart_product_price;
    }
    public function getwishlist(Request $request){
       
        return $request->cookie('whishlist');
    }

    //// admin
    public function allBill(){
        $listbill = DB::table('tbl_orders')->get();
       
        return view('Admin.listbill',compact('listbill'));
    }

    public function getBillDetails(Request $request){
        $id = $request->quickview_id;
        $user = DB::table('tbl_orders')->where('id_order',$id)->first();
    
        $result = DB::table('tbl_details')->join('tbl_product', 'tbl_details.idProduct', '=', 'tbl_product.id')
        ->select('tbl_details.*', 'tbl_product.name')
        ->where('tbl_details.id_order',$id)->get();
        return view('Admin.quickview_details',compact('result','user'));

    }

    public function updateStatus(Request $request){
        $id = $request->id;
        $stt = $request->stt;
         DB::table('tbl_orders')->where('id_order',$id)->update(['status'=> $stt]);
        // echo $id;
        
       
        // $listbill = DB::table('tbl_orders')->get();
       
        // return view('Admin.updatebill',compact('listbill'));
        
    }

    
}
