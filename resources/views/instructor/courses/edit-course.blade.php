<!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
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
                    <li class="breadcrumb-item active" aria-current="page">Edit Course</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card border-top border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                </div>
                <h5 class="mb-0 text-primary">Edit Course</h5>
            </div>
            <hr>
            <form id="myForm" class="row g-3" action="{{ route('update.course', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                    <label for="inputFirstName" class="form-label">Course Name</label>
                    <input type="text" class="form-control" id="inputFirstName" name="course_name" value="{{ $course->course_name }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputFirstName" class="form-label">Course Title</label>
                    <input type="text" class="form-control" id="inputFirstName" name="course_title" value="{{ $course->course_title }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputFirstName" class="form-label">Certificate Available</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="certificate">
                        <option>Open this select menu</option>
                        <option value="Yes" {{ $course->certificate == 'Yes' ? 'selected' : '' }} >Yes</option>
                        <option value="No" {{ $course->certificate == 'No' ? 'selected' : '' }} >No</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputFirstName" class="form-label">Course Level</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="label">
                        <option>Open this select menu</option>
                        <option value="Beginner" {{ $course->label == 'Beginner' ? 'selected' : '' }} >Beginner</option>
                        <option value="Middle" {{ $course->label == 'Middle' ? 'selected' : '' }} >Middle</option>
                        <option value="Advance" {{ $course->label == 'Advance' ? 'selected' : '' }} >Advance</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputFirstName" class="form-label">Course Category</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="category_id">
                        <option>Open this select menu</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $course->category_id ? 'selected' : '' }} >{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputFirstName" class="form-label">Course SubCategory</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="sub_category_id">
                        <option>Open this select menu</option>
                        @foreach ($sub_categories as $sub_category)
                        <option value="{{ $sub_category->id }}" {{ $sub_category->id == $course->sub_category_id ? 'selected' : '' }} >{{ $sub_category->sub_category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputFirstName" class="form-label">Course Price</label>
                    <input type="number" class="form-control" id="inputFirstName" name="selling_price" value="{{ $course->selling_price }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputFirstName" class="form-label">Discount Price</label>
                    <input type="number" class="form-control" id="inputFirstName" name="discount_price" value="{{ $course->discount_price }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputFirstName" class="form-label">Duration</label>
                    <input type="text" class="form-control" id="inputFirstName" name="duration" value="{{ $course->duration }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputFirstName" class="form-label">Resources</label>
                    <input type="text" class="form-control" id="inputFirstName" name="resources" value="{{ $course->resources }}">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputFirstName" class="form-label">Course Prerequisite</label>
                    <textarea name="prerequisites" class="form-control" id="inputAddress" placeholder="Prerequisites..." rows="3">{{ $course->prerequisites }}</textarea>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputFirstName" class="form-label">Course Description</label>
                    <textarea name="description" class="form-control" id="myeditorinstance">{!! $course->description !!}</textarea>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="best_seller"
                            {{ $course->best_seller == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckDefault">BestSeller</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="featured"
                            {{ $course->featured == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckDefault">Featured</label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="highest_rated"
                            {{ $course->highest_rated == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexCheckDefault">Highest Rated</label>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Main Course Image Update --}}
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('update.course.image', $course->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="image" class="form-label">Course Image</label>
                        <input class="form-control" type="file" id="image" name="course_image">
                    </div>
                    <div class="col-md-6">
                        <img src="{{ asset($course->course_image) }}" alt="Admin" class="p-1 mt-2 bg-primary" width="80" id="showImage">
                    </div>
                </div>
                <br>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Main Course Video Update --}}
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('update.course.video', $course->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputFirstName" class="form-label">Course Intro Video</label>
                        <input type="file" class="form-control" accept="video/mp4, video/webm" name="video">
                    </div>
                    <div class="col-md-6">
                        <video width="300" height="130" controls>
                            <source src="{{ asset($course->video) }}" type="video/mp4">
                        </video>
                    </div>
                </div>
                <br>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- Goals --}}
<div class="page-content">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('update.course.goal', $course->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @foreach ($goals as $item)
                <div class="row add_item">
                    <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                        <div class="container mt-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="goals" class="form-label">Goals</label>
                                        <input type="text" name="course_goals[]" id="goals" class="form-control" value="{{ $item->goal_name }}">
                                    </div>
                                </div>
                                <div class="form-group col-md-6" style="padding-top: 30px;">
                                    <a class="btn btn-success addeventmore"> <i class="fa fa-plus-circle"></i> Add More.. </a>
                                    <span class="btn btn-danger btn-sm removeeventmore">
                                        <i class="fa fa-minus-circle"></i>Remove
                                    </span>
                                </div>
                            </div>
                        </div>
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
{{-- Start add multiple class with ajax --}}
<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="whole_extra_item_delete" id="whole_extra_item_delete">
            <div class="container mt-2">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="goals" class="form-label">Goals</label>
                        <input type="text" name="course_goals[]" id="goals" class="form-control" placeholder="Goals">
                    </div>
                    <div class="form-group col-md-6" style="padding-top: 20px;">
                        <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle"></i>Add</span>
                        <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle"></i>Remove</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- For Section --}}
<script type="text/javascript">
    $(document).ready(function () {
        var counter = 0;
        $(document).on('click',".addeventmore", function () {
            var whole_extra_item_add = $('#whole_extra_item_add').html();
            $(this).closest('.add_item').append(whole_extra_item_add);
            counter++;
        });
        $(document).on('click',".removeeventmore", function (event) {
            $(this).closest('#whole_extra_item_delete').remove();
            counter -= 1;
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="category_id"]').on('change', function () {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ url('/subcategory/ajax') }}/"+category_id,
                    type: "GET",
                    // data: "data",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="sub_category_id"]').html('');
                        var d = $('select[name="sub_category_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="sub_category_id"]').append('<option value="'+value.id+ '">' + value.sub_category_name+ '</option>');
                        });
                    }
                });
            } else {
                alert('danger');
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                course_name: {
                    required : true,
                },
                course_title: {
                    required : true,
                },
                // field_name: {
                //     required : true,
                // },
            },
            messages :{
                course_name: {
                    required : 'Please Enter Course Name',
                },
                course_title: {
                    required : 'Please Enter Course Title',
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
<script type="text/javascript">
    $(document).ready(function () {
        $("#image").change(function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#showImage").attr("src", e.target.result);
            };
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
