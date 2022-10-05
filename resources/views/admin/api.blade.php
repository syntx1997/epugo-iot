@extends('layout.main')
@section('content')

    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
        </ol>
    </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $title }}</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-outline-info">
                        <i class="fa fa-info"></i> Replace {variable} to specific data.
                    </div>
                    <div class="form-group mb-3">
                        <label><strong>TEMPERATURE</strong></label>
                        <input type="text" name="temperature-api" value="{{ url('/') }}/api/temperature/{temperature}/{light-status}" class="form-control">
                        <p><strong class="text-dark">{temperature}</strong> - Temperature (e.g. 36.1°C)</p>
                        <p><strong class="text-dark">{light-status}</strong> - Light Status (e.g. 0 or 1 /). 0 means light has been turned off. 1 means light has been turned on.</p>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label><strong>SOUND</strong></label>
                        <input type="text" name="sound-api" value="{{ url('/') }}/api/sound/{decibel}/{music-status}" class="form-control">
                        <p><strong class="text-dark">{decibel}</strong> - Decibel (e.g. 0.1)</p>
                        <p><strong class="text-dark">{music-status}</strong> - Music Status (e.g. 0 or 1). 0 means music has been turned off. 1 means light as been turned on.</p>
                    </div>
                    <div class="form-group">
                        <label><strong>BOTH</strong></label>
                        <input type="text" name="sound-api" value="{{ url('/') }}/api/temperature/sound/{temperature}/{lightStatus}/{decibel}/{musicStatus}" class="form-control">
                        <p><strong class="text-dark">{temperature}</strong> - Temperature (e.g. 36.1°C)</p>
                        <p><strong class="text-dark">{light-status}</strong> - Light Status (e.g. 0 or 1 /). 0 means light has been turned off. 1 means light has been turned on.</p>
                        <p><strong class="text-dark">{decibel}</strong> - Decibel (e.g. 0.1)</p>
                        <p><strong class="text-dark">{music-status}</strong> - Music Status (e.g. 0 or 1). 0 means music has been turned off. 1 means light as been turned on.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
