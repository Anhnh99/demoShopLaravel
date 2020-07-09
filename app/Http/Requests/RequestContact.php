<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestContact extends FormRequest
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
                'txt_name' => 'required',
                'txt_email' => 'required|email',
                'txt_content' => 'required',                
            ];
        }
        return $rule;
    }
    public function messages()
{
    return [
        'txt_name.required' => 'Bạn cần nhập họ và tên*',
        'txt_email.required' => 'Bạn cần nhập Email*',
        'txt_email.email' => 'Bạn cần nhập đúng Email',
        'txt_content.required' => 'Bạn cần nhập nội dung gửi*',
    ];
}
}
