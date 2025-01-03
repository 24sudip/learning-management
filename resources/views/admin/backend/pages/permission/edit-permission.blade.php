<!-- Knowing is not enough; we must apply. Being willing is not enough; we must do. - Leonardo da Vinci -->
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
                    <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card border-top border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                </div>
                <h5 class="mb-0 text-primary">Edit Permission</h5>
            </div>
            <hr>
            <form id="myForm" class="row g-3" action="{{ route('update.permission', $permission->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                    <label for="inputFirstName" class="form-label">Permission Name</label>
                    <input type="text" class="form-control" id="inputFirstName" name="name" value="{{ $permission->name }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputFirstName" class="form-label">Group Name</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="group_name">
                        <option selected disabled>Open this select menu</option>
                        <option value="Category" {{ $permission->group_name == 'Category' ? 'selected' : '' }}>Category</option>
                        <option value="Instructor" {{ $permission->group_name == 'Instructor' ? 'selected' : '' }}>Instructor</option>
                        <option value="Coupon" {{ $permission->group_name == 'Coupon' ? 'selected' : '' }}>Coupon</option>
                        <option value="Setting" {{ $permission->group_name == 'Setting' ? 'selected' : '' }}>Setting</option>
                        <option value="Order" {{ $permission->group_name == 'Order' ? 'selected' : '' }}>Order</option>
                        <option value="Report" {{ $permission->group_name == 'Report' ? 'selected' : '' }}>Report</option>
                        <option value="Review" {{ $permission->group_name == 'Review' ? 'selected' : '' }}>Review</option>
                        <option value="All User" {{ $permission->group_name == 'All User' ? 'selected' : '' }}>All User</option>
                        <option value="Blog" {{ $permission->group_name == 'Blog' ? 'selected' : '' }}>Blog</option>
                        <option value="Role and Permission" {{ $permission->group_name == 'Role and Permission' ? 'selected' : '' }}>Role and Permission</option>
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
                group_name: {
                    required : true,
                },
                // field_name: {
                //     required : true,
                // },
            },
            messages :{
                name: {
                    required : 'Please Enter Permission Name',
                },
                group_name: {
                    required : 'Please Enter Group Name',
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
