<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\Redirect;

class MedicalRecordsController extends Controller
{
    
    public function index()
    {
        $records = MedicalRecord::with('patient')->orderByDesc('created_at')->get();

        return view('pages.medical-records.index', compact('records'));
    }

    public function create()
    {
        // $patients = Patient::latest()->take(2)->get();
        $patients = Patient::all();

        return view('pages.medical-records.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required',
            'diagnosis' => 'required',
            'treatment' => 'required',
            'medication' => 'required',
        ]);

        MedicalRecord::create([
            'patient_id' => $request->patient_id,
            'diagnosis' => $request->diagnosis,
            'treatment' => $request->treatment,
            'medication' => $request->medication,
            'created_by_id' => auth()->user()->id,
        ]);

        session()->flash('success', 'Medical record created successfully.');

        return Redirect::route('medical-records.index');
    }

    public function show($id)
    {
        $record = MedicalRecord::findOrFail($id);

        return view('pages.medical-records.show', compact('record'));
    }

    public function edit($id)
    {
        $record = MedicalRecord::with(['patient'])->findOrFail($id);

        return view('pages.medical-records.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        MedicalRecord::where('id', $id)->update([
            'patient_id' => $request->patient_id,
            'diagnosis' => $request->diagnosis,
            'treatment' => $request->treatment,
            'medication' => $request->medication,
            'updated_by_id' => auth()->user()->id,
        ]);
        
        session()->flash('success', 'Medical record updated successfully.');

        return Redirect::route('medical-records.show', ['id' => $id]);
    }

    public function destroy($id)
    {
        MedicalRecord::destroy($id);

        session()->flash('success', 'Medical record deleted successfully.');

        return Redirect::route('medical-records.index');
    }
}
