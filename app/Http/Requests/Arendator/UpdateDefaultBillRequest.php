<?php

namespace App\Http\Requests\Arendator;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDefaultBillRequest extends FormRequest
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
            'default_bill_id' => 'exists:bills,id|required|uuid',
        ];
    }
}
