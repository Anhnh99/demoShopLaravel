<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCheckEditUser extends FormRequest
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
                'txt_password' => 'required|min:5|max:20|regex:/^[a-zA-Z0-9]+$/u',               
            ];
        }
        return $rule;
    }
    public function messages()
{
    return [
        'txt_name.required' => 'Bạn cần nhập tên',
        'txt_name.max' => 'Tên bạn cần dưới 20 ký tự',
        'txt_password.required' => 'Bạn cần nhập mật khẩu',
        'txt_password.min' => 'Mật khẩu cần trên 5 ký tự',
        'txt_password.max' => 'Mật khẩu cần dưới 20 ký tự',
        'txt_password.regex' => 'Mật khẩu không được chứa ký tự đặc biệt hoặc khoảng trắng',

    ];
}
}
