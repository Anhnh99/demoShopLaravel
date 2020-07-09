<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ListProductController extends Controller
{
    public function index(){
        $data['listPro']=Product::All();
        $data['listCate']=Category::All();
        return view('front_end.product',$data);
    }
    public function cate($id){
        $data['listCate']=Category::All();
        $data['getNameCate']=Category::find($id);
        $data['data']=Product::where('category_id',$id)->get(); 
        return view('front_end.category_product',$data);
    }
}
