<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehicleStore extends FormRequest
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
        
        $renavamRule = Rule::unique('vehicles')->ignore($this->vehicle);

        return [
            'model' => 'required|max:255',
            'year' => 'required|integer|min:1886|max:' . date('Y'),
            'date_of_aquisition' => 'required|date',
            'km_on_aquisition' => 'required|integer',
            'renavam' => ['required', 'integer', $renavamRule],
        ];
    }
}
