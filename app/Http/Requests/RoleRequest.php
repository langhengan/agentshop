<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class RoleRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'name' => ['required',Rule::unique('roles')->ignore($request->input('id'),'id'),'max:255'],
            'display_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'映射必须填写',
            'name.unique'=>'映射必须唯一',
            'name.max'=>'映射最大值255',
            'display_name.required'=>'角色名必须填写',
        ];
    }
}
