<?php

namespace App\Http\Controllers;

use App\Accueil;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        return view('back.Accueil.index');
    }
}
