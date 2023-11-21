<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit','update');
        $this->middleware('can:admin.users.delete')->only('destroy');
    }

    public function index()
    {
        return view('admin.usuarios.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.usuarios.edit',compact('user','roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.usuarios.edit',$user)->with('info','Rol/es asignado/s satisfactoriamente');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.usuarios.index')->with('info','Rol eliminado satisfactoriamente');
    }
}
