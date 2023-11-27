<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoRequest extends FormRequest
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

        $documento = $this->route()->parameter('documento');

        $rules = [
            'tipos_documento_id' => 'required|integer',
            'institucione_id' => 'required|integer',
            'organismo_id' => 'required|integer',
            'tema_id' => 'required|integer',
            'vigencia_id' => 'required|integer',
            'fecha_suscripcion' => 'required|numeric|min_digits:4|max_digits:4',
            'archivo' => 'required|mimes:pdf|max:2048'
        ];

        if($documento){
            $rules['archivo'] = 'mimes:pdf|max:1024';
        }

        return $rules;

    }

    public function messages()
    {
        return [
            'tipos_documento_id.required' => 'Debe seleccionar un tipo de documento',
            'institucione_id.required' => 'Debe seleccionar una institución',
            'organismo_id.required' => 'Debe seleccionar una institución',
            'tema_id.required' => 'Debe seleccionar un tema',
            'vigencia_id.required' => 'Debe seleccionar la vigencia',
            'fecha_suscripcion.required' => 'Debe ingresar el año',
            'archivo.required' => 'Debe adjuntar el documento digital',
            'archivo.max' => 'El peso del archivo debe ser inferior a 2mb',
        ];
    }
}
