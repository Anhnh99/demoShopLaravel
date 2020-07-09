<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCheckout extends FormRequest
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
                'txt_name' => 'required|min:2|max:50',
                'txt_phone' => 'required|regex:/(0)[0-9]{9}/|not_regex:/[a-z]/|min:10|max:10',
                'txt_address' => 'required|min:5|max:255',                
            ];
        }
        return $rule;
    }
    public function messages()
{
    return [
        'txt_name.required' => 'Bạn cần nhập họ và tên',
        'txt_name.min' => 'Họ tên quá ngắn',
        'txt_name.max' => 'Họ tên quá dài',
        'txt_phone.required' => 'Bạn cần nhập số điện thoại',
        'txt_phone.regex' => 'Bạn chưa nhập đúng số điện thoại',
        'txt_phone.not_regex' => 'Bạn chưa nhập đúng số điện thoại',
        'txt_phone.min' => 'Bạn chưa nhập đúng số điện thoại',
        'txt_phone.max' => 'Bạn chưa nhập đúng số điện thoại',
        'txt_address.required' => 'Bạn cần nhập địa chỉ',
        'txt_address.min' => 'Địa chỉ quá ngắn',
        'txt_address.max' => 'Địa chỉ quá dài',
    ];
}
}
