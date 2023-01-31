<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('settings.users.index', compact('users'));
    }

    public function create()
    {
        // $permissions = Permission::pluck('name', 'id');
        // return view('settings.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {

        // $role = Role::create($request->all());
        // $role->permissions()->sync($request->input('permissions', []));

        // return redirect()->route('roles.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'id');
        $user->load('roles');

        return view('settings.users.edit', compact('roles', 'user'));
    }

    public function update(Request $request, $id)
    {
        // $user->update($request->all());
        // $user->roles()->sync($request->input('roles', []));
        
        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect(route('users.index'));
    }
}
