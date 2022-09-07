<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temperature;
use App\Models\Decibel;

class APIController extends Controller
{
    public function temperature($temperature, $lightStatus) {
        Temperature::create([
            'temperature' => $temperature,
            'light_status' => $lightStatus
        ]);

        return response([
            'temperature' => $temperature,
            'lightStatus' => $lightStatus
        ], 201);
    }

    public function sound($decibel, $musicStatus) {
        Decibel::create([
            'decibel' => $decibel,
            'sound_status' => $musicStatus
        ]);

        return response([
            'decibel' => $decibel,
            'musicStatus' => $musicStatus
        ], 201);
    }
}
