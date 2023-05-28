<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::findByName('Veterinarian');
        $staffs = User::role($role)->latest()->get();
        return view('pages.staffs.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.staffs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $staff->assignRole('Staff');
        $staff->save();

        return redirect()->route('staffs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff = User::find($id);
        return view('pages.staffs.show', compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff = User::find($id);
        return view('pages.staffs.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('staffs.index');
    }
}
