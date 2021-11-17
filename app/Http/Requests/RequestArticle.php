<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestArticle extends FormRequest
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
            'a_name'=>'required|unique:articles,a_name,'.$this->id,
            'a_desc'=>'required',
            'a_content'=>'required'
        ];
    }
    public  function messages()
    {
        return[
            'a_name.required'=>'Tên bài viết không được để trống!',
            'a_name.unique'=>'Tên bài viết đã tồn tại!',
            'a_desc.required'=>'Mô tả không được để trống!',
            'a_content.required'=>'Nội dung không được để trống'
        ];
    }
}
