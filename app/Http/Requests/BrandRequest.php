<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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
                    'name' => ['required', 'max:50', Rule::unique('brands', 'name')],
                    'thumb' => ['required', 'image', 'max:2048'],
                ];
            }
            case 'PUT': {
                $brand = $this->route('brandid');
                return [
                    'name' => ['required', 'max:50', Rule::unique('brands', 'name')->ignore($brand->brandid, 'brandid')],
                    'thumb' => ['sometimes', 'image', 'max:2048'],
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
