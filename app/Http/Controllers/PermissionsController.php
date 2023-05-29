<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{

    public function index()
    {
        $permissions = Permission::latest()->get();

        return view('pages.settings.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('pages.settings.permissions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        Permission::create(($validated));

        session()->flash('success', 'Permission created successfully.');

        return redirect()->route('permissions.index')->with('message', 'Permission created successfully');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $permission = Permission::findById($id);
        return view('pages.settings.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        Permission::where('id', $id)->update([
            'name' => $request->name,
        ]);

        return redirect()->route('permissions.index')->with('message', 'Permission updated successfully');
    }

    public function destroy($id)
    {
        Permission::destroy($id);

        return redirect(route('permissions.index'));
    }
}
