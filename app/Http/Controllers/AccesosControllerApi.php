<?php

namespace App\Http\Controllers;

use App\Acceso;
use Illuminate\Http\Request;

class AccesosControllerApi extends Controller
{
    public function all(){
       re Acceso::all();
    }
}
