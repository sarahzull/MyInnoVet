<?php

namespace App\Http\Controllers;

use App\Models\Species;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index() 
    {
        $species = Species::latest('created_at')->first();

        return view('pages.settings.settings', compact('species'));
    }
}
