<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class resetPasswordRequest extends FormRequest
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
	        'email' => 'email|required|exists:users',
	        'otp' => 'required|max:6',
	        'password' => 'required|min:6|string',
        ];
    }
}
