<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganismoRequest extends FormRequest
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
        $organismo = $this->route()->parameter('organismo');

        $rules = [
            'nombre' => 'required|string|min:3|max:255',
            'slug' => 'required|unique:organismos',
            'representante' => 'required|string|min:3|max:100',
        ];

        if($organismo){
            $rules['slug'] = 'required|unique:organismos,slug,' . $organismo->id;
        }

        return $rules;
    }
}
