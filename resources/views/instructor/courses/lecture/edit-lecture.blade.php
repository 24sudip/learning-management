<!-- The only way to do great work is to love what you do. - Steve Jobs -->
@extends('instructor.instructor-dashboard')

@section('instructor_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Lecture</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.course.lecture', ['id' => $course_lecture->course_id]) }}" class="btn btn-primary px-5">
                    Back
                </a>
            </div>
        </div>
    </div>
    <div class="card border-top border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                </div>
                <h5 class="mb-0 text-primary">Edit Lecture</h5>
            </div>
            <hr>
            <form id="myForm" class="row g-3" action="{{ route('update.lecture', $course_lecture->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Lecture Title</label>
                    <input type="text" class="form-control" id="input1" name="lecture_title" value="{{ $course_lecture->lecture_title }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input2" class="form-label">Video URL</label>
                    <input type="text" class="form-control" id="input2" name="url" value="{{ $course_lecture->url }}">
                </div>
                <div class="form-group col-md-12">
                    <label for="input3" class="form-label">Lecture Content</label>
                    <textarea class="form-control" id="input3" name="content">{{ $course_lecture->content }}</textarea>
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
                lecture_title: {
                    required : true,
                },
                url: {
                    required : true,
                },
                // field_name: {
                //     required : true,
                // },
            },
            messages :{
                lecture_title: {
                    required : 'Please Enter Lecture Title',
                },
                url: {
                    required : 'Please Enter Lecture url',
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
