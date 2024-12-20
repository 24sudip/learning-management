<!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
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
                    <li class="breadcrumb-item active" aria-current="page">Report</li>
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
            <div class="row">
                <div class="col-md-4">
                    <form id="myForm" class="row g-3" action="{{ route('search.by.date') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="input1" class="form-label">Search By Date</label>
                            <input type="date" class="form-control" id="input1" name="date">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-5">Save</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <form id="myForm" class="row g-3" action="{{ route('search.by.month') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="input1" class="form-label">Search By Month</label>
                            <select name="month" class="form-select mb-3" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="input1" class="form-label">Search By Year</label>
                            <select name="year_name" class="form-select mb-3" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-5">Save</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <form id="myForm" class="row g-3" action="{{ route('search.by.year') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-12">
                            <label for="input1" class="form-label">Search By Year</label>
                            <select name="year" class="form-select mb-3" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary px-5">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                date: {
                    required : true,
                },
                month: {
                    required : true,
                },
                // field_name: {
                //     required : true,
                // },
            },
            messages :{
                date: {
                    required : 'Please Enter Date',
                },
                month: {
                    required : 'Please Select Month',
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
