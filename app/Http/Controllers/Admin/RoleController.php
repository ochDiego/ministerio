<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.roles.index')->only('index');
        $this->middleware('can:admin.roles.create')->only('create','store');
        $this->middleware('can:admin.roles.edit')->only('edit','update');
        $this->middleware('can:admin.roles.delete')->only('delete');
    }

    public function index()
    {
        return view('admin.roles.index');
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create',compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit',$role)->with('info','Rol registrado satisfactoriamente');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.roles.edit',compact('role','permissions'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());

        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.roles.edit',$role)->with('info','Rol actualizado satisfactoriamente');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return back();
    }
}
