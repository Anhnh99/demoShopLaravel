<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestProduct extends FormRequest
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
                'txt_name' => 'required|unique:product,name',
                'txt_price' => 'required|integer',
                'txt_category' => 'integer',
                'txt_discount' => 'required|integer',
                'txt_quantity' => 'required|integer',
                'txt_image' => 'image',
                
            ];
        }
        return $rule;
    }
    public function messages()
{
    return [
        'txt_name.required' => 'Bạn cần nhập tên sản phẩm',
        'txt_name.unique' => 'Tên sản phẩm đã tồn tại',
        'txt_category.integer' => 'Đã xảy ra lỗi dữ liệu của danh mục sản phẩm',
        'txt_price.required' => 'Bạn cần nhập giá sản phẩm',
        'txt_discount.required' => 'Bạn cần nhập giá giảm',
        'txt_quantity.required' => 'Bạn cần nhập số lượng sp',
        'txt_price.integer' => 'Giá bắt buộc phải là số',
        'txt_discount.integer' => 'Giá giảm bắt buộc phải là số',
        'txt_quantity.integer' => 'Số lượng bắt buộc phải là số',
        'txt_image.image' => 'File ảnh chọn không hợp lệ',
    ];
}
}
