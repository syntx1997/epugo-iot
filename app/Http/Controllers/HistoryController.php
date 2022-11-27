<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temperature;
use App\Models\Decibel;
use App\Models\Egg;
use Illuminate\Support\Carbon;

class HistoryController extends Controller
{
    public function getAll() {
        $data = [];
        $startDate = Carbon::createFromDate(2022, 10, 1);
        $endDate = Carbon::now();

        while($startDate < $endDate) {

            $temperature = Temperature::whereDate('created_at', '=', $startDate)->first();
            $decibel = Decibel::whereDate('created_at', '=', $startDate)->first();

            $data[] = [
                'date' => $startDate,
                'temperature' => $temperature->temperature ?? 0,
                'decibel' => $decibel->decibel ?? 0,
                'eggsCollected' => Egg::whereDate('created_at', '=', $startDate)->sum('total')
            ];

            $startDate->addDay();
        }

        return response(['data' => $data]);
    }
}
