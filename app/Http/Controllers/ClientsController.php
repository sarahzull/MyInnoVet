<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateClientRequest;

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
        // $role = Role::findByName('client');
        // $client = User::whereHas('roles', function ($query) use ($role) {
        //     $query->where('name', $role->name);
        // })->findOrFail($id);

        //Validate the input
        $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'phone_no' => ['sometimes', 'string', 'max:255'],
            'password' => ['sometimes', 'nullable', 'string', 'min:8', 'confirmed'],
            'dob' => ['sometimes', 'date'],
            'street_address' => ['sometimes', 'string', 'max:255'],
            'city' => ['sometimes', 'string', 'max:255'],
            'state' => ['sometimes', 'string', 'max:255'],
            'postcode' => ['sometimes', 'string', 'max:255'],
        ]);

        // $input = [
            // 'name' => $request->name,
            // 'email' => $request->email,
            // 'phone_no' => $request->phone_no,
            // 'password' => $request->password,
            // 'dob' => $request->dob,
            // 'street_address' => $request->street_address,
            // 'city' => $request->city,
            // 'state' => $request->state,
            // 'postcode' => $request->postcode,
        // ];

        // Hash the password if it was provided
        // if ($request->filled('password')) {
        //     $input['password'] = Hash::make($request['password']);
        // } else {
        //     unset($input['password']);
        // }

        // Update the user's information
        // $client->update($input);

        User::where('id', $id)->update([
            'name' => $request->name,
            'name' => $request->name,
            'email' => $request->email,
            'phone_no' => $request->phone_no,
            'password' => $request->password,
            'dob' => $request->dob,
            'street_address' => $request->street_address,
            'city' => $request->city,
            'state' => $request->state,
            'postcode' => $request->postcode,
            
        ]);

        // Redirect with a success message
        return redirect()->route('clients.show', [$id])->with('success', 'Client has been updated');
    }


    public function destroy($id)
    {
        //
    }
}
