<?php

namespace App;
use App\Account;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comment';
    protected $fillable=['id','user_id','product_id','content'];
    public $timestamp=true;
    
    public function getNameUser(){
        return Account::find($this->user_id);
    }
    public function getNamePro(){
        return Product::find($this->product_id);
    }
}
