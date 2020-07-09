<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLogin extends FormRequest
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
        // $method = $this->route()->getActionMethod();
        $rule =[];

        if ($this->isMethod('post')) {
            $rule = [
                'txt_username' => 'required',
                'txt_password' => 'required' 
            ];
        }


        return $rule;
      
    }
    public function messages()
{
    return [
        // 'txt_username.required' => 'Ban can nhap ten dang nhap',
    ];
}
}
