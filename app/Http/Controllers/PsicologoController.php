<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PsicologoController extends Controller
{
    public function listPsicologos(){
        return view("psicologos");
    }

    public function listLogin(){
        return view("login");
    }
}
