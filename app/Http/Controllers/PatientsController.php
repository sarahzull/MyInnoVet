<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Patient;
use App\Models\Species;
use Illuminate\Http\Request;
use App\Models\MedicalRecord;

class PatientsController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userRole = $user->getRoleNames()->first();

        if ($userRole === 'Client') {
            $patients = Patient::with('species')
                        ->where('owner_id', $user->id)
                        ->latest()
                        ->get();
            $pageTitle = 'Pet List';
            $breadcrumb = 'Pets';
            $addButton = 'Add Pet';
        } else {
            $patients = Patient::with('species')->latest()->get();
            $pageTitle = 'Patient List';
            $breadcrumb = 'Patients';
            $addButton = 'Add Patient';
        }

        return view('pages.patients.index', compact('patients', 'pageTitle', 'breadcrumb', 'addButton'));
    }

    public function create()
    {
        $species = Species::all();

        return view('pages.patients.create', compact('species'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            // 'image' => 'required|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(public_path('storage'), $newImageName);
        } else {
            $newImageName = 'blank.png'; // Replace 'default-image.jpg' with the name of your default image file
        }

        // $newImageName = time() . '-' . $request->name . '.' .$request->image->extension();
        // $request->image->move(public_path('storage'), $newImageName);

        $user = auth()->user();
        $userRole = $user->getRoleNames()->first();
        if ($userRole === 'Client') {
            $patient = Patient::create([
                'name' => $request->name,
                'dob' => $request->dob,
                'breed' => $request->breed,
                'gender' => $request->gender,
                'species_id' => $request->species,
                'height' => $request->height,
                'weight' => $request->weight,
                'chronic_disease' => $request->chronic_disease,
                'image' => $newImageName,
                'owner_id' => auth()->user()->id,
                'created_by_id' => auth()->user()->id,
            ]);
        } else {
            $patient = Patient::create([
                'name' => $request->name,
                'dob' => $request->dob,
                'breed' => $request->breed,
                'gender' => $request->gender,
                'species_id' => $request->species,
                'height' => $request->height,
                'weight' => $request->weight,
                'chronic_disease' => $request->chronic_disease,
                'image' => $newImageName,
                'owner_id' => $request->owner_id,
                'created_by_id' => auth()->user()->id,
            ]);
        }

        if ($request->input('photo', false)) {
            $patient->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $patient->id]);
        }

        return redirect()->route('patients.index')->with('message', 'Patient has been created')->withErrors(['error' => 'An error occurred. Please check your inputs.']);
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        $birthDate = Carbon::parse($patient->dob)->format('d F Y');
        $joinedDate = Carbon::parse($patient->created_at)->format('d F Y');
        $medicalRecords = MedicalRecord::with(['appointment'])->where('patient_id', $id)->orderByDesc('created_at')->get();
        $lastVisit = MedicalRecord::where('patient_id', $id)->latest('created_at')->value('created_at');

        $appointments = Appointment::with(['patient', 'staffs', 'slots', 'slots.slotDetails'])
            ->join('slots', 'appointments.slot_id', '=', 'slots.id')
            ->join('patients', 'appointments.patient_id', '=', 'patients.id')
            ->orderBy('slots.date', 'desc')
            ->orderBy('slots.slot', 'desc')
            ->select('appointments.*') // avoids ambiguity in SQL select
            ->where('appointments.patient_id', $id)
            ->get();

        return view('pages.patients.show', compact('patient', 'birthDate', 'joinedDate', 'medicalRecords', 'lastVisit', 'appointments'));
    }

    public function edit($id)
    {
        $patient = Patient::with(['owner'])->findOrFail($id);
        $species = Species::all();
        $owners = User::all();

        return view('pages.patients.edit', compact('patient', 'species', 'owners'));
    }

    public function update(Request $request, $id)
    {

        // if ($request->hasFile('image')) {
        //     $destination = 'images/' . $request->oldImage;
        //     if (file_exists($destination)) {
        //         @unlink($destination);
        //     }
        //     $newImageName = time() . '-' . $request->name . '.' . $request->image->extension();
        //     $request->image->move(public_path('images'), $newImageName);
        // } else {
        //     $newImageName = $request->oldImage;
        // }

        $request->validate([
            'image' => 'mimes:jpg,png,jpeg|max:2048'
        ]);

        $input = [
            'name' => $request->name,
            'dob' => $request->dob,
            'breed' => $request->breed,
            'gender' => $request->gender,
            'species_id' => $request->species,
            'height' => $request->height,
            'weight' => $request->weight,
            'chronic_disease' => $request->chronic_disease,
            'owner_id' => $request->owner_id,
          ];

        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . '-' . $request->name . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        
        Patient::where('id', $id)->update($input);

        return redirect()->route('patients.show', [$id])->with('success', 'Patient has been updated');
    }

    public function destroy($id)
    {
        Patient::destroy($id);

        return redirect()->route('patients.index')->with('message', 'Patient has been deleted');
    }
}
