<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='tbl_category';
    public $timestamps = true;
    public function Product()
    {
    	return $this->hasMany('App\Product','id','id_cate');
    }
}
