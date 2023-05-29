<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Patient;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    
    public function index()
    {
        $appointments = Appointment::with('patient')->orderByDesc('start_time')->get();

        return view('pages.appointments.index', compact('appointments'));
    }

    
    public function create()
    {
        $patients = Patient::all();

        return view('pages.appointments.create', compact('patients'));
    }

    public function getAvailableSlots($date) 
    {
        $existing_appointments = Appointment::whereDate('start_time', $date)->get();
        $available_slots = [];
        $start_time = Carbon::parse($date)->startOfDay();
        $end_time = Carbon::parse($date)->endOfDay();
        while ($start_time < $end_time) {
            $slot = $start_time->format('g:i A');
            if (!$existing_appointments->contains('start_time', $start_time)) {
                $available_slots[] = $slot;
            }
            $start_time->addMinutes(15);
        }
        return $available_slots;
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'patient_id' => 'required|exists:patients,id',
            'type' => 'required|in:consultation,vaccine,checkup,surgery',
        ]);

        // check if the selected time slot is available
        $start_time = Carbon::parse($request->date . ' ' . $request->time);
        $end_time = $start_time->copy()->addMinutes(15);
        $is_available = Appointment::where('start_time', '<=', $start_time)
            ->where('finish_time', '>', $start_time)
            ->orWhere('start_time', '<', $end_time)
            ->where('finish_time', '>=', $end_time)
            ->doesntExist();

        if (!$is_available) {
            return redirect()->back()->withErrors(['The selected time slot is not available. Please choose another slot.']);
        }

        // create the appointment
        $appointment = new Appointment();
        $appointment->patient_id = $request->patient_id;
        $appointment->type = $request->type;
        $appointment->created_by_id = Auth::user()->id;
        $appointment->start_time = $start_time;
        $appointment->finish_time = $end_time;
        $appointment->save();

        // send email to patient's owner
        $patient = $appointment->patient;
        $owner = $patient->owner;
        $data = [
            'appointment' => $appointment,
            'patient' => $patient,
            'owner' => $owner,
        ];
        Mail::to($owner->email)->send(new AppointmentCreated($data));

        // send WhatsApp message to patient's owner
        $client = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
        $client->messages->create(
            'whatsapp:' . $owner->phone_number,
            [
                'from' => 'whatsapp:' . env('TWILIO_PHONE_NUMBER'),
                'body' => 'Your appointment on ' . $start_time->format('l, F j, Y \a\t h:i A') . ' has been successfully scheduled.'
            ]
        );

        return Redirect::route('appointments.index')->with('success', 'Appointment successfully created!');
    }

    
    public function show($id)
    {
        //
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
