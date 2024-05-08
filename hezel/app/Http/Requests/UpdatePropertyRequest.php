<?php

namespace App\Http\Requests;

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
            "title" => ["required", "string"],
            "description" => ["required", "string"],
            "price" => ["required", "numeric"],
            "longitude" => ["nullable", "numeric"],
            "latitude" => ["nullable", "numeric"],
            "status" => ["nullable", "string"],
            "location" => ["nullable", "boolean"],
            "county_id" => ["nullable", "numeric", "integer", "exists:counties,id"],
            "sub_county_id" => ["nullable", "numeric", "integer", "exists:sub_counties,id"],
            "ward_id" => ["nullable", "numeric", "integer", "exists:wards,id"],
            "town_id" => ["nullable", "numeric", "integer", "exists:towns,id"],
        ];
    }
}
