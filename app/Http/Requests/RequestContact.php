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
        return [
            'c_name'=>'required',
            'c_email'=>'bail|required|email:rfc,dns|ends_with:gmail.com,yahoo.com',
            'c_title'=>'required',
            'c_content'=>'required',
            'phone'=>'bail|required|numeric|digits:10',
        ];
    }
    public function messages()
    {
        return[
            'c_name.required'=>'Họ tên không được để trống!',
            'c_email.required'=>'Email không được để trống!',
            'c_email.email'=>'Email không đúng định dạng!',
            'c_email.ends_with'=>'Email phải là gmail.com hoặc yahoo.com',
            'c_title.required'=>'Tiêu đề không được để trống',
            'c_content.required'=>'Nội dung không được để trống',
            'phone.required'=> 'Số điện thoại không được để trống',
            'phone.numeric'=>'Số điện thoại phải là chữ số',
            'phone.digits'=>'Số điện thoại phải gồm 10 chữ số'
        ];
    }
}
