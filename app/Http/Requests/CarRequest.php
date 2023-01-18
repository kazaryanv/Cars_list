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

    public function rules()
    {

        return $this->isMethod('PUT') ? [
            'logo' => ['sometimes','nullable','max:10'],
            'car_brand' => ['sometimes','nullable'],
            'car_model' => ['sometimes','nullable'],
            'many' => ['sometimes','nullable'],
            'content' => ['sometimes','nullable'],
        ] : [
            'logo' => 'required|array|min:1|max:10',
            'logo.*' => 'image',
            'car_brand' =>  'required',
            'car_model' => 'required',
            'many' => 'required|integer',
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            "logo.max" => "file can't be more than 10.",
            "logo.required" => "file can't be more than 1.",];
    }
}
