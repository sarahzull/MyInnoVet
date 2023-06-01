<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use Illuminate\Support\Facades\Redirect;

class MedicalRecordsController extends Controller
{
    
    public function index()
    {
        $user = auth()->user();
        $userRole = $user->getRoleNames()->first();

        $records = [];

        if ($userRole === 'Veterinarian') {
            $records = MedicalRecord::with('patient')
                ->whereHas('appointment', function ($query) use ($user) {
                    $query->where('staff_id', $user->id);
                })
                ->orderByDesc('created_at')
                ->get();
        } else {
            $records = MedicalRecord::with('patient')->orderByDesc('created_at')->get();
        }

        return view('pages.medical-records.index', compact('records'));
    }

    public function create(Request $request)
    {
        $patients = Patient::all();

        return view('pages.medical-records.create', compact('patients', 'patient'));
    }

    public function createById(Request $request)
    {
        $patient_id = $request['patient_id'];
        $patient = Patient::find($patient_id);

        return view('pages.medical-records.create-id', compact('patient'));
    }

    public function store(Request $request)
    {
        $medicalRecord = MedicalRecord::create([
            'patient_id' => $request->patient_id,
            'diagnosis' => $request->diagnosis,
            'treatment' => $request->treatment,
            'medication' => $request->medication,
            'appointment_id' => $request->appointment_id,
            'created_by_id' => auth()->user()->id,
        ]);

        // dd($medicalRecord);

        $appointment = Appointment::findOrFail($request->appointment_id);
        $appointment->is_confirmed = 2;
        $appointment->save();

        // dd($medicalRecord, $appointment);

        session()->flash('success', 'Medical record created successfully.');

        return Redirect::route('medical-records.index');
    }

    public function show($id)
    {
        $record = MedicalRecord::findOrFail($id);

        return view('pages.medical-records.show', compact('record'));
    }

    public function showById($patient_id)
    {
        $patient = Patient::where('id', $patient_id)->first();
        $records = MedicalRecord::where('patient_id', $patient_id)->get();

        return view('pages.medical-records.show-id', compact('patient', 'records'));
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
