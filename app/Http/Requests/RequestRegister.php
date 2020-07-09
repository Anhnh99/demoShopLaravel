<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule =[];
        if ($this->isMethod('post')) {
            $rule = [
                'txt_name' => 'required|max:20',
                'txt_account' => 'required|min:5|max:20|regex:/^[a-zA-Z0-9]+$/u|unique:users,account',
                'txt_password' => 'required|min:5|max:20|regex:/^[a-zA-Z0-9]+$/u'
            ];
        }
        return $rule;
    }
    public function messages()
{
    return [
        'txt_name.required' => 'Bạn cần nhập tên danh mục',
        'txt_name.max' => 'Tên bạn cần dưới 20 ký tự',
        'txt_account.required' => 'Bạn cần nhập tên tài khoản',
        'txt_password.required' => 'Bạn cần nhập mật khẩu',
        'txt_account.min' => 'Tên tài khoản cần trên 5 ký tư',
        'txt_account.max' => 'Tên tài khoản cần dưới 20 ký tư',
        'txt_account.unique' => 'Tên tài khoản đã tồn tại',
        'txt_account.regex' => 'Tên tài khoản không được chứa ký tự đặc biệt hoặc khoảng trắng',
        'txt_password.regex' => 'Mật khẩu không được chứa ký tự đặc biệt hoặc khoảng trắng',
        'txt_password.min' => 'Mật khẩu cần trên 5 ký tự',
        'txt_password.max' => 'Mật khẩu cần dưới 20 ký tự',
    ];
}
}
