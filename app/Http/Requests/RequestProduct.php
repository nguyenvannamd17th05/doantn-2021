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
    public function rules()
    {
        return [
            'pro_name'=>'required|unique:products,pro_name,'.$this->id,
            'cate_id'=>'required',
            'pro_price'=>'required',
            'pro_desc'=>'bail|required|max:255',
            'pro_content'=>'required'
        ];
    }
    public  function messages()
    {
        return[
            'pro_name.required'=>'Tên sản phẩm không được để trống!',
            'pro_name.unique'=>'Tên sản phẩm đã tồn tại!',
            'cate_id.required'=>'Loại sản phẩm không được để trống!',
            'pro_price.required'=>'Giá sản phẩm không được để trống',
            'pro_desc.required'=>'Mô tả không được để trống',
            'pro_desc.max' => 'Không được quá 255 ký tự',
            'pro_content.required'=>'Nội dung không được để trống',
        ];
    }
}
