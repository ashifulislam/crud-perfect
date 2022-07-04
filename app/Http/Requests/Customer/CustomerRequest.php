<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'email' =>'required|email',
            'password'=>'required|min:8',
            'username'=>'required',
            'nid' => 'required',
        ];
    }
    public function messages()
    {
        return[
            'email.required'=> __('Email can not be empty'),
            'email.email'=>__('Invalid email address'),
            'password.required'=>__('Password can not be empty'),
            'password.min'=>__('Password must be atleast 8 characters'),
            'username.required'=>__('User name can not be empty'),
            'nid.required'=>__('Nid can not be empty'),
        ];
    }
}
