<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstitucioneRequest extends FormRequest
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
        $institucione = $this->route()->parameter('institucione');

        $rules = [
            'nombre' => 'required|string|min:3|max:255',
            'slug' => 'required|unique:instituciones',
            'representante' => 'required|string|min:3|max:100',
        ];

        if($institucione){
            $rules['slug'] = 'required|unique:instituciones,slug,' . $institucione->id;
        }

        return $rules;
    }
}
