<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "id" => ["required", "numeric", "integer", "exists:properties,id"],
            "title" => ["required", "string", Rule::unique('properties', 'title')->ignore($this->id)],
            "description" => ["required", "string"],
            "price" => ["required", "numeric"],
            "location" => ["nullable", "string"],
        ];
    }
}
