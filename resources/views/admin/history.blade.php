@extends('layout.main')
@section('content')

    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
        </ol>
    </div>

    <div class="card">
        <div class="card-header">
            <p class="fw-bold">{{ $title }}</p>
        </div>
        <div class="card-body">
            <table class="table" style="width: 100%" id="historyTable">
                <thead>
                <tr>
                    <th class="text-center">Date</th>
                    <th class="text-center">Temperature</th>
                    <th class="text-center">Decibel</th>
                    <th class="text-center">Eggs Collected</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

@endsection
