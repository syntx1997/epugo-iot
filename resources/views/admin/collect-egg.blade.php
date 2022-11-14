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
                    <div class="table-responsive1">
                        <table id="egg-table" class="display" style="width: 100%">
                            <thead>
                            <tr>
                                <td class="text-center">ID#</td>
                                <td class="text-center">Date</td>
                                <td class="text-center">Total Collected</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
