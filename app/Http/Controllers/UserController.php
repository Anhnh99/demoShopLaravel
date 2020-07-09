<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\Http\Requests\RequestCheckAddUser;
use App\Http\Requests\RequestCheckEditUser;
use Validator;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['data'] = Account::All();
        return view('back_end.user.list_user', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(RequestCheckAddUser $request)
    {
        $dataView = ['errs' => []];
        if ($request->isMethod('post')) {
            $data = new Account;
            $data->fullname = $request->get('txt_name');
            $data->account = $request->get('txt_account');
            $data->password = Hash::make($request->get('txt_password'));
            $data->role = $request->get('txt_role');
            $data->save();
            $message = "'tài khoản'.$data->account.'đã được thêm'";
            Log::notice($message);
            return redirect()->route('back-user')->with(['msg' => 'Thêm tài khoản thành công']);
        }
        return view('back_end.user.add_user', $dataView);
    }

    public function destroy($id)
    {
        $delete = Account::find($id);
        $delete->delete();
        $message = "$delete->account.'đã bị xóa'";
        Log::notice($message);

        return redirect()->route('back-user')->with(['msg' => 'Xóa sản phẩm thành công']);
    }

    public function edit($id, RequestCheckEditUser $request)
    {
        $dataView = ['errs' => []];
        $dataView['data'] = Account::find($id);
        $user = Account::find($id);
        if ($request->isMethod('post')) {
            $rule = [
                'txt_name' => 'required',
                'txt_password' => 'required',
            ];
            $msgE = [
                'txt_name.required' => 'Bạn cần nhập tên danh mục',
                'txt_password' => 'Bạn cần nhập mật khẩu',
            ];
            $validator = Validator::make($request->all(), $rule, $msgE);
            if ($validator->fails()) {
                $dataView['errs'] = $validator->errors()->toArray();
            } else {
                $user->fullname = $request->get('txt_name');
                $user->role = $request->get('txt_role');
                if (strlen($request->get('txt_password')) > 0) {
                    $user->password = Hash::make($request->get('txt_password'));
                }
                $user->save();
                $message = "'tài khoản'$request->get('txt_account')'đã được sửa'";
                Log::notice($message);
                return redirect()->route('back-user')->with(['msg' => 'Sửa tài khoản thành công']);
            }
        }

        return view('back_end.user.edit_user', $dataView);
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
