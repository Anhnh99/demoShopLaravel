<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table='users';
    protected $fillable=['id','fullname','account','password','role'];
    public $timestamp=true;
}
