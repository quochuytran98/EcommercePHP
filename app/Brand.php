<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table='tbl_brand';
    public $timestamps = true;
    public function Product()
    {
    	return $this->hasMany('App\Product','id','brand');
    }
}
