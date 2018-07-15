<?php

namespace App\Http\Requests\Api;

use Dingo\Api\Http\FormRequest;

class CarRequest extends FormRequest
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
            'car_id' => [
                'required',
                'unique:cars'
            ],
            'model' => [
                'required',
            ]
        ];
    }

    public function attributes()
    {
        return [
            'car_id' => '车牌号',
            'model' => '车型'
        ];
    }

    public function messages()
    {
        return [
            'car_id.required' => '请填写车牌号',
            'car_id.unique' => '车牌号已存在',
            'model.required' => '请输入车辆型号'
        ];
    }

}
