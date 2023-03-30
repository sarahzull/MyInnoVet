<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SpeciesController extends Controller
{
    public function index()
    {
        $species = Species::latest()->get();

        return view('pages.settings.species.index', compact('species'));
    }

    public function create()
    {
        return view('pages.settings.species.create');
    }

    public function store(Request $request)
    {
        Species::create([
            'name' => $request->name,
        ]);

        session()->flash('success', 'Species created successfully.');

        return Redirect::route('species.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $species = Species::findOrfail($id);

        return view('pages.settings.species.edit', compact('species'));
    }

    public function update(Request $request, $id)
    {
        Species::where('id', $id)->update([
            'name' => $request->name,
        ]);

        session()->flash('success', 'Species updated successfully.');

        return Redirect::route('species.index');
    }

    public function destroy($id)
    {
        Species::destroy($id);

        session()->flash('success', 'Species deleted successfully.');

        return Redirect::route('species.index');
    }
}
