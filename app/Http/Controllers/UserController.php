<?php
/**
 * Created by PhpStorm.
 * User: Ricardo
 * Date: 25/05/20
 * Time: 06:35 PM
 */

namespace App\Http\Controllers;

use App\User;
use App\Documents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController {

    public function login(Request $request)
    {
        if($request->email){
            $user = User::whereEmail($request->email)->first();

            if(!$user = User::whereEmail($request->email)->whereRoleId(1)->first()){
                return response()->json(['res' => false, 'message' => "Upsss algo salio mal, lo sentimos no eres administrador"]);
            }
        }
        else{
            $user = User::whereUser($request->username)->first();
            if(!$user = User::whereUser($request->username)->whereRoleId(1)->first()){
                return response()->json(['res' => false, 'message' => "Upsss algo salio mal, lo sentimos no eres administrador"]);
            }
        }



        if (!is_null($user) && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('Contactos')->accessToken;
            return response()->json(['res' => true, 'token' => $token, 'message' => "Hola"]);
        } else
            return response()->json(['res' => false, 'message' => "Upsss algo salio mal tu cuenta ó password incorrectos"]);
    }

    public function register(Request $request) {

        Validator::extend('valid_username', function($attr, $value){

            return preg_match('/^\S*$/u', $value);

        });

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'user' => 'required|valid_username|min:6|max:6|unique:users,user',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $password = $request->password;
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        return response()->json(['res' => true, 'message' => "Exito"], 200);
    }

    public function users(Request $request) {
        $users = User::all();
        return response()->json(['res' => true, 'users' => $users], 200);
    }

    public function user($id){
        $user = User::find($id);
        return response()->json(['res' => true, 'user' => $user], 200);
    }

    public function userDelete($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['res' => true, 'user' => $user], 200);
    }

    public function userUpdate(Request $request){
        Validator::extend('valid_username', function($attr, $value){

            return preg_match('/^\S*$/u', $value);

        });


        $user = User::find($request->id);

        if($request->name){
            $user->name= $request->name;
        }

        if($request->email){
            $user->email= $request->email;
        }

        if($request->user){
            $user->user= $request->user;
        }

        if($request->password){
            $user->password= bcrypt($request->password);
        }


        $user->save();

        return response()->json(['res' => true, 'user' => $user], 200);
    }

    public function userDoc($id){
        $doc = Documents::whereUserId($id)->get();

        return response()->json(['res' => true, 'doc' => $doc], 200);
    }





}