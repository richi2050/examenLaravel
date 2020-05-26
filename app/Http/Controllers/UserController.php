<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 25/05/20
 * Time: 06:35 PM
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController {

    public function login(Request $request)
    {
        $user = User::whereEmail($request->email)->first();
        if (!is_null($user) && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Contactos')->accessToken;
            return response()->json(['res' => true, 'token' => $token, 'message' => "Bienvenido al sistema"]);
        } else
            return response()->json(['res' => false, 'message' => "Cuenta a password incorrectos"]);
    }


}