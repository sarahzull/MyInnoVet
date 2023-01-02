<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function index() {
        $patients = Patient::all();

        return view('patients.index', compact('patients'));
    }
}
