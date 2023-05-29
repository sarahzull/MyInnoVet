<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\AvailableTimeslot;

class CalendarController extends Controller
{

    public function index()
    {
        $appointments = Appointment::with(['patient', 'slots', 'slots.slotDetails'])->get();
        return view('pages.calendar.index', ['appointments' => $appointments]);
    }
    
}
