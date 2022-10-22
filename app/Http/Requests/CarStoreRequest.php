<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarStoreRequest extends FormRequest
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
            'name' => 'required|min:3',
            'year' => 'required|min:4|integer',
            'fuel' => 'required',
            'fuel_consumption' => 'required',
            'seats' => 'required',
            'gearbox' => 'required',
            'price' => 'required|integer',
            'images' => 'required',
            'horsepower' => 'required|integer',
            'torque' => 'required|integer',
            'acceleration' => 'required',
            'engine' => 'required',
            'drivetrain' => 'required',
            'description' => 'required|min:10'
        ];
    }
}
