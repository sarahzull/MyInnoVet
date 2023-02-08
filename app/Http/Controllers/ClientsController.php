<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class ClientsController extends Controller
{
    public function index()
    {
        $role = Role::findByName('client');
        $clients = User::role($role)->get();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $role = Role::findByName('client');
        $client = User::whereHas('roles', function ($query) use ($role) {
            $query->where('name', $role->name);
        })->findOrFail($id);

        return view('clients.show', compact('client'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
