<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestCheckout;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
class CheckoutController extends Controller
{
    public function create(RequestCheckout $request){
        if($request->isMethod('post')){
        $order= new Order();
        $order->id_user = Auth::id();
        $order->address = $request->txt_address;
        $order->phonenumber = $request->txt_phone;
        if(isset($request->txt_note)){
            $order->note = $request->txt_note;
        }else{
            $order->note = '';
        }
        
        $order->save();
    $cart=Cart::content();
        foreach($cart as $val){
            $order_detail= new OrderDetail();
            $order_detail->order_id = $order->id;
            $order_detail->product_id = $val->id;
            $order_detail->price = $val->price;
            $order_detail->quantity = $val->qty;
            $order_detail->save();
        }
       
        return redirect()->route('front-home')->with(['msg'=>'Đặt hàng thành công']);
        }

        return view('front_end.checkout');
    }
}
