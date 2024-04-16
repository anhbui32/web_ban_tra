<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequests extends FormRequest
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
        return
            [
                // 'file_media' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8',
                'phone_number' => ['required', 'regex:/^(0|\+84)(\d{9,10})$/'],
                'user_name' => 'required',
                'address' => 'required',
                'role' => ['in:0, 1,2,3'],
            ];
    }
    public function messages()
    {
        return
            [
                'role.in' => 'Bạn chỉ được nhập số 0, 1, 2 hoặc 3 thôi nhé!',
            ];
    }
}
