<!-- Simplicity is the consequence of refined emotions. - Jean D'Alembert -->
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
                    <li class="breadcrumb-item active" aria-current="page">Add Blog Post</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card border-top border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                </div>
                <h5 class="mb-0 text-primary">Add Blog Post</h5>
            </div>
            <hr>
            <form id="myForm" class="row g-3" action="{{ route('store.category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                    <label for="input2" class="form-label">Blog Category</label>
                    <select name="blog_category_id" class="form-select mb-3" aria-label="Default select example">
                        <option selected>Open this select menu</option>
                        @foreach ($blog_categories as $blog_category)
                        <option value="{{ $blog_category->id }}">{{ $blog_category->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Post Title</label>
                    <input type="text" class="form-control" id="input1" name="post_title">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputFirstName" class="form-label">Post Description</label>
                    <textarea name="long_description" class="form-control" id="myeditorinstance"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="image" class="form-label">Post Image</label>
                    <input class="form-control" type="file" id="image" name="post_image">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('backend/assets/images/gallery/04.png') }}" alt="Admin" class="p-1 bg-primary" width="80" id="showImage">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Post Tags</label>
                    <input type="text" name="post_tags" class="form-control" data-role="tagsinput" value="jQuery">
                </div>
                <div class="col-md-6"></div>
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
                post_title: {
                    required : true,
                },
                post_image: {
                    required : true,
                },
                // field_name: {
                //     required : true,
                // },
            },
            messages :{
                post_title: {
                    required : 'Please Enter Post Title',
                },
                post_image: {
                    required : 'Please Select Post Image',
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
