<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\PersonalAccessToken;
use PDO;

class myUserController extends Controller

{
    function signup(Request $request)
    {




        // return response()->json([
        //     'message' => 'An error occurred before signup.',

        // ], 500);


        $data = $request->validate([

            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->symbols()
                    ->numbers()

            ]
        ]);

        // $this->info('Signup request validated.', ['data' => $data['name']]);


        /** @var \App\Models\User $user */
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $token = $user->createToken('main')->plainTextToken;
        return response(compact('user', 'token'));


        // $name = $request->input("name");
        // $email = $request->input("email");
        // $password = $request->input("password");

        // /** @var \App\Models\User $user  */
        // $user = User::create([
        //     "name" => "$name",
        //     "email" => "$email",
        //     "password" => bcrypt($password),
        // ]);
        // $token = $user->createToken('auth_token')->plainTextToken;


        // return response(compact('user', 'token'));
    }

    function login(Request $request)
    {

        $credentials = $request->validate(
            [
                'email' => 'required|email|exists:users,email',  // Fixed semicolon to pipe and added exists rule
                'password' => 'required',  // Password is required
            ]
        );
        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Provided email or password is incorrect'
            ], 422);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $token = $user->createToken('main')->plainTextToken;
        return response(compact('user', 'token'));



        // $user = User::Where("email", $request->input("email"))->first();
        // if (!$user) {
        //     return response()->json(['message' => 'User not found']);
        // }


        // if ($user->password != $request->input("password")) {
        //     return response()->json(['message' => 'Wrong password']);
        // }


        // $token = $user->createToken("auth_token");
        // return response()->json(['token' => $token->plainTextToken]);
    }

    function logout(Request $request)
    {
        /** @var User $user */
        $user = $user = Auth::user();

        $token = $user->currentAccessToken();

        try {
            //$token->delete();
        } catch (Exception $e) {
        }





        // PersonalAccessToken::findToken($token->id)->delete();
    }
}
