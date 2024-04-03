<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstitucioneRequest;
use App\Models\Institucione;

class InstitucioneController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.instituciones.index')->only('index');
        $this->middleware('can:admin.instituciones.create')->only('create','store');
        $this->middleware('can:admin.instituciones.edit')->only('edit','update');
        $this->middleware('can:admin.instituciones.delete')->only('delete');
    }

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

    public function destroy(Institucione $institucione)
    {
        $institucione->update([
            'activo' => false,
        ]);

        return back()->with('info','Institución eliminada satisfactoriamente');
    }
}
