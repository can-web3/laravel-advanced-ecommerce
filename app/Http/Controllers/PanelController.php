<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function getDashboard()
    {
        return view('panel.dashboard');
    }

    public function getProfile()
    {
        return view('panel.profile');
    }
}
