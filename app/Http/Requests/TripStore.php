<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\TripKmRule;


class TripStore extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        

            return [
                'driver_id.*' => ['required', Rule::exists('drivers', 'id')],
                'vehicle_id' => ['required', Rule::exists('vehicles', 'id')],
                'initial_km' => ['required', 'numeric'],
                'final_km' => ['required', 'numeric', new TripKmRule($this->initial_km)],
            ];
        
     }
}
