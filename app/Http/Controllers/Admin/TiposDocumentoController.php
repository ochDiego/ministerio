<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TiposDocumentoRequest;
use App\Models\TiposDocumento;

class TiposDocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tiposdocumentos.index')->only('index');
        $this->middleware('can:admin.tiposdocumentos.create')->only('create','store');
        $this->middleware('can:admin.tiposdocumentos.edit')->only('edit','update');
        $this->middleware('can:admin.tiposdocumentos.delete')->only('delete');
    }

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

        return redirect()->route('admin.tiposdocumentos.edit',$tiposdocumento)->with('info','Tipo de documento registrado satisfactoriamente');
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

    public function destroy(TiposDocumento $tiposdocumento)
    {
        $tiposdocumento->update([
            'activo' => false,
        ]);

        return back()->with('info','Tipo de documento eliminado satisfactoriamente');
    }
}
