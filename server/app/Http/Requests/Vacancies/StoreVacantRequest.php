<?php

namespace App\Http\Requests\Vacancies;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class StoreVacantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return (bool) Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'max:100'],
            'description' => ['required', 'string', 'max:4000'],
            'image' => ['nullable', 'image', 'max:3000'],
            'salary' => ['required', 'numeric'],
            'benefits' => ['nullable', 'string', 'max:4000'],
            'vacancies' => ['required', 'string'],
            'requirements' => ['required', 'string', 'max:4000'],
            'functionalities' => ['required', 'string', 'max:4000'],
            'date' => ['required', 'date_format:d-m-Y H:i:s'],
            'status' => ['required', 'in:inactive,active'],
            'category_id' => ['required', 'exists:App\Models\Category,id'],
            'city_id' => ['required', 'exists:App\Models\City,id'],
            'experience_id' => ['required', 'exists:App\Models\Experience,id'],
        ];
    }
}
