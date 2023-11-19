<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;

class DocumentoController extends Controller
{
    public function show(Documento $documento)
    {
        return view('documentos.show',compact('documento'));
    }
}
