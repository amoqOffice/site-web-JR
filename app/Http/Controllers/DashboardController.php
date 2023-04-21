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
        return view('back/home');
    }
}
