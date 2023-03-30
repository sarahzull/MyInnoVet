<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function indec() {
        return view('pages.settings.settings');
    }
}
