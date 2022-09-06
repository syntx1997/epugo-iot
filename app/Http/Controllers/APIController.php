<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function temperature($temperature, $lightStatus) {
        return response([
            'temperature' => $temperature,
            'lightStatus' => $lightStatus
        ], 201);
    }

    public function sound($decibel, $musicStatus) {
        return response([
            'decibel' => $decibel,
            'musicStatus' => $musicStatus
        ], 201);
    }
}
