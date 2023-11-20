<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TemaRequest extends FormRequest
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
        $tema = $this->route()->parameter('tema');

        $rules = [
            'nombre' => 'required|string|min:3|max:100',
            'slug' => 'required|unique:temas'
        ];

        if($tema){
            $rules['slug'] = 'required|unique:temas,slug,' . $tema->id;
        }

        return $rules;
    }
}
