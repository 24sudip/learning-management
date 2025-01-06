<!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
@extends('admin.admin-dashboard')

@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add Role In Permission</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card border-top border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div>
                    <i class="bx bxs-user me-1 font-22 text-primary"></i>
                </div>
            </div>
            <hr>
            <form id="myForm" class="row g-3" action="{{ route('role.permission.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                    <label for="inputFirstName" class="form-label">Roles Name</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="role_id">
                        <option selected disabled>Open Roles</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckMain">
                    <label class="form-check-label" for="flexCheckMain">Permission All</label>
                </div>
                <hr>
                @foreach ($permission_groups as $group)
                <div class="row">
                    <div class="col-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">{{ $group->group_name }}</label>
                        </div>
                    </div>
                    <div class="col-9">
                        @php
                            $permissions = App\Models\User::getPermissionByGroupName($group->group_name);
                        @endphp

                        @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}" id="checkDefault{{ $permission->id }}">
                            <label class="form-check-label" for="checkDefault{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                        @endforeach
                        <br>
                    </div>
                </div>
                @endforeach
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
                role_id: {
                    required : true,
                },
            },
            messages :{
                role_id: {
                    required : 'Please Enter Role Id',
                },
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
<script>
    $('#flexCheckMain').click(function () {
        if ($(this).is(':checked')) {
            $('input[type="checkbox"]').prop('checked', true);
        } else {
            $('input[type="checkbox"]').prop('checked', false);
        }
    });
</script>
@endsection
