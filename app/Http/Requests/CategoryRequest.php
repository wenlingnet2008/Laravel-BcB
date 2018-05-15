<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $validator->sometimes('parent_id', Rule::exists('categories', 'catid'), function($input)
        {
            return $input->parent_id > 0;
        });
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
                    'name' => ['required', 'max:50', Rule::unique('categories', 'name')],
                    'parent_id' => ['sometimes', 'numeric'],
                ];
            }
            case 'PUT': {
                $category = $this->route('catid');

                return [
                    'name' => ['required', 'max:50', Rule::unique('categories', 'name')->ignore($category->catid, 'catid')],
                    'parent_id' => ['sometimes', 'numeric', Rule::notIn(Category::descendantsAndSelf($category->catid)->pluck('catid')->toArray())],
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


    public function messages()
    {
        return [
            'parent_id.not_in'  => '父类不能是它自己或者它的子类',
        ];
    }


    public function attributes()
    {
       return [
         'name' => '分类名称',
         'parent_id' => '主分类'
       ];
    }
}
