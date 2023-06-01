<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "owner_name"=>"required|max:50",
            "brand"=>"required|max:50",
            "car_number"=>"required|max:10",
            "color"=>"required|max:100",
            "dps_id"=>"required|int"
        ];
    }
}
