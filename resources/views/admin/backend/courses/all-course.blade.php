<!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
@extends('admin.admin-dashboard')

@section('admin_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
    .large-checkbox {
        transform: scale(1.5);
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
                    <li class="breadcrumb-item active" aria-current="page">All Courses</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Course Name</th>
                            <th>Instructor</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Action</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $key => $course)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ asset($course->course_image) }}" width="70">
                            </td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->user->name }}</td>
                            <td>{{ $course->category->category_name }}</td>
                            <td>{{ $course->selling_price }}</td>
                            <td>
                                <a href="" class="btn btn-info"><i class="lni lni-eye"></i></a>
                            </td>
                            <td>
                                <div class="form-check-danger form-check form-switch">
									<input class="form-check-input status-toggle large-checkbox" type="checkbox" id="flexSwitchCheckCheckedDanger" data-course-id="{{ $course->id }}" {{ $course->status ? 'checked' : '' }}>
									<label class="form-check-label" for="flexSwitchCheckCheckedDanger">
                                        click
                                    </label>
								</div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.status-toggle').on('change', function () {
            var courseId = $(this).data('course-id');
            var isChecked = $(this).is(':checked');
            // send ajax request to update status
            $.ajax({
                url: "{{ route('update.course.status') }}",
                method: "POST",
                data: {
                    course_id: courseId,
                    is_checked: isChecked ? 1 : 0,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    toastr.success(response.message);
                },
                error: function () {

                }
            });
        });
    });
</script>
@endsection
