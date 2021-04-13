<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='tbl_product';
    public $timestamps = true;
    public function Brand()
    {
    	return $this->hasMany('App\Brand','brand','id');
    }
    public function Category()
    {
    	return $this->hasMany('App\Category','id_cate','id');
    }
   
}
