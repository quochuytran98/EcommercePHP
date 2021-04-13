<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\Storage;
use Validator;
class homeController extends Controller
{
    public function index()
    {
       
        $show_product = DB::table('tbl_product')->join('tbl_brand', 'tbl_product.brand', '=', 'tbl_brand.id')
                                                ->select('tbl_product.*', 'tbl_brand.brandName')
                                                ->where('tbl_product.status',1)
                                                ->orderByRaw('tbl_product.name DESC')
                                                ->get();
        
        $newProduct = DB::table('tbl_product')->join('tbl_brand', 'tbl_product.brand', '=', 'tbl_brand.id')
                    ->select('tbl_product.*', 'tbl_brand.brandName')
                    ->where('tbl_product.status',1)
                    ->orderByRaw('tbl_product.id DESC')
                    ->limit(8)
                    ->get();
        $featureProduct = DB::table('tbl_product')->join('tbl_brand', 'tbl_product.brand', '=', 'tbl_brand.id')
                    ->select('tbl_product.*', 'tbl_brand.brandName')
                    ->where('tbl_product.type',1)
                    ->where('tbl_product.status',1)
                    
                    ->limit(8)
                    ->get();            
        return view('User.index',compact('show_product','newProduct','featureProduct'));
    }
}
