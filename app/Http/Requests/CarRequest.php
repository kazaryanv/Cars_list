<?php

namespace App\Http\Requests;

use http\Message;
use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
        return [
            'logo' => 'max:10|min:2|required',
            'car_brand' => 'required',
            'car_model' => 'required',
            'many' => 'required',
        ];

    }
    public function messages()
    {
        return [
            "logo.max" => "file can't be more than 10.",
            "logo.min" => "file can't be more than 2.",
        ];
    }
}
