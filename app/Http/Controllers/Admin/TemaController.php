<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tema;
use App\Http\Requests\TemaRequest;

class TemaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.temas.index')->only('index');
        $this->middleware('can:admin.temas.create')->only('create','store');
        $this->middleware('can:admin.temas.edit')->only('edit','update');
        $this->middleware('can:admin.temas.delete')->only('delete');
    }

    public function index()
    {
        return view('admin.temas.index');
    }

    public function create()
    {
        return view('admin.temas.create');
    }

    public function store(TemaRequest $request)
    {
        $tema = Tema::create($request->validated());

        return redirect()->route('admin.temas.edit',$tema)->with('info','Tema registrado satisfactoriamente');
    }

    public function edit(Tema $tema)
    {
        return view('admin.temas.edit',compact('tema'));
    }

    public function update(TemaRequest $request, Tema $tema)
    {
        $tema->update($request->validated());

        return redirect()->route('admin.temas.edit',$tema)->with('info','Tema actualizado satisfactoriamente');
    }

    public function destroy(Tema $tema)
    {
        $tema->update([
            'activo' => false,
        ]);

        return back()->with('info','Tema eliminado satisfactoriamente');
    }
}
