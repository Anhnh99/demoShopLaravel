<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderDetail;
class OrderController extends Controller
{
    public function index(){
        $data=[];
        $data['order']=Order::All();
        return view('back_end.order.list_order',$data);
    }
    public function detail($id){
        $data=[];
        $data['order']=Order::find($id);
        $data['order_detail']=OrderDetail::where('order_id',$id)->get();
        return view('back_end.order.detail_order',$data);
    }
}
