<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TiposDocumentoRequest extends FormRequest
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
        $tiposdocumento = $this->route()->parameter('tiposdocumento');

        $rules = [
            'nombre' => 'required|string|min:3|max:100',
            'slug' => 'required|unique:tipos_documentos',
        ];

        if($tiposdocumento){
            $rules['slug'] = 'required|unique:tipos_documentos,slug,' . $tiposdocumento->id;
        }

        return $rules;
    }
}
