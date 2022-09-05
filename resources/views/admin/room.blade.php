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
                    <button type="button" id="addRoomBtn" class="btn btn-primary float-right" data-bs-toggle="modal" data-bs-target="#add-room-modal"> <i class="fa fa-plus"></i> Add Room</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="room-table" class="display" style="width: 100%">
                            <thead>
                            <tr>
                                <td class="text-center">ID#</td>
                                <td class="text-center">Room No.</td>
                                <td class="text-center">Action</td>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="add-room-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form id="add-room-form" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-plus"></i> Add Room
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Room No.</label>
                        <input type="text" name="room_no" class="form-control" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>

    <div id="edit-room-modal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <form id="edit-room-form" class="modal-content">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-edit"></i> Edit Room
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Room No.</label>
                        <input type="text" name="room_no" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
