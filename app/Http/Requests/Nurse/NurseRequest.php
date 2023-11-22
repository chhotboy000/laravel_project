<?php

namespace App\Http\Requests\Nurse;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class NurseRequest extends FormRequest
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
                Rule::regex('/^[A-Za-z]+$/'), // Chỉ cho phép chữ cái (không bao gồm số hoặc ký tự đặc biệt)
            ],
            'price' =>'required|numeric|between:0,1000000000',
        ];
    }
    public function messages()
    {
        return [
            'name.required' =>'Name cannot be blank!',
            'price.required' =>'Price cannot be blank!',
            'price.numberic' =>'Price must be a number',
        ];
    }
}
