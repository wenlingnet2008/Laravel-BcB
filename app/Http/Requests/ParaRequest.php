<?php

namespace App\Http\Requests;

use App\Models\DefaultPara;
use App\Rules\Intersect;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ParaRequest extends FormRequest
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


    public function withValidator($validator){
            $validator->sometimes('oldvalue.*', [Rule::notIn($this->input('value'))], function ($input){
                return empty($input->value) === false;
            });
    }


    public function all($keys = null){
        $results = parent::all($keys);
        if(isset($results['value']) and !is_array($results['value'])){
            $value = $results['value'];
            if(preg_match('/[\r\n|\r|\n]/', $value)){
                $value = preg_replace('/[\r\n|\r|\n]+/', '\n', $value);
                $results['value'] = explode('\n', $value);
                //替换数据 ，使其在 request->input 方法中能得到替换的数据
                $this->replace($results);
            }
        }
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
                    'catid' => ['required', 'integer'],
                    'name' => ['required', 'max:50', Rule::unique('default_paras', 'name')->where(function($query){
                        $query->where('catid', $this->input('catid'));
                    })],
                    'value' =>  ['required'],
                ];
            }
            case 'PUT': {

                $para = $this->route('dpid');
                return [
                    'catid' => ['required', 'integer'],
                    'name' => ['required', 'max:50', Rule::unique('default_paras', 'name')->where(function($query){
                        $query->where('catid', $this->input('catid'));
                    })->ignore($para->dpid, 'dpid')],
                    'value' =>  ['sometimes', 'max:50', Rule::unique('default_para_values', 'value')->where(function ($query) {
                        $dpid = $this->route('dpid')->dpid;
                        $query->where('dpid', '=', $dpid);
                    })],
                    'value.*' => ['sometimes', 'required', 'max:50', 'distinct', Rule::unique('default_para_values', 'value')->where(function ($query) {
                        $dpid = $this->route('dpid')->dpid;
                        $query->where('dpid', '=', $dpid);
                    })],
                    'oldvalue.*' => ['distinct'],
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
           'value.*.distinct' => '添加新的默认值中 :attribute 有重复的值',
           'value.*.unique' => '添加的默认值中 :attribute 已经存在',
           'oldvalue.*.not_in' => '老的数据 和 新添加的数据 有重复'
       ];
    }

    public function attributes()
    {
        return [
            'value' => '新添加的默认值',
            'oldvalue' => '老的默认值',
            'value.*' => '新添加的默认值 ',
            'oldvalue.*' => '老的默认值 ',
        ];
    }
}
