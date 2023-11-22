<?php

namespace App\Http\Requests\Medicine;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; 

class MedicineRequest extends FormRequest
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
            'quantity' =>'required|numeric|between:0,10000',
            'price' =>'required|numeric|between:0,1000000000',
            'type' => [
                'required',
                Rule::regex('/^[A-Za-z]+$/'), // Chỉ cho phép chữ cái (không bao gồm số hoặc ký tự đặc biệt)
            ],
            'expire' =>'required|date',
            'import' =>[
                'required',
                Rule::regex('/^[A-Za-z]+$/'), // Chỉ cho phép chữ cái (không bao gồm số hoặc ký tự đặc biệt)
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>'Name cannot be blank!',
            'quantity.required' =>'Quantity cannot be blank!',
            'price.required' =>'Price cannot be blank!',
            'type.required' =>'Type cannot be blank!',
            'expire.required' =>'Expire cannot be blank!',
            'din.required' =>'Date in cannot be blank!',
            'import.required' =>'Import cannot be blank!',
            'quantity.numberic' =>'Quantity must be a number',
            'price.numberic' =>'Price must be a number',
        ];
    }


}
