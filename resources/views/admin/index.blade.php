@extends('layout.main')
@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card tryal-gradient">
                                <div class="card-body tryal row">
                                    <div class="col-xl-7 col-sm-6">
                                        <h2>ePugo: An IoT-Based Quail Poultry Management System</h2>
                                        <span>Manage your Quail Farm Seamlesly</span>
{{--                                            <a href="javascript:void(0);" class="btn btn-rounded  fs-18 font-w500">Try Free Now</a>--}}
                                    </div>
                                    <div class="col-xl-5 col-sm-6">
                                        <img src="{{ asset('images/chart.png') }}" alt="" class="sd-shape">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-xl-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body d-flex px-4 pb-0 justify-content-between">
                                            <div>
                                                <h4 class="fs-18 font-w600 mb-4 text-nowrap">Highest Temperature</h4>
                                                <div class="d-flex align-items-center mb-5">
                                                    <h2 class="fs-32 font-w700 mb-0">{{ $temperatureDecibelStatsData['temperature']['highest'] }}°C</h2>
                                                </div>
                                            </div>
                                            <span class="display-4 text-danger">
                                                <i class="fa fa-thermometer-full"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body d-flex px-4 pb-0 justify-content-between">
                                            <div>
                                                <h4 class="fs-18 font-w600 mb-4 text-nowrap">Lowest Temperature</h4>
                                                <div class="d-flex align-items-center mb-5">
                                                    <h2 class="fs-32 font-w700 mb-0">{{ $temperatureDecibelStatsData['temperature']['lowest'] }}°C</h2>
                                                </div>
                                            </div>
                                            <span class="display-4 text-danger">
                                                <i class="fa fa-thermometer-half"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body d-flex px-4 pb-0 justify-content-between">
                                            <div>
                                                <h4 class="fs-18 font-w600 mb-4 text-nowrap">Highest Decibel</h4>
                                                <div class="d-flex align-items-center mb-5">
                                                    <h2 class="fs-32 font-w700 mb-0">{{ $temperatureDecibelStatsData['decibel']['highest'] }}db</h2>
                                                </div>
                                            </div>
                                            <span class="display-4 text-primary">
                                                <i class="fa fa-volume-up"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body d-flex px-4 pb-0 justify-content-between">
                                            <div>
                                                <h4 class="fs-18 font-w600 mb-4 text-nowrap">Lowest Decibel</h4>
                                                <div class="d-flex align-items-center mb-5">
                                                    <h2 class="fs-32 font-w700 mb-0">{{ $temperatureDecibelStatsData['decibel']['lowest'] }}db</h2>
                                                </div>
                                            </div>
                                            <span class="display-4 text-primary">
                                                <i class="fa fa-volume-down"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0 flex-wrap">
                    <h4 class="fs-20 font-w700 mb-2">Eggs Collected</h4>
                    <div class="d-flex align-items-center project-tab mb-2">
                        <div class="card-tabs mt-3 mt-sm-0 mb-3 ">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#thisYear" role="tab">This Year</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#thisMonth" role="tab">This Month</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#thisWeek" role="tab">This Week</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex">
                            <div class="ms-3">
                                <h4 class="fs-24 font-w700 ">{{ \App\Models\Egg::sum('total') }}</h4>
                                <span class="fs-16 font-w400 d-block">Total Eggs</span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="thisMonth">
                            <div id="monthChartBar" class="thisMonthChartBar"></div>
                        </div>
                        <div class="tab-pane fade active show" id="thisWeek">
                            <div id="weekChartBar" class="thisWeekChartBar"></div>
                        </div>
                        <div class="tab-pane fade" id="thisYear">
                            <div id="yearChartBar" class="thisYearChartBar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const thisWeek = [
            {{ $weeklyReport['Mon'] }},
            {{ $weeklyReport['Tue'] }},
            {{ $weeklyReport['Wed'] }},
            {{ $weeklyReport['Thu'] }},
            {{ $weeklyReport['Fri'] }},
            {{ $weeklyReport['Sat'] }},
            {{ $weeklyReport['Sun'] }},
        ];

        const thisYear = [
            {{ $annualReport['Jan'] }},
            {{ $annualReport['Feb'] }},
            {{ $annualReport['Mar'] }},
            {{ $annualReport['Apr'] }},
            {{ $annualReport['May'] }},
            {{ $annualReport['Jun'] }},
            {{ $annualReport['Jul'] }},
            {{ $annualReport['Aug'] }},
            {{ $annualReport['Sep'] }},
            {{ $annualReport['Oct'] }},
            {{ $annualReport['Nov'] }},
            {{ $annualReport['Dec'] }},
        ];

        const thisMonth = [
            {{ $monthlyReport[1] }},
            {{ $monthlyReport[2] }},
            {{ $monthlyReport[3] }},
            {{ $monthlyReport[4] }},
            {{ $monthlyReport[5] }},
            {{ $monthlyReport[6] }},
            {{ $monthlyReport[7] }},
            {{ $monthlyReport[8] }},
            {{ $monthlyReport[9] }},
            {{ $monthlyReport[10] }},
            {{ $monthlyReport[11] }},
            {{ $monthlyReport[12] }},
            {{ $monthlyReport[13] }},
            {{ $monthlyReport[14] }},
            {{ $monthlyReport[15] }},
            {{ $monthlyReport[16] }},
            {{ $monthlyReport[17] }},
            {{ $monthlyReport[18] }},
            {{ $monthlyReport[19] }},
            {{ $monthlyReport[20] }},
            {{ $monthlyReport[21] }},
            {{ $monthlyReport[22] }},
            {{ $monthlyReport[23] }},
            {{ $monthlyReport[24] }},
            {{ $monthlyReport[25] }},
            {{ $monthlyReport[26] }},
            {{ $monthlyReport[27] }},
            {{ $monthlyReport[28] }},
            {{ $monthlyReport[29] ?? 0 }},
            {{ $monthlyReport[30] ?? 0 }},
            {{ $monthlyReport[31] ?? 0 }},
        ];
    </script>

@endsection
