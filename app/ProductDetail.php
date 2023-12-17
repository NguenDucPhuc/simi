<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_detail';
    public function product(){
    	return $this->belongsTo('App\Product','id_pro','id');
    }
    // public function color(){
    // 	return $this->belongsTo('App\Color','color_id','id');
    // }
}
