<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Category::All();
        return view('back_end.category.list_category', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dataView = ['errs' => []];
        if ($request->isMethod('post')) {
            $rule = [
                'txt_name' => 'required'
            ];
            // viết lại câu thông báo thành tiếng Việt
            $msgE = [
                'txt_name.required' => 'Bạn cần nhập tên danh mục',
            ];
            // bắt đầu kiểm tra
            $validator = Validator::make($request->all(), $rule, $msgE);
            // check có lỗi hay không
            if ($validator->fails())
                $dataView['errs'] = $validator->errors()->toArray();
            else {
                // không có lỗi, ghi CSDL
                $data = new Category();
                $data->name = $request->get('txt_name');
                $data->save();
                return redirect()->route('back-category')->with(['msg'=>'Thêm danh mục thành công']);
            }
        }

        return view('back_end.category.add_category', $dataView);
    }

    public function edit($id, Request $request)
    {

        $dataView = ['errs' => []];
        $dataView['data'] = Category::find($id);
        if ($request->isMethod('post')) {
            $rule = [
                'txt_name' => 'required'
            ];
            $msgE = [
                'txt_name.required' => ''
            ];
            $validator = Validator::make($request->all(), $rule, $msgE);
            if ($validator->fails()) {
                $dataView['errs'] = $validator->errors()->toArray();
            } else {
                Category::where('id', $id)
                    ->update([
                        'name' => $request->get('txt_name')
                    ]);
                return redirect()->route('back-category')->with(['msg'=>'Sửa danh mục thành công']);
            }
        }

        return view('back_end.category.edit_category', $dataView);
    }

    public function destroy($id)
    {
        $delete = Category::find($id);
        $delete->delete();
        return redirect()->route('back-category')->with(['msg'=>'Xóa danh mục thành công']);
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
