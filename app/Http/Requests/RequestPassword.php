<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PhpParser\Node\Expr\FuncCall;

class RequestPassword extends FormRequest
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
     * @return array<string, mixed>
     */

    public function rules()
    {
        return [
            'password_old'=>'required',
            'password'=>'required',
            'password_comfirm'=>'required|same:password',
        ];
    }
    public function messages()
    {
        return[
            'password_old.required'=>'Trường này không được để trống',
            'password.required'=>'Trường này không được để trống',
            'password_comfirm.required'=>'Trường này không được để trống',
            'password_comfirm.same'=>'Mật khẩu xác nhận không khớp',


        ];
    }
}
