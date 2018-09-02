<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AuthorizationsRequest extends FormRequest
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
            'name' => 'required|string|unique:users,name',
            'password' => 'required|string|min:6'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '请输入用户名',
            'password.required' => '请输入密码',
        ];
    }
}
