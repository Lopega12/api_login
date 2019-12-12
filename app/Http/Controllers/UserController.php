<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{
    public function login(Request $r){
            Log::alert("el email: ". $r->get('login')['email']." ha entrado correctamente");

        return "Inicio de sesion correcto";
    }
}
