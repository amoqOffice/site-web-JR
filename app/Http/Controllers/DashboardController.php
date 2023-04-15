<?php

namespace App\Http\Controllers;

use App\Temple;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $temple = Temple::find(1);

        return view('back/home', compact('temple'));
    }
}
