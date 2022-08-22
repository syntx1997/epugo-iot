<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            return response(['errors' => $validator->errors()], 401);
        }

        // Check Email
        $email = User::where('email', $request->email)->first();

        // Check Password
        if(!$email || !Hash::check($request->password, $email->password)) {
            return response(['message' => 'Invalid Credentials!'], 401);
        }

        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
        }

        return response(['message' => 'Successfully logged in!'], 201);
    }

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response(['message' => 'Successfully logged out!'], 201);
    }
}
