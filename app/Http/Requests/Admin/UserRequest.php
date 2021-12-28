<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
            // Karakter Maksimal 50
            'name' => 'required|string|max:50',
            // Email Tidak Boleh Sama
            'email' => 'required|email|unique:users',
            // Password
            'password' => 'required',
            // Inputan Hanya Antara 2
            'roles' => 'nullable|string|in:ADMIN,USER'
        ];
    }
}
