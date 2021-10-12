<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
        if ($this->is('api/register')) {
            return [
                'name' => 'required | max:50 | string',
                'email' => 'required | email | unique:users',
                'password' => 'required | min:8'
            ];
        }
        return
            [
                'email' => 'required | email',
                'password' => 'required'
            ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return
            [
                'name.required' => 'Name must not be empty !',
                'name.max' => 'Name must not be more than 50 character',
                'name.string' => 'Name must be consist from letter only',

                'email.required' => 'Email must not be empty !',
                'email.email' => 'Please enter a valid email',
                'email.unique' => 'This email is already taken',

                'password.required' => 'Password must not be empty !',
                'password.string' => 'Password should consist from character and\or number',
                'password.min' => 'Password must not be less than 8 character'
            ];
    }

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()]), 422);
    }
}
