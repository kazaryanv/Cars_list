<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCarUpdateRequest extends FormRequest
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
            'logo' => 'sometimes|image|dimensions:min_width=100,min_height=100|nullable',
            'car_brand' => 'sometimes',
            'car_model' => 'sometimes|nullable',
        ];
    }
}
