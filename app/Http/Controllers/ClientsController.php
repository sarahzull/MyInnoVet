<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Validator;

class ClientsController extends Controller
{
    public function index()
    {
        $role = Role::findByName('client');
        $clients = User::role($role)->latest()->get();

        return view('pages.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('pages.clients.create');
    }

    public function store(Request $request)
    {
        $client = new User();
        $client->name = $request->input('name');
        $client->phone_no = $request->input('phone_no');
        $client->email = $request->input('email');
        $client->password = bcrypt($request->password);
        $client->dob = $request->input('dob');
        $client->street_address = $request->input('street_address');
        $client->city = $request->input('city');
        $client->state = $request->input('state');
        $client->postcode = $request->input('postcode');
        $client->assignRole('Client');
        $client->save();
    
        return redirect()->route('clients.index');
    }

    public function show($id)
    {
        $client = User::find($id);
        return view('pages.clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = User::find($id);
        return view('pages.clients.edit', compact('client'))->with('success', 'Client has been created');
    }

    public function update(Request $request, $id)
    {
        $client = User::find($id);
        $client->name = $request->input('name');
        $client->phone_no = $request->input('phone_no');
        $client->email = $request->input('email');
        $client->password = bcrypt($request->password);
        $client->dob = $request->input('dob');
        $client->street_address = $request->input('street_address');
        $client->city = $request->input('city');
        $client->state = $request->input('state');
        $client->postcode = $request->input('postcode');
        $client->update();

        return redirect()->route('clients.index')->with('success', 'Client has been updated');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('clients.index')->with('success', 'Client has been deleted');
    }
}
