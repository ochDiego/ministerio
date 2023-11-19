<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstitucioneRequest;
use App\Models\Institucione;

class InstitucioneController extends Controller
{

    public function index()
    {
        return view('admin.instituciones.index');
    }

    public function create()
    {
        return view('admin.instituciones.create');
    }

    public function store(InstitucioneRequest $request)
    {
        $institucione = Institucione::create($request->validated());

        return redirect()->route('admin.instituciones.edit',$institucione)->with('info','Institución registrada satisfactoriamente');
    }

    public function edit(Institucione $institucione)
    {
        return view('admin.instituciones.edit',compact('institucione'));
    }

    public function update(InstitucioneRequest $request, Institucione $institucione)
    {
        $institucione->update($request->validated());

        return redirect()->route('admin.instituciones.edit',$institucione)->with('info','Institución actualizada satisfactoriamente');
    }

    public function delete(Institucione $institucione)
    {
        $institucione->update([
            'activo' => false,
        ]);

        return redirect()->route('admin.instituciones.index')->with('info','Institución eliminada satisfactoriamente');
    }
}
