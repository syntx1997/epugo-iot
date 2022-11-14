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
            <h5 class="card-title"> <i class="fa fa-cog"></i> {{ $title }}</h5>
        </div>
        <div class="card-body">
            <form id="settingsForm">
                @csrf
                <div class="form-group row mb-2">
                    <label class="col-3">Avatar</label>
                    <div class="col-9">
                        <input type="file" name="avatar" style="display: none">
                        <div class="avatar mb-2">
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="border-1" style="width: 150px" />
                        </div>
                        <button type="button" id="uploadPhotoBtn" class="btn btn-light">
                            <i class="fa fa-file-upload"></i> Upload Photo
                        </button>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-3">Name</label>
                    <div class="col-9">
                        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-3">Email</label>
                    <div class="col-9">
                        <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}">
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="avatarFile" value="{{ auth()->user()->avatar }}">
                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                    <button type="submit" class="btn btn-primary">Update Information</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title"> <i class="fa fa-user-lock"></i> Password</h5>
        </div>
        <div class="card-body">
            <form id="passwordForm">
                @csrf
                <div class="form-group row mb-2">
                    <label class="col-3">Current Password</label>
                    <div class="col-9">
                        <input type="password" name="currentPassword" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-3">New Password</label>
                    <div class="col-9">
                        <input type="password" name="newPassword" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-3">Re-Type Password</label>
                    <div class="col-9">
                        <input type="password" name="reTypePassword" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
            </form>
        </div>
    </div>

@endsection
