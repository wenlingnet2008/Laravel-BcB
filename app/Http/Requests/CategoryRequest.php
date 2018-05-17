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

    public function all($keys = null){
        $results = parent::all($keys);
        if(isset($results['name'])){
            $name = $results['name'];
            if(preg_match('/[\r\n|\r|\n]/', $name)){
                $name = preg_replace('/[\r\n|\r|\n]+/', '\n', $name);
                $results['name'] = explode('\n', $name);
            }
        }
        //替换数据 ，使其在 request->input 方法中能得到替换的数据
        $this->replace($results);

        return $results;
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
                    'name.*' => ['required', 'max:50', Rule::unique('categories', 'name')],
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
