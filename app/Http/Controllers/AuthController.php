<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')
            ->only('logout');
    }

    public function register(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required|max:225',
                'email' => 'required|email|unique:users',
                'password' => 'required|between:6,25|confirmed',
            ]);
        } catch (ValidationException $e) {

        }

        $user = new user($request->all());;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'success' => true
        ]);


    }

    public function login(Request $request)
    {

        try {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|between:6,25',
            ]);
        } catch (ValidationException $e) {
        }

        $user = User::whereEmail($request->email)->first();

        if($user && Hash::check($request->password, $user->password)){
            $user->api_token = Str::random(60);
            $user->save();

            return response()->json([
                'success' => true,
                'user_id' => $user->id,
                'api_token' => $user->api_token,
                'name' => $user->name,
                'isAdmin' => $user->isAdmin,
            ]);
        }

        return response()->json([
            'errors' => [
                'email' => 'These credentials do not match out records'
            ], 422
        ]);
    }
    public function logout(Request $request){
        $user = $request->user();
        $user->api_token = null;
        $user->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
