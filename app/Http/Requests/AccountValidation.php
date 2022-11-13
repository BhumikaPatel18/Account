<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountValidation extends FormRequest
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
            // 'user_name' => 'required',
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            // 'dob' => 'required|date',
            // 'phone' => 'required|numeric',
            // 'email' => 'required|email',
            // 'address' => 'required',
            // 'country' => 'required',
            // 'state' => 'required',
            // 'gender' => 'required',
            // 'hobby' => 'required',

            'user_name' => '',
            'first_name' => '',
            'last_name' => '',
            // 'dob' => '',
            'phone' => '',
            'email' => '',
            // 'address' => '',
            // 'country' => '',
            // 'state' => 'required',
            // 'gender' => 'required',
            // 'hobby' => 'required',
        ];
    }
}
