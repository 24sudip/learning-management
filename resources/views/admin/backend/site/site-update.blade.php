<!-- Life is available only in the present moment. - Thich Nhat Hanh -->
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
                    <li class="breadcrumb-item active" aria-current="page">Site Setting</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="card border-top border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                </div>
                <h5 class="mb-0 text-primary">Site Setting</h5>
            </div>
            <hr>
            <form id="myForm" class="row g-3" action="{{ route('update.site', $site_setting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-6">
                    <label for="input" class="form-label">Phone</label>
                    <input type="tel" class="form-control" id="input" name="phone" value="{{ $site_setting->phone }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="input1" name="email" value="{{ $site_setting->email }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Address</label>
                    <input type="text" class="form-control" id="input1" name="address" value="{{ $site_setting->address }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Facebook</label>
                    <input type="text" class="form-control" id="input1" name="facebook" value="{{ $site_setting->facebook }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Twitter</label>
                    <input type="text" class="form-control" id="input1" name="twitter" value="{{ $site_setting->twitter }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="input1" class="form-label">Copyright</label>
                    <input type="text" class="form-control" id="input1" name="copyright" value="{{ $site_setting->copyright }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="image" class="form-label">Site Logo</label>
                    <input class="form-control" type="file" id="image" name="logo">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset($site_setting->logo) }}" alt="Admin" class="p-1 bg-primary" width="80" id="showImage">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary px-5">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
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
