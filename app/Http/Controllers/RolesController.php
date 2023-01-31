<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('settings.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::pluck('name', 'id');
        return view('settings.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        // $role = Role::find($request->id);
        // $permissions = Permission::whereIn('permissions', $request->id)->get();
        // $role->syncPermissions($permissions);

        // $validated = $request->validate(['name' => ['required', 'min:3']]);
        // Role::create(($validated));

        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::findById($id);
        return view('settings.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        Role::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        Role::destroy($id);

        return redirect(route('roles.index'));
    }

    // public function givePermission(Request $request, Role $role)
    // {
    //     if ($role->hasPermissionTo($request->permission)) {
    //         return back()->with('message', 'Permission exists.');
    //     } 

    //     $role->givePermissionTo($request->permission);

    //     return redirect(route('roles.index'));
    // }
}
