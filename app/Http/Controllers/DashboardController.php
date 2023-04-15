<?php

namespace App\Http\Controllers;

use App\Activite;
use App\Enseignement;
use App\Responsable;
use App\Rubrique;
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
