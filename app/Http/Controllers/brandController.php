<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class brandController extends Controller
{
    public function allBrand(){
        $showBrand = DB::table('tbl_brand')->get();
        return view('Admin.brand',compact('showBrand'));
       
    }
    public function addBrand(Request $request){
        $name = $request->name;
        DB::table('tbl_brand')->insert([ 'brandName' => $name ]);
       
    }
    public function deleteBrand(Request $request){
        $id = $request->id;
        DB::table('tbl_brand')->where('id',$id)->delete();
       
    }
    public function editBrand(Request $request){
        $id = $request->id;
        $name = $request->name;
        if($name!=""){
            DB::table('tbl_brand')->where('id',$id)->update(['brandName'=>$name]);
        }
        
       
    }
}
