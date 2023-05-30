<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Patient;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function index()
    {

        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        
        $totalClients = User::whereHas('roles', function ($query) {
            $query->where('name', 'client');
        })->count();

        $totalPatients = Patient::count();

        $totalVets = User::whereHas('roles', function ($query) {
            $query->where('name', 'Veterinarian');
        })->count();

        $todayAppointments = Appointment::with(['slots', 'slots.slotDetails'])
        ->join('slots', 'appointments.slot_id', '=', 'slots.id')
        ->whereDate('slots.date', now()->format('Y-m-d')) // Filter appointments for today's date
        ->count();

        $todayRegisteredPatients = Patient::whereDate('created_at', now()->toDateString())->count();

        $today = Carbon::now()->format('d F Y');

        $todayPatients = Patient::whereDate('created_at', now()->toDateString())->get();

        return view('pages.dashboards.index', compact(
            'totalClients', 
            'totalPatients', 
            'totalVets', 
            'todayAppointments', 
            'todayRegisteredPatients', 
            'today', 
            'todayPatients',
        ));
    }
}
