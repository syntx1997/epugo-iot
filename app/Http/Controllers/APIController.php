<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function get_all_temperature() {
        $data = [];

        $temperatures = Temperature::all();
        foreach ($temperatures as $temperature) {

            $status = <<<HERE
                    <span class="text-danger"><i class="fa fa-moon"></i> Off</span>
                HERE;

            if($temperature->light_status == 1) {
                $status = <<<HERE
                    <span class="text-success"><i class="fa fa-sun"></i> On</span>
                HERE;

            }

            $data[] = array_merge($temperature->toArray(), [
                'status' => $status,
                'datetime' => Carbon::parse($temperature->created_at)->format('M d, Y h:i A')
            ]);
        }

        return response(['data' => $data], 201);
    }

    public function get_all_sound() {
        $data = [];

        $sounds = Decibel::all();
        foreach ($sounds as $sound) {

            $status = <<<HERE
                    <span class="text-danger"><i class="fa fa-volume-mute"></i> Off</span>
                HERE;

            if($sound->sound_status == 1) {
                $status = <<<HERE
                    <span class="text-success"><i class="fa fa-volume-up"></i> On</span>
                HERE;

            }

            $data[] = array_merge($sound->toArray(), [
                'status' => $status,
                'datetime' => Carbon::parse($sound->created_at)->format('M d, Y h:i A')
            ]);
        }

        return response(['data' => $data], 201);
    }
}
