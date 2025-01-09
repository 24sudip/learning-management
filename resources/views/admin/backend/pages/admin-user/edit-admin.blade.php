<!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Marie Curie -->
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
                    <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card border-top border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                </div>
                <h5 class="mb-0 text-primary">Edit Admin</h5>
            </div>
            <hr>
            <form id="myForm" class="row g-3" action="{{ route('update.admin', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                    <label for="inputFirstName" class="form-label">Admin User Name</label>
                    <input type="text" class="form-control" id="inputFirstName" name="username" value="{{ $user->username }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Admin Name</label>
                    <input type="text" class="form-control" id="input1" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Admin Email</label>
                    <input type="email" class="form-control" id="input1" name="email" value="{{ $user->email }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Admin Phone</label>
                    <input type="tel" class="form-control" id="input1" name="phone" value="{{ $user->phone }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Admin Address</label>
                    <input type="text" class="form-control" id="input1" name="address" value="{{ $user->address }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputFirstName" class="form-label">Role Name</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="roles">
                        <option disabled>Open this select menu</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $user->hasRole($role->name) ? 'selected' : '' }} >{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                },
                roles: {
                    required : true,
                },
                // field_name: {
                //     required : true,
                // },
            },
            messages :{
                name: {
                    required : 'Please Enter Name',
                },
                roles: {
                    required : 'Please Enter Role Name',
                },
                // field_name: {
                //     required : 'Please Enter FieldName',
                // },
            },
            errorElement : 'span',
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
@endsection
