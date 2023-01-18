<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class AdminRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return $this->isMethod('PUT') ? [
            'logo' => 'sometimes|image|dimensions:min_width=100,min_height=100|nullable',
            'car_brand' => 'sometimes|nullable',
            'car_model' => 'sometimes|nullable',
        ] : [
            'logo' => 'required|image|dimensions:min_width=100,min_height=100',
            'car_brand' => 'required',
            'car_model' => 'required|unique:brands',
        ];
    }

    public function messages()
    {
        return [
            "car_model.unique" => "This Car Model Already Exists",
        ];
    }
}
