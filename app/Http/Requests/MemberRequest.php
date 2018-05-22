<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MemberRequest extends FormRequest
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

    public function withValidator($validator)
    {

//        $validator->after(function ($validator) {
//            //google验证码 处理 测试
//            if(!$this->input('google_captha')){
//                $validator->errors()->add('google_captha', 'google captha is vaild');
//            }
//
//        });
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST': {
                return [
                    'email' => ['required', 'email', Rule::unique('members', 'email')],
                    'password' => ['required', 'confirmed'],
                    'password_confirmation' => ['required'],
                    'name' => ['sometimes', 'required',  'max:30', Rule::unique('members', 'name')],
                    'gender' => ['sometimes', 'nullable', 'max:10'],
                    'company' => ['sometimes',  'required', 'max:150'],
                    'true_name' => ['sometimes','required', 'max:50'],
                    'mobile'    => ['sometimes', 'nullable', 'max:30'],
                    'department'    => ['sometimes', 'nullable', 'max:30'],
                    'career'    => ['sometimes', 'nullable', 'max:30'],
                ];
            }
            case 'PUT': {
                return [
                    'gender' => [ 'required', 'max:10'],
                    'company' => ['required', 'max:150'],
                    'true_name' => ['required', 'max:50'],
                    'mobile'    => ['required', 'max:30'],
                    'department'    => ['required', 'max:30'],
                    'career'    => ['required', 'max:30'],
                ];
            }
            case 'PATCH':
            case 'GET':
            case 'DELETE':
            default: {
                return [];
            };
        }
    }
}
