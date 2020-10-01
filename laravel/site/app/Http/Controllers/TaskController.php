<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function controlador(){
        return 'Oi, sou o Controlador';
    }

    public function numero_dois(){
        return 'Oi, sou o segundo método da TaskController';
    }
}
