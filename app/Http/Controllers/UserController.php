<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\User;
class UserController extends Controller
{
    public function login(Request $r){

        if(!empty($r->get('login')) && $r->get('login') == true){
            Log::alert("el email: ". $r->get('login')['email']." ha entrado correctamente");
            $message= "Inicio de sesion correcto";
        }else{
            $message = '';
        }

        return $message;
    }
}
