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
                                        <h2>E-PUGO: IoT-Based Quail Management Software</h2>
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
                                    <a class="nav-link" data-bs-toggle="tab" href="#Annual" role="tab">Annual</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#monthly" role="tab">Monthly</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#Weekly" role="tab">Weekly</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex">
                            <div class="ms-3">
                                <h4 class="fs-24 font-w700 ">0</h4>
                                <span class="fs-16 font-w400 d-block">Total Eggs</span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="monthly">
                            <div id="chartBar" class="chartBar"></div>
                        </div>
                        <div class="tab-pane fade" id="Weekly">
                            <div id="chartBar1" class="chartBar"></div>
                        </div>
                        <div class="tab-pane fade" id="Today">
                            <div id="chartBar2" class="chartBar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
