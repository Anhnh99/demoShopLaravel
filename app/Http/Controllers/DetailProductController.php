<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Comment;
use Illuminate\Support\Facades\Auth;
class DetailProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data['objPro']= Product::find($id);
        $data['cate']= Category::All();
        $data['comment']= Comment::where('product_id',$id)->get();
        $category_id= $data['objPro']->category_id;
        $pro_id= $data['objPro']->id;
        $data['otherPro']=Product::where('category_id',$category_id)->where('id','!=',$pro_id)->take(4)->get();
        // dd($data['otherPro']);
        return view('front_end.product_detail',$data);
    }

    public function comment($id , Request $request)
    {
        if($request->isMethod('post')){
            $comment= new Comment();
            $comment->user_id=Auth::id();
            $comment->product_id = $request->txt_product;
            $comment->content=$request->txt_content;
            $comment->save();
            return back()->with(['msg'=>'Bạn đã bình luận']);
        }
        

    }
    public function deleteComment($id){
        $delete= Comment::find($id);
        $delete->delete();
        return back()->with(['msg'=>'Đã xóa bình luận']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
