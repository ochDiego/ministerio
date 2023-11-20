<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TiposDocumentoRequest;
use App\Models\TiposDocumento;

class TiposDocumentoController extends Controller
{

    public function index()
    {
        return view('admin.tiposdocumentos.index');
    }

    public function create()
    {
        return view('admin.tiposdocumentos.create');
    }

    public function store(TiposDocumentoRequest $request)
    {
        $tiposdocumento = TiposDocumento::create($request->validated());

        return redirect()->route('admin.tiposdocumentos.edit',$tiposdocumento)->with('info','Tipo de documento creado satisfactoriamente');
    }

    public function edit(TiposDocumento $tiposdocumento)
    {
        return view('admin.tiposdocumentos.edit',compact('tiposdocumento'));
    }

    public function update(TiposDocumentoRequest $request, TiposDocumento $tiposdocumento)
    {
        $tiposdocumento->update($request->validated());

        return redirect()->route('admin.tiposdocumentos.edit',$tiposdocumento)->with('info','Tipo de documento actualizado satisfactoriamente');
    }

    public function delete(TiposDocumento $tiposdocumento)
    {
        $tiposdocumento->update([
            'activo' => false,
        ]);

        return redirect()->route('admin.tiposdocumentos.index')->with('info','Tipo de documento eliminado satisfactoriamente');
    }
}
