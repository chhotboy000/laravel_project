<?php

namespace App\Http\Requests\Doctor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class DoctorRequest extends FormRequest
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
            
            'weight' =>'required|numeric|between:0,300',
            'height' =>'required|numeric|between:0,299',
            'blood' =>'required|numeric|between:0,299',
            'temp' =>'required',
            'dateReExam' =>'date|after_or_equal:today',
            'note' => [
                Rule::regex('/^[A-Za-z]+$/'), // Chỉ cho phép chữ cái (không bao gồm số hoặc ký tự đặc biệt)
            ],
        ];
    }

    public function messages()
    {
        return [
            'weight.required' =>'Weight cannot be blank!',
            'Height.required' =>'Height cannot be blank!',
            'Blood.required' =>'Blood cannot be blank!',
            'temp.required' =>'Temp cannot be blank!',
            'weight.numberic' =>'Weight must be a number',
            'height.numberic' =>'Height must be a number',
            'Blood.numberic' =>'Blood must be a number',
        ];
    }
}
