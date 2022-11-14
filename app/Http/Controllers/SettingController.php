<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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

    public function updatePassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'currentPassword' => 'required',
            'newPassword' => 'required',
            'reTypePassword' => 'required'
        ]);

        if($validator->fails()) {
            return response(['errors' => $validator->errors()], 401);
        }

        $user = User::where('id', $request->id)->first();
        if(!Hash::check($request->currentPassword, $user->password)) {
            return response([
                'errors' => [
                    'currentPassword' => 'Incorrect Password!'
                ]
            ], 401);
        }

        if ($request->newPassword == $request->reTypePassword) {
            return response([
                'errors' => [
                    'newPassword' => 'Password did\'nt matched!',
                    'reTypePassword' => 'Password did\'nt matched!'
                ]
            ], 401);
        }

        $user->update(['password' => bcrypt($request->newPassword)]);

        return response(['message' => 'Password successfully updated!'], 201);
    }
}
