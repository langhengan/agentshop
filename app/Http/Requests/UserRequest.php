<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class UserRequest extends FormRequest
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
     *涉及到用户的添加和修改的验证   添加的时候没有id  修改传过来的会有id
     * @return array
     */
    public function rules(Request $request)
    {
        $rules = [
                    'email' => ['required',Rule::unique('users')->ignore($request->input('id'),'id'),'max:20','min:6'],
                    'name' => 'required',
                ];
        if(!$request->input('id')){
            $rules['password'] = 'required|min:6|max:20';
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'email.required'=>'We need to know your e-mail address!',
            'email.unique'=>'账号已经重复',
//            'email.max'=>'账号最大20位',
//            'email.min'=>'账号最小不小于六位',
            'name.required'=>'姓名必须填写',
            'password.required'=>'密码必须填写',
            'password.min'=>'密码不小于六位',
            'password.max'=>'密码不大于二十位',
        ];
    }
}
