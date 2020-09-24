<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function home(){
        return 'Oi dentro do TaskController';
    }

    public function home2(){
        return 'Segundo método do TaskController';
    }
}
