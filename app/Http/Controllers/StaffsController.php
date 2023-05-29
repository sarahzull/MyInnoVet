<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class StaffsController extends Controller
{

    public function index()
    {
        $role = Role::findByName('Veterinarian');
        $staffs = User::role($role)->latest()->get();
        return view('pages.staffs.index', compact('staffs'));
    }

    public function create()
    {
        return view('pages.staffs.create');
    }

    public function store(Request $request)
    {
        $staff = new User();
        $staff->name = $request->input('name');
        $staff->phone_no = $request->input('phone_no');
        $staff->email = $request->input('email');
        $staff->password = bcrypt($request->password);
        $staff->dob = $request->input('dob');
        $staff->street_address = $request->input('street_address');
        $staff->city = $request->input('city');
        $staff->state = $request->input('state');
        $staff->postcode = $request->input('postcode');
        $staff->assignRole('Veterinarian');
        $staff->save();

        return redirect()->route('staffs.index');
    }

    public function show($id)
    {
        $staff = User::find($id);
        return view('pages.staffs.show', compact('staff'));
    }

    public function edit($id)
    {
        $staff = User::find($id);
        return view('pages.staffs.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $staff = User::find($id);
        $staff->name = $request->input('name');
        $staff->phone_no = $request->input('phone_no');
        $staff->email = $request->input('email');
        $staff->password = bcrypt($request->password);
        $staff->dob = $request->input('dob');
        $staff->street_address = $request->input('street_address');
        $staff->city = $request->input('city');
        $staff->state = $request->input('state');
        $staff->postcode = $request->input('postcode');
        $staff->update();

        return redirect()->route('staffs.index');
    }
 
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('staffs.index');
    }
}
