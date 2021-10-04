<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\Is_identity;
use App\Rules\Is_vnPhone;

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
     *
     * @return array
     */
    public function rules()
    {
        return [
            'identity_card' => ['required', new Is_identity, 'unique:users'],
            'social_insurance' => ['required', 'string', 'unique:users'],
            'username' => 'min:6|string|unique:users',
            'password' => 'min:6',
            'fullname' => 'required|string',
            'birthday' => 'required|date',
            'gender' => ['required', Rule::in([0,1])],
            'address' => 'required|string',
            'phone' => ['required', new Is_vnPhone, 'unique:users'],
            'role_id' => 'required|numeric|min:0',
            'village_id' => 'required|numeric|min:0',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Yêu cầu nhập trường này',
            'unique' => 'Trường này đã tồn tại',
            'date' => 'Định dạng ngày không đúng',
            'numeric' => 'Trường này phải là kiểu số',
        ];
    }
}
