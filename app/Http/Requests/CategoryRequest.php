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
                    'catname' => ['required', 'max:50', Rule::unique('categories', 'catname')],
                    'parentid' => ['required', 'numeric', Rule::exists('categories', 'catid')],
                ];
            }
            case 'PUT': {
                $category = $this->route('catid');

                return [
                    'catname' => ['required', 'max:50', Rule::unique('categories', 'catname')->ignore($category->catid, 'catid')],
                    'parentid' => ['required', 'numeric', Rule::notIn(array_merge(explode(',', $category->arrchildid),[$this->route('catid')]))],
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
            'parentid.not_in'  => 'Parent Category can not be for themselves or sub category',
        ];
    }
}
