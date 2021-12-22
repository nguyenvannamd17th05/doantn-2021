<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'bail|required||email:rfc,dns|unique:admins,email,'.$this->id,
            'password'=>'bail|required|min:8',
            'role_id'=>'required',
            'phone'=>'bail|required|numeric|digits:10',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'email.unique' => 'Email đã tồn tại!',
            'email.required' => 'Email không được để trống!',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống!',
            'password.min' => 'Mật khẩu ít nhất 8 kí tự!',
            'role_id.required' => 'Chưa chọn chức vụ',
            'phone.required' => 'Số điện thoại không được để trống!',
            'phone.numeric' => 'Số điện thoại phải là chữ số',
            'phone.digits' => 'Số điện thoại phải gồm 10 chữ số',
        ];
    }
}
