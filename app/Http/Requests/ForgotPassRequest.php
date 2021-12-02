<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ForgotPassRequest extends FormRequest
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

            'password'=>'bail|required|min:8',
            'password_comfirm'=>'bail|required|same:password',
        ];
    }
    public function messages()
    {
        return [

            'password.required'=>'Mật khẩu không được để trống!',
            'password.min'=>'Mật khẩu ít nhất 8 kí tự!',
            'password_comfirm.required'=>'Chưa nhập lại mật khẩu!',
            'password_comfirm.same'=>'Nhập lại mật khẩu sai!',
        ];
    }
}
