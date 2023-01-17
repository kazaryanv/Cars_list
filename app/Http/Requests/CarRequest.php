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
       return request()->isMethod('PUT') ? [
           'logo' => 'sometimes|nullable|min:1|max:10',
           'car_brand' => 'sometimes|nullable',
           'car_model' => 'sometimes|nullable',
           'many' => 'sometimes|nullable',
           'content' => 'sometimes|nullable',
       ] : [
           'logo' => 'required|max:10',
           'car_brand' =>  'required',
           'car_model' => 'required',
           'many' => 'required|integer',
           'content' => 'required',
       ];
    }
    public function messages()
    {
        if (request()->isMethod('POST')){
            return [
                "logo.max" => "file can't be more than 10.",
                "logo.required" => "file can't be more than 1.",
            ];
        }
    }
}
