<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Account;
class Order extends Model
{
    protected $table="order";
    protected $fillable=['id','id_user','address','phonenumber','note'];
    public $timestamp=true;
    function getNameUser(){
        return Account::find($this->id_user);
    }
    
}
