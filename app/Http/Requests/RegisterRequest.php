<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email'=>'bail|required|unique:users,email:rfc,dns,'.$this->id,
            'password'=>'bail|required|min:8',
            'cf_password'=>'bail|required|same:password',
            'phone'=>'bail|required|numeric|digits:10',
        ];
    }
    public  function messages()
    {
        return[
            'name.required'=>'Tên không được để trống!',
            'email.unique'=>'Email đã tồn tại!',
            'email.required'=>'Email không được để trống!',
            'password.required'=>'Mật khẩu không được để trống!',
            'password.min'=>'Mật khẩu ít nhất 8 kí tự!',
            'cf_password.required'=>'Chưa nhập lại mật khẩu!',
            'cf_password.same'=>'Nhập lại mật khẩu sai!',
            'phone.required'=>'Số điện thoại không được để trống!',
            'phone.numeric'=>'Số điện thoại phải là chữ số',
            'phone.digits'=>'Số điện thoại phải gồm 10 chữ số'

        ];
    }
}
