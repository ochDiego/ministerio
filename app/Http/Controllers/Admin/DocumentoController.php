<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentoRequest;
use App\Models\Documento;
use App\Models\Institucione;
use App\Models\Organismo;
use App\Models\Tema;
use App\Models\TiposDocumento;
use App\Models\Vigencia;
use Illuminate\Support\Facades\Storage;


class DocumentoController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.documentos.index')->only('index');
        $this->middleware('can:admin.documentos.create')->only('create','store');
        $this->middleware('can:admin.documentos.edit')->only('edit','update');
        $this->middleware('can:admin.documentos.show')->only('show');
    }

    public function index()
    {
        return view('admin.documentos.index');
    }

    public function create()
    {
        $organismos = Organismo::pluck('nombre','id');
        $instituciones = Institucione::pluck('nombre','id');
        $temas = Tema::pluck('nombre','id');
        $tiposDocumentos = TiposDocumento::pluck('nombre','id');
        $vigencias = Vigencia::pluck('nombre','id');

        return view('admin.documentos.create',compact(
                                                        'organismos',
                                                        'instituciones',
                                                        'temas',
                                                        'tiposDocumentos',
                                                        'vigencias',
                                                    ));
    }

    public function store(DocumentoRequest $request)
    {
        $documento = Documento::create($request->all());

        $url = Storage::put('archivos',$request->file('archivo'));

        $documento->archivo = $url;
        $documento->save();

        return redirect()->route('admin.documentos.edit',$documento)->with('info','Documento registrado satisfactoriamente');
    }

    public function show(Documento $documento)
    {
        return view('admin.documentos.show',compact('documento'));
    }

    public function edit(Documento $documento)
    {
        $organismos = Organismo::pluck('nombre','id');
        $instituciones = Institucione::pluck('nombre','id');
        $temas = Tema::pluck('nombre','id');
        $tiposDocumentos = TiposDocumento::pluck('nombre','id');
        $vigencias = Vigencia::pluck('nombre','id');

        return view('admin.documentos.edit',compact(
                                                        'organismos',
                                                        'instituciones',
                                                        'temas',
                                                        'tiposDocumentos',
                                                        'vigencias',
                                                        'documento'
                                                    ));
    }

    public function update(DocumentoRequest $request, Documento $documento)
    {
        $documento->update($request->all());

        if($request->file('archivo')){
            $url = Storage::put('archivos',$request->file('archivo'));

            if($documento->archivo){
                Storage::delete($documento->archivo);
                $documento->update([
                    'archivo' => $url,
                ]);
            }else{
                /* $documento->archivo = $url;
                $documento->save(); */
            }
        }

        return redirect()->route('admin.documentos.edit',$documento)->with('info','Documento actualizado satisfactoriamente');
    }

    public function delete(Documento $documento)
    {
        $documento->update([
            'activo' => false,
        ]);

        return redirect()->route('admin.documentos.index')->with('info','Documento eliminado satisfactoriamente');
    }
}
