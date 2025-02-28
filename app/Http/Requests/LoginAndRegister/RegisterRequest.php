<?php

namespace App\Http\Requests\LoginAndRegister;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'user_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'confirmed|required|string|min:8',
            // 'password_confirmation' => 'confirmed',
        ];
    }
    // public function messages()
    // {
    //     return [];
    // }
}
