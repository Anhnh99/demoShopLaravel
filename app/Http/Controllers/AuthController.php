<?php

namespace App\Http\Controllers;
use App\Account;
use App\Http\Requests\RequestLogin;
use App\Http\Requests\RequestRegister;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function Login(RequestLogin $request)
    {
        $dataView = ['errs'=>[] ];
        if ($request->isMethod('post')) {
                //  login
                $dataLogin = [
                    'account' => $request->get('txt_username'),
                    'password' => $request->get('txt_password')
                ];
                if (Auth::attempt($dataLogin)){
                    return redirect()->route('front-home')->with(['msg'=>'Đăng nhập thành công']);
                } else {
                    $dataView['errs'][] = ['Sai tên đăng nhập hoặc sai password!'];
                }
            
        }

        return view('Auth.login',$dataView);
    }

    public function Logout()
    {
        Auth::logout();  // xử lý logout
        Session::flush(); // xóa hết các session khác
        return redirect()->route('Auth-Login'); // chuyển về trang đăng nhập

     }
     public function register(RequestRegister $request){

        if ($request->isMethod('post')) {
                // không có lỗi, ghi CSDL
                $data = new Account();
                $data->fullname = $request->get('txt_name');
                $data->account = $request->get('txt_account');
                $data->password = Hash::make( $request->get('txt_password'));
                $data->role = 0;
                $data->save();
                return redirect()->route('Auth-Login')->with(['msg'=>'Đăng ký tài khoản thành công']);
        }
        return view('Auth.register');
     }

}
