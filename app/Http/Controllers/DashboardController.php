<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Temperature;
use App\Models\Decibel;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Dashboard',
            'temperatureDecibelStatsData' => $this->temperatureDecibelStatsData()
        ];

        return view('admin.index', $data);
    }

    public function room() {
        return view('admin.room', [
            'title' => 'Room',
            'js' => asset('js/dashboard/room.js')
        ]);
    }

    public function quail() {
        return view('admin.quail', [
            'title' => 'Quail',
            'js' => asset('js/dashboard/quail.js')
        ]);
    }

    public function count_egg() {
        return view('admin.count-egg', [
            'title' => 'Count Egg',
            'js' => asset('js/dashboard/count-egg.js')
        ]);
    }

    public function collect_egg() {
        return view('admin.collect-egg', [
            'title' => 'Eggs Collected',
            'js' => asset('js/dashboard/collect-egg.js')
        ]);
    }

    public function api() {
        return view('admin.api', [
            'title' => 'API',
            'js' => asset('js/dashboard/api.js')
        ]);
    }

    public function temperature() {
        return view('admin.temperature', [
            'title' => 'Temperature',
            'js' => asset('js/dashboard/temperature.js')
        ]);
    }

    public function sound() {
        return view('admin.sound', [
            'title' => 'Sound',
            'js' => asset('js/dashboard/sound.js')
        ]);
    }

    public function summary() {
        return view('admin.summary', [
            'title' => 'Summary',
            'js' => asset('js/dashboard/summary.js')
        ]);
    }

    public function settings() {
        return view('admin.settings', [
            'title' => 'Settings',
            'js' => asset('js/dashboard/settings.js')
        ]);
    }

    private function temperatureDecibelStatsData() {
        $data = [
            'temperature' => [
                'highest' => 0,
                'lowest' => 0
            ],
            'decibel' => [
                'highest' => 0,
                'lowest' => 0
            ]
        ];

        // Temperature
        $temperatures = [0];
        $temps = Temperature::all();
        foreach ($temps as $temp) {
            $temperatures[] = preg_replace('/[^0-9]/', '', $temp->temperature);
        }
        $data['temperature']['highest'] = max($temperatures);
        $data['temperature']['lowest'] = min($temperatures);

        // Decibel
        $decibels = [0];
        $dcbls = Decibel::all();
        foreach ($dcbls as $dcbl) {
            $decibels[] = preg_replace('/[^0-9]/', '', $dcbl->decibel);
        }
        $data['decibel']['highest'] = max($decibels);
        $data['decibel']['lowest'] = min($decibels);

        return $data;
    }

    private function annual_report() {
        $data = [
            'Jan' => 0,
            'Feb' => 0,
            'Mar' => 0,
            'Apr' => 0,
            'May' => 0,
            'Jun' => 0,
            'Jul' => 0,
            'Aug' => 0,
            'Sep' => 0,
            'Oct' => 0,
            'Nov' => 0,
            'Dec' => 0
        ];



        return $data;
    }
}
