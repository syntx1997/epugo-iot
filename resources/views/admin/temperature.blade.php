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
                    <h5 class="card-title">{{ $title }}</h5>
                    <button type="button" id="refreshTableBtn" class="btn btn-primary">Refresh</button>
                </div>
                <div class="card-body">

                    <div class="table-responsive1">
                        <table id="temperature-table" class="display" style="width: 100%">
                            <thead>
                            <tr>
                                <td class="text-center">Date & Time</td>
                                <td class="text-center">Temperature</td>
                                <td class="text-center">Light Status</td>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
