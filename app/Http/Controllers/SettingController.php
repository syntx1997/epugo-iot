<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function updateInformation(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()], 401);
        }

        if ($request->has('avatar')) {
            $avatar = $request->file('avatar')->store('avatar', 'public');
        } else {
            $avatar = $request->avatarFile;
        }

        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $avatar
        ]);

        return response([
            'message' => 'Settings updated successfully!'
        ], 201);
    }
}
