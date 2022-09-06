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
                    <div class="table-responsive">
                        <table id="egg-table" class="display" style="width: 100%">
                            <thead>
                            <tr>
                                <td class="text-center">ID#</td>
                                <td class="text-center">Room No.</td>
                                <td class="text-center">Total Eggs</td>
                                <td class="text-center">Action</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="set-total-egg-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form id="set-total-egg-form" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-edit"></i> Set Total Egg
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Room No.</label>
                        <input type="text" name="room_no" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Current Total</label>
                        <input type="text" name="current_total" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>New Eggs</label>
                        <input type="text" name="total" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Set</button>
                </div>
            </form>
        </div>
    </div>

@endsection
