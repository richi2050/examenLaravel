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
use Validator;

class UserController {

    public function login(Request $request)
    {
        if($request->email){
            $user = User::whereEmail($request->email)->first();
        }
        else{
            $user = User::whereUser($request->username)->first();
        }

        if (!is_null($user) && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Contactos')->accessToken;
            return response()->json(['res' => true, 'token' => $token, 'message' => "Hola"]);
        } else
            return response()->json(['res' => false, 'message' => "Upsss algo salio mal tu cuenta ó password incorrectos"]);
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'user' => 'required|min:6|max:6'
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $password = $request->password;
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return response()->json(['res' => true, 'message' => "Exito"]);
    }



}