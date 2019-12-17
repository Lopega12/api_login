<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Acceso;
class UserController extends Controller
{
    public function login(Request $r){

        if(!empty($r->get('user'))){
            $user = $r->get('user');
            Log::alert("el email: ". $r->get('user')->email." ha entrado correctamente");
            $a = new Acceso();
            try{
                $a->email = $user->email;
                $a->fecha_entrada = date('Y-m-d H:i:s');
                $a->save();
            }catch(\Exception $e){
                return response($e->getMessage());
            }
            $message= "Inicio de sesion correcto";
        }else{
            $message = '';
        }

        return $message;
    }
}
