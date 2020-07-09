<?php

namespace App;
use App\Category;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';
    protected $fillable=['id','category_id','name','price','discount_price','quantity','description','image'];
    public $timestamp= true;

    public function getNameCate(){
        return Category::find($this->category_id);
    }
}
