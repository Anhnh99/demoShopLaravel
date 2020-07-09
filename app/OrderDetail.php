<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class OrderDetail extends Model
{
    protected $table='order_detail';
    protected $fillable=['order_id','product_id','price','quantity'];
    public $timestamp=true;
    function getNameProduct(){
        return Product::find($this->product_id);
    }
}
