<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
//passaggio rotta al controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
