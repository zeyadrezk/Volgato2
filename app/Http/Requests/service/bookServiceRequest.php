<?php

namespace App\Http\Requests\service;

use Illuminate\Foundation\Http\FormRequest;

class bookServiceRequest extends FormRequest
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
            'service_id' => 'required|integer|exists:services,id',
            'serviceValue' => 'required|numeric',
            'service_date' => 'required|date',
            'status' => 'required|in:waiting,current,previous', // validation rule for status


        ];
    }
}
