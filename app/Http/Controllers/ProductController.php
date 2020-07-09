<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Comment;
use App\Http\Requests\RequestEditProduct;
use App\Http\Requests\RequestProduct;
use Illuminate\Support\Facades\Log;
// use \stdClass;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Product::All();
        return view('back_end.product.list_product', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RequestProduct $request)
    {
        $category = Category::all();
        if ($request->isMethod('post')) {
            $file = $request->file('txt_image');
            // lấy danh sách đuôi file hợp lệ đã định nghĩa trong config
            $file_allow_upload = config('app.file_allow_upload');
            if (!in_array($file->getClientMimeType(), $file_allow_upload)) {
                echo 'Bạn chỉ có thể upload các file dạng: ' . implode('; ', $file_allow_upload);
                die();
            }
            $file_info = new \stdClass();
            $file_info->name = $file->getClientOriginalName();
            $destinationPath = 'uploads';
            $file->move($destinationPath, $file->getClientOriginalName());
            // dùng cái link dưới đây để lưu vào CSDL nhé.
            $file_info->link_img = 'uploads/' . $file->getClientOriginalName();
                // không có lỗi, ghi CSDL
                $data = new Product();
                $data->category_id = $request->get('txt_category');
                $data->name = $request->get('txt_name');
                $data->price = $request->get('txt_price');
                $data->discount_price = $request->get('txt_discount');
                $data->quantity = $request->get('txt_quantity');
                $data->description = $request->get('txt_description');
                $data->image =    $file_info->link_img;
                $data->save();
            $message = "'Sản phẩm'.$data->name.'đã được thêm'";
            Log::notice($message);
                return redirect()->route('back-product')->with(['msg'=>'Thêm sản phẩm thành công']);
        }

        return view('back_end.product.add_product', ['category' => $category]);
    }


    public function edit($id, RequestEditProduct $request)
    {
        $dataView = ['errs' => []];
        $dataView['data'] = Product::find($id);
        $pro=Product::find($id);
        $dataView['category'] = Category::All();
        if ($request->isMethod('post')) {
                $pro->category_id = $request->get('txt_category');
                $pro->name = $request->get('txt_name');
                $pro->price = $request->get('txt_price');
                $pro->discount_price = $request->get('txt_discount');
                $pro->quantity = $request->get('txt_quantity');
                $pro->description = $request->get('txt_description');
                if ($request->hasFile('txt_image')) {
                    $file = $request->file('txt_image');
                    // lấy danh sách đuôi file hợp lệ đã định nghĩa trong config
                    $file_allow_upload = config('app.file_allow_upload');
                    if (!in_array($file->getClientMimeType(), $file_allow_upload)) {
                        echo 'Bạn chỉ có thể upload các file dạng: ' . implode('; ', $file_allow_upload);
                        die();
                    }
                    $file_info = new \stdClass();
                    $file_info->name = $file->getClientOriginalName();
                    $destinationPath = 'uploads';
                    $file->move($destinationPath, $file->getClientOriginalName());

                    // dùng cái link dưới đây để lưu vào CSDL nhé.
                    $pro->image = 'uploads/' . $file->getClientOriginalName();
                }
                $pro->save();
            $message = "'Sản phẩm'.$pro->name.'đã được sửa'";
            Log::notice($message);
                return redirect()->route('back-product')->with(['msg'=>'Sửa sản phẩm thành công']);
            
        }
        return view('back_end.product.edit_product', $dataView);
    }

    public function destroy($id)
    {

        $delete = Product::find($id);
        $deleteCmt=Comment::where('product_id',$id)->get();
        if(count($deleteCmt)>0){
            Comment::where('product_id',$id)->delete();
            $delete->delete();
            $message = "'Sản phẩm'.$delete->name.'đã xóa'";
            Log::notice($message);
            return redirect()->route('back-product')->with(['msg'=>'Xóa sản phẩm thành công']);
            // dd($deleteCmt);   
        }else{
            $delete->delete();
            $message = "'Sản phẩm'.$delete->name.'đã xóa'";
            Log::notice($message);
            return redirect()->route('back-product')->with(['msg'=>'Xóa sản phẩm thành công']);
        }
    }
    public function search(Request $request){
        $name=$request->get('txt_text');
        $products['products'] = Product::where('name', 'LIKE', '%'.$name.'%')->get();
        return view('back_end.product.search_product',$products);
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
}
