<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organismo;
use App\Http\Requests\OrganismoRequest;

class OrganismoController extends Controller
{

    public function index()
    {
        return view('admin.organismos.index');
    }

    public function create()
    {
        return view('admin.organismos.create');
    }

    public function store(OrganismoRequest $request)
    {
        $organismo = Organismo::create($request->validated());

        return redirect()->route('admin.organismos.edit',$organismo)->with('info','Institución registrada satisfactoriamente');
    }

    public function edit(Organismo $organismo)
    {
        return view('admin.organismos.edit',compact('organismo'));
    }

    public function update(OrganismoRequest $request, Organismo $organismo)
    {
        $organismo->update($request->validated());

        return redirect()->route('admin.organismos.edit',$organismo)->with('info','Institución actualizada satisfactoriamente');
    }

    public function delete(Organismo $organismo)
    {
        $organismo->update([
            'activo' => false,
        ]);

        return redirect()->route('admin.organismos.index')->with('info','Institución eliminada satisfactoriamente');
    }
}
