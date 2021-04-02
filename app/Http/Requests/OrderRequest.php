<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'bus_id' => 'required',
            'driver_id' => 'required',
            'contact_name' => 'required|string',
            'contact_phone' => 'required|string|digits:12',
            'start_rent_date' => 'required|date|after:' . date('Y-m-d'),
            'total_rent_days' => 'required|integer|min:1',
        ];
    }
}