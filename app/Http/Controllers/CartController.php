<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
   public function save_cart(Request $request){
     if (Auth::check()) {
        $productId= $request->productid_hidden;
        $quantity= $request->qty;
        $product_info = Product::where('id',$productId)->first();
        $data['id']= $productId;
        $data['qty']= $quantity;
        $data['name']= $product_info->name;
        $data['price']= $product_info->price;
        $data['weight']= $product_info->price;
        $data['options']['image']= $product_info->image;
        Cart::add($data);
     //    Cart::destroy();
        return redirect()->route('front-productDetail',$data['id'])->with(['msg'=>'Thêm vào giỏ hàng thành công']);
   }}
   public function show_cart(){
     if (Auth::check()) {
       return view('front_end.cart');
     }
   }
   public function delete_cart($rowId){
        Cart::update($rowId,0);
        return redirect()->route('front-show-cart');
   }
   public function update_cart(Request $request){
          $rowId= $request->rowId_cart;
          $qty= $request->quantity_cart;
      //  dd($rowId);
       Cart::update($rowId,$qty);
        return redirect()->route('front-show-cart');
   }
}
