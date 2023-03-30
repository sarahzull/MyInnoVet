<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->latest()->get();

        return view('pages.settings.users.index', compact('users'));
    }

    public function create()
    {
        return view('pages.settings.users.create');
    }

    public function store(Request $request)
    {

        $user = new User();
        $user->name = $request->input('name');
        $user->phone_no = $request->input('phone_no');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->password);
        $user->dob = $request->input('dob');
        $user->street_address = $request->input('street_address');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->postcode = $request->input('postcode');
        $user->assignRole('user');
        $user->save();
    
        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $birthDate = Carbon::parse($user->dob)->format('d F Y');
        $joinedDate = Carbon::parse($user->created_at)->format('d F Y');

        return view('pages.settings.users.show', compact('user', 'birthDate', 'joinedDate'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('pages.settings.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->phone_no = $request->input('phone_no');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->password);
        $user->dob = $request->input('dob');
        $user->street_address = $request->input('street_address');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->postcode = $request->input('postcode');
        $user->update();

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index');
    }
}
