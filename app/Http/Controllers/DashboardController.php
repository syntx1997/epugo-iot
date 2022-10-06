<?php

namespace App\Http\Controllers;

use App\Models\Egg;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Temperature;
use App\Models\Decibel;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Dashboard',
            'temperatureDecibelStatsData' => $this->temperatureDecibelStatsData(),
            'annualReport' => $this->annual_report(),
            'monthlyReport' => $this->monthlyReport(),
            'weeklyReport' => $this->weeklyReport()
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

        // January
        $JanuaryData = Egg::whereMonth('created_at', '=', '01')
            ->whereYear('created_at', '=', Carbon::parse(now())->format('Y'))
            ->get();
        foreach ($JanuaryData as $jan) {
            $data['Jan'] +=  $jan->total;
        }

        // February
        $FebruaryData = Egg::whereMonth('created_at', '=', '02')
            ->whereYear('created_at', '=', Carbon::parse(now())->format('Y'))
            ->get();
        foreach ($FebruaryData as $feb) {
            $data['Feb'] += $feb->total;
        }

        // March
        $MarchData = Egg::whereMonth('created_at', '=', '03')
            ->whereYear('created_at', '=', Carbon::parse(now())->format('Y'))
            ->get();
        foreach ($MarchData as $mar) {
            $data['Mar'] += $mar->total;
        }

        // April
        $AprilData = Egg::whereMonth('created_at', '=', '04')
            ->whereYear('created_at', '=', Carbon::parse(now())->format('Y'))
            ->get();
        foreach ($AprilData as $apr) {
            $data['Apr'] += $apr->total;
        }

        // May
        $MayData = Egg::whereMonth('created_at', '=', '05')
            ->whereYear('created_at', '=', Carbon::parse(now())->format('Y'))
            ->get();
        foreach ($MarchData as $may) {
            $data['May'] += $may->total;
        }

        // June
        $JuneData = Egg::whereMonth('created_at', '=', '06')
            ->whereYear('created_at', '=', Carbon::parse(now())->format('Y'))
            ->get();
        foreach ($JuneData as $jun) {
            $data['Jun']  += $jun->total;
        }

        // July
        $JulyData = Egg::whereMonth('created_at', '=', '07')
            ->whereYear('created_at', '=', Carbon::parse(now())->format('Y'))
            ->get();
        foreach ($JulyData as $jul) {
            $data['Jul'] += $jul->total;
        }

        // August
        $AugustData = Egg::whereMonth('created_at', '=', '08')
            ->whereYear('created_at', '=', Carbon::parse(now())->format('Y'))
            ->get();
        foreach($AugustData as $aug) {
            $data['Aug'] += $aug->total;
        }

        // September
        $SeptemberData = Egg::whereMonth('created_at', '=', '09')
            ->whereYear('created_at', '=', Carbon::parse(now())->format('Y'))
            ->get();
        foreach ($SeptemberData as $sep) {
            $data['Sep'] += $sep->total;
        }

        // October
        $OctoberData = Egg::whereMonth('created_at', '=', '010')
            ->whereYear('created_at', '=', Carbon::parse(now())->format('Y'))
            ->get();
        foreach ($OctoberData as $oct) {
            $data['Oct'] += $oct->total;
        }

        // November
        $NovemberData = Egg::whereMonth('created_at', '=', '11')
            ->whereYear('created_at', '=', Carbon::parse(now())->format('Y'))
            ->get();
        foreach ($NovemberData as $nov) {
            $data['Nov'] += $nov->total;
        }

        //December
        $DecemberData = Egg::whereMonth('created_at', '=', '12')
            ->whereYear('created_at', '=', Carbon::parse(now())->format('Y'))
            ->get();

        foreach ($DecemberData as $dec) {
            $data['Dec'] += $dec->total;
        }

        return $data;
    }

    private function weeklyReport() {
        $data = [
            'Mon' => 0,
            'Tue' => 0,
            'Wed' => 0,
            'Thu' => 0,
            'Fri' => 0,
            'Sat' => 0,
            'Sun' => 0
        ];

        $eggs = Egg::whereBetween('created_at', [
            Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()
        ])->get();
        foreach ($eggs as $egg) {

            $day = Carbon::parse($egg->created_at)->format('D');
            if($day == 'Mon') {
                $data['Mon'] += $egg->total;
            } else if ($day == 'Tue') {
                $data['Tue'] += $egg->total;
            } else if ($day == 'Wed') {
                $data['Wed'] += $egg->total;
            } else if ($day == 'Thu') {
                $data['Thu'] += $egg->total;
            } else if ($day == 'Fri') {
                $data['Fri'] += $egg->total;
            } else if ($day == 'Sat') {
                $data['Sat'] += $egg->total;
            } else if ($day == 'Sun') {
                $data['Sun'] += $egg->total;
            }

        }

        return $data;
    }

    private function monthlyReport() {
        $data = [];

        $dysInCurrentMonth = Carbon::now()->month(Carbon::parse(now())->format('m'))->daysInMonth;
        for($i = 1; $i <= $dysInCurrentMonth; $i++) {
            $eggs = Egg::whereMonth('created_at', '=', Carbon::now()->month)
                ->whereDay('created_at', str_pad($i,2,"0",STR_PAD_LEFT))->get();
            foreach ($eggs as $egg) {
                $data[$i] = $egg->total;
            }

            if(count($eggs) == 0) {
                $data[$i] = 0;
            }
        }

        return $data;
    }
}
