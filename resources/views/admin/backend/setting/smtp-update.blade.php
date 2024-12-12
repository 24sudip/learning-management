<!-- It is quality rather than quantity that matters. - Lucius Annaeus Seneca -->
@extends('admin.admin-dashboard')

@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Smtp Setting</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card border-top border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                </div>
                <h5 class="mb-0 text-primary">Smtp Setting</h5>
            </div>
            <hr>
            <form id="myForm" class="row g-3" action="{{ route('update.smtp', $smtp_setting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                    <label for="input" class="form-label">Mailer</label>
                    <input type="text" class="form-control" id="input" name="mailer" value="{{ $smtp_setting->mailer }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Host</label>
                    <input type="text" class="form-control" id="input1" name="host" value="{{ $smtp_setting->host }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Port</label>
                    <input type="text" class="form-control" id="input1" name="port" value="{{ $smtp_setting->port }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="input1" name="username" value="{{ $smtp_setting->username }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Password</label>
                    <input type="text" class="form-control" id="input1" name="password" value="{{ $smtp_setting->password }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Encryption</label>
                    <input type="text" class="form-control" id="input1" name="encryption" value="{{ $smtp_setting->encryption }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">From Address</label>
                    <input type="text" class="form-control" id="input1" name="from_address" value="{{ $smtp_setting->from_address }}">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
