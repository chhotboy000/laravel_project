<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                // Rule::regex('/^[A-Za-z]+$/'), // Chỉ cho phép chữ cái (không bao gồm số hoặc ký tự đặc biệt)
            ],
            'email' => 'required|email|unique:users',
            'password' => 'required|max:16',
            'role' => 'required|between:1,5',
            'spec' => 'required',
            'din' => 'required|date',
            'dob' => [
                'required',
                'date',
                'before:'.now()->subYears(18)->format('Y-m-d'),
            ],
            'salary' =>'required|numeric|between:0,1000000000',
           
        ];
    }


    public function messages()
    {
        return [
            'name.required' =>'Name cannot be blank!',
            'email.required' =>'Email cannot be blank!',
            'email.unique' =>'Email already exists!',
            'password.required' =>'Password cannot be blank!',
            'role.required' =>'Role cannot be blank!',
            'spec.required' =>'Specialist cannot be blank!',
            'din.required' =>'Date in cannot be blank!',
            'dob.required' =>'Day of Birth cannot be blank!',
            'salary.required' =>'Salary cannot be blank!',
            'salary.numberic' =>'Salary must be a number',
        ];
    }
   
}
