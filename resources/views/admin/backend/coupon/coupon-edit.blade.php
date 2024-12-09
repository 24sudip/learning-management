<!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->
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
                    <li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card border-top border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                </div>
                <h5 class="mb-0 text-primary">Edit Coupon</h5>
            </div>
            <hr>
            <form id="myForm" class="row g-3" action="{{ route('admin.update.coupon', $coupon->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Coupon Name</label>
                    <input type="text" class="form-control" id="input1" name="coupon_name" value="{{ $coupon->coupon_name }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input2" class="form-label">Coupon Discount</label>
                    <input class="form-control" id="input2" type="number" step="0.01" name="coupon_discount" value="{{ $coupon->coupon_discount }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input2" class="form-label">Coupon Validity Date</label>
                    <input class="form-control" id="input2" type="date" name="coupon_validity" min="{{ Carbon\Carbon::now()
                    ->format('Y-m-d') }}" value="{{ $coupon->coupon_validity }}">
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
                coupon_name: {
                    required : true,
                },
                coupon_discount: {
                    required : true,
                },
                // field_name: {
                //     required : true,
                // },
            },
            messages :{
                coupon_name: {
                    required : 'Please Enter Coupon Name',
                },
                coupon_discount: {
                    required : 'Please Select Coupon Discount',
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
