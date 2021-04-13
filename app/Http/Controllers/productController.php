<?php

namespace App\Http\Controllers;
use App\Product;
use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Constraint\Count;
use Validator;
class productController extends Controller
{
    public function productList(){
        $show_product = DB::table('tbl_product')->join('tbl_brand', 'tbl_product.brand', '=', 'tbl_brand.id')
                                                ->select('tbl_product.*', 'tbl_brand.brandName')
                                                ->get();
        
        $showBrand = DB::table('tbl_brand')->get();
        $showCate = DB::table('tbl_category')->get();
        return view('Admin.product',compact('show_product','showBrand','showCate'));
    }
   
    public function addProduct(Request $request){
       $idBrand = $request->Brandname;
       $name = $request->Productname;
       $Type = $request->Type;
       $status = 0;
        $price = $request->Price;
        $quantity = $request->Quantity;
        $description = $request->Description;
        $cate = $request->Category;
        $filename = "";
        $image=$request->file('image');
        if($image == null){
            return;
        }
            
        for($i =0;$i< Count($image);$i++){
            $goc=$image[$i]->getClientOriginalExtension(); 
            $imgname =   "bronze-".Str::random(3).rand(0,999).".".$goc;
           
            $filename =$filename. ",".$imgname;
            $image[$i]->move('public\image_product',$imgname);
        }
        $data=array([
            'name'=>$name,
            'price'=>$price,
            'quantity'=>$quantity,
            'description'=>$description,
            'brand'=>$idBrand,
            'status'=>$status,
            'type'=>$Type,
            'id_cate'=>$cate,
            'image'=>$filename

        ]);
        if (DB::table('tbl_product')->insert($data))
        {
            
            $success='Add product successful';
            echo $success;
         }
        return back();
        
    }
    public function getProduct($id_product){
        $showBrand = DB::table('tbl_brand')->get();
        $show_product = DB::table('tbl_product')->where('id', $id_product)->first();
        return view("Admin.updateProduct",compact('show_product','showBrand'));
    }
    public function updateProduct($id,Request $request){
        $idBrand = $request->Brandname;
        $name = $request->Productname;
         $price = $request->Price;
         $quantity = $request->Quantity;
         $description = $request->Description;
         $status = $request->Status;
         $image=$request->file('image');
         
         if($image==null){
            
           
             DB::table('tbl_product')->where('id',$id)->update([
                'name'=> $name,
                'price'=> $price,
                'quantity'=> $quantity,
                'description'=> $description,
                'brand'=>$idBrand,
                'status'=> $status,
               
            ]);
             
         }else{
            $goc=$image->getClientOriginalExtension();    
            if($goc=='jpg' || $goc=='jpeg' || $goc='png'){
                $images="bronze-".Str::random(3).rand(0,999).".".$goc;
                
                // $delete=DB::table('tbl_product')->where('id',$id)->first();
                // $path=public_path().'\image_product'.$delete->image;
                //  unlink($path);
                if (DB::table('tbl_product')->where('id',$id)->update([
                    'name'=> $name,
                    'price'=> $price,
                    'quantity'=> $quantity,
                    'description'=> $description,
                    'brand'=>$idBrand,
                    'status'=> $status,
                    'image'=>$images,
                   
                ]))
                {
                    
                    $image->move('public\image_product',$images);
                    return redirect()->route('product');
                 }
    
            }else{
                $error="File bạn chọn phải có đuôi jpg hoặc jpeg";
                echo $error;
            }
         }
         return redirect()->route('product');
    }
    public function deleteproduct(Request $request){
        $id = $request->id;
        DB::table('tbl_product')->where('id',$id)->delete();
    }


    //////USER

    public function quickview(Request $request){
        $id = $request->quickview_id;
        $details = DB::table('tbl_product')->join('tbl_brand', 'tbl_product.brand', '=', 'tbl_brand.id')
        ->select('tbl_product.*', 'tbl_brand.brandName')
        ->where('tbl_product.id',$id)
        ->first();
        return view ('User.quickview',compact('details'));
    }
    public function details($id){
        $details = DB::table('tbl_product')->join('tbl_brand', 'tbl_product.brand', '=', 'tbl_brand.id')
        ->select('tbl_product.*', 'tbl_brand.brandName')
        ->where('tbl_product.id',$id)
        ->first();

        $productBrand = DB::table('tbl_product')->join('tbl_brand', 'tbl_product.brand', '=', 'tbl_brand.id')
        ->select('tbl_product.*', 'tbl_brand.brandName')
        ->where('tbl_brand.id',$details->brand)
        ->where('tbl_product.status',1)
        ->get();
        $productCate = DB::table('tbl_product')->join('tbl_brand', 'tbl_product.brand', '=', 'tbl_brand.id')
        ->join('tbl_category', 'tbl_product.id_cate', '=', 'tbl_category.id')
        ->select('tbl_product.*', 'tbl_brand.brandName')
        ->where('tbl_product.id_cate',$details->id_cate)
        ->where('tbl_product.status',1)
        ->get();
        return view ('User.details',compact('details','productBrand','productCate'));
    }



    public function Search($key){
        $category  = DB::table('tbl_category')->get();
        
        $product = $search = Product::where('name','LIKE','%'.$key.'%')->get();
        return view('User.listproduct',compact('product','category'));
    }
    
    public function GetProductBrand($id){
        $category  = DB::table('tbl_category')->get();
        $product = DB::table('tbl_product')->join('tbl_brand', 'tbl_product.brand', '=', 'tbl_brand.id')
        ->select('tbl_product.*', 'tbl_brand.brandName')
        ->where('tbl_product.status',1)
        ->where('tbl_product.brand',$id)
        ->get();
        return view('User.listproduct',compact('product','category'));
    }
    public function GetAllProduct(){
        $category  = DB::table('tbl_category')->get();
        $product = DB::table('tbl_product')->join('tbl_brand', 'tbl_product.brand', '=', 'tbl_brand.id')
                    ->select('tbl_product.*', 'tbl_brand.brandName')
                    ->where('tbl_product.status',1)
                    ->get();
                    return view('User.listproduct',compact('product','category'));
       
            
       
        }
        public function GetProductCate($id){
            $category  = DB::table('tbl_category')->get();
            $product = DB::table('tbl_product')->join('tbl_brand', 'tbl_product.brand', '=', 'tbl_brand.id')
                        ->select('tbl_product.*', 'tbl_brand.brandName')
                        ->where('tbl_product.id_cate',$id)
                        ->get();
                        return view('User.listproduct',compact('product','category'));
           
                
           
            }

}
