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

        $user = auth()->user();
        $userRole = $user->getRoleNames()->first();
        $userId = $user->id;

        $today = Carbon::now()->format('d F Y');
    
        if ($userRole === 'Customer Service Executive') {

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
    
            $todayPatients = Patient::whereDate('created_at', now()->toDateString())->get();
    
            $totalClients = User::whereHas('roles', function ($query) {
                $query->where('name', 'Client');
            })->count();

            $data = compact(
                'totalClients', 
                'totalPatients', 
                'totalVets', 
                'todayAppointments', 
                'todayRegisteredPatients', 
                'today', 
                'todayPatients',
                'totalClients'
            );

        } elseif ($userRole === 'Veterinarian') {

            $vetTodayAppointments = Appointment::with(['slots', 'slots.slotDetails'])
                ->join('slots', 'appointments.slot_id', '=', 'slots.id')
                ->whereDate('slots.date', now()->format('Y-m-d'))
                ->where('appointments.staff_id', $userId)
                ->count();

            $vetTotalAppointments = Appointment::with(['slots', 'slots.slotDetails'])
                ->join('slots', 'appointments.slot_id', '=', 'slots.id')
                ->where('appointments.staff_id', $userId)
                ->count();

            $vetUpcomingAppointments = Appointment::with(['slots', 'slots.slotDetails'])
            ->join('slots', 'appointments.slot_id', '=', 'slots.id')
            ->whereDate('slots.date', '>', now()->format('Y-m-d'))
            ->where('appointments.staff_id', $userId)
            ->count();

            $todayPatients = Appointment::with(['patient', 'staffs','slots', 'slots.slotDetails'])
            ->join('slots', 'appointments.slot_id', '=', 'slots.id')
            ->whereDate('slots.date', now()->format('Y-m-d'))
            ->where('appointments.staff_id', $userId)
            ->select('appointments.*', 'appointments.id as appointment_id')
            ->get();

            $data = compact(
                'vetTodayAppointments', 
                'vetTotalAppointments', 
                'vetUpcomingAppointments',
                'today', 
                'todayPatients'
            );
        } elseif ($userRole === 'Client') {

            $clientTodayAppointments = Appointment::with(['slots', 'slots.slotDetails'])
                ->join('slots', 'appointments.slot_id', '=', 'slots.id')
                ->whereDate('slots.date', now()->format('Y-m-d'))
                ->where('appointments.staff_id', $userId)
                ->count();

            $clientTotalAppointments = Appointment::with(['slots', 'slots.slotDetails'])
                ->join('slots', 'appointments.slot_id', '=', 'slots.id')
                ->where('appointments.staff_id', $userId)
                ->count();

            $clientUpcomingAppointments = Appointment::with(['slots', 'slots.slotDetails'])
            ->join('slots', 'appointments.slot_id', '=', 'slots.id')
            ->whereDate('slots.date', '>', now()->format('Y-m-d'))
            ->where('appointments.staff_id', $userId)
            ->count();

            $data = compact(
                'clientTodayAppointments', 
                'clientTotalAppointments', 
                'clientUpcomingAppointments', 
            );

        }
    


        return view('pages.dashboards.index', $data);
    }
}