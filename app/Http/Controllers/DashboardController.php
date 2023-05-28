<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Patient;

class DashboardController extends Controller
{
    public function index()
    {

        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);
        
        $totalClients = User::whereHas('roles', function ($query) {
            $query->where('name', 'client');
        })->count();
        $totalPatients = Patient::count();

        return view('pages.dashboards.index', compact('totalClients', 'totalPatients'));
    }
}
