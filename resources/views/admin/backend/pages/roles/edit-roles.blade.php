<!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
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
                    <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card border-top border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                </div>
                <h5 class="mb-0 text-primary">Edit Role</h5>
            </div>
            <hr>
            <form id="myForm" class="row g-3" action="{{ route('update.roles', $role->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                    <label for="inputFirstName" class="form-label">Role Name</label>
                    <input type="text" class="form-control" id="inputFirstName" name="name" value="{{ $role->name }}">
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
            },
            messages :{
                name: {
                    required : 'Please Enter Role Name',
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
@endsection
