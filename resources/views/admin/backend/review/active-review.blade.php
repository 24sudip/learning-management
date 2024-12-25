<!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
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
                    <li class="breadcrumb-item active" aria-current="page">All Active Review</li>
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
                            <th>Course Name</th>
                            <th>UserName</th>
                            <th>Comment</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $key => $review)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $review->course->course_name }}</td>
                            <td>{{ $review->user->name }}</td>
                            <td>{{ $review->comment }}</td>
                            <td>
                                @if ($review->rating == null)
                                <i class='bx bxs-star text-secondary'></i>
                                <i class='bx bxs-star text-secondary'></i>
                                <i class='bx bxs-star text-secondary'></i>
                                <i class='bx bxs-star text-secondary'></i>
                                <i class='bx bxs-star text-secondary'></i>
                                @elseif ($review->rating == 1)
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-secondary'></i>
                                <i class='bx bxs-star text-secondary'></i>
                                <i class='bx bxs-star text-secondary'></i>
                                <i class='bx bxs-star text-secondary'></i>
                                @elseif ($review->rating == 2)
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-secondary'></i>
                                <i class='bx bxs-star text-secondary'></i>
                                <i class='bx bxs-star text-secondary'></i>
                                @elseif ($review->rating == 3)
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-secondary'></i>
                                <i class='bx bxs-star text-secondary'></i>
                                @elseif ($review->rating == 4)
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-secondary'></i>
                                @elseif ($review->rating == 5)
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                <i class='bx bxs-star text-warning'></i>
                                @endif
                            </td>
                            <td>
                                <div class="form-check-danger form-check form-switch">
									<input class="form-check-input status-toggle large-checkbox" type="checkbox" id="flexSwitchCheckCheckedDanger" data-review-id="{{ $review->id }}" {{ $review->status ? 'checked' : '' }}>
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
            var reviewId = $(this).data('review-id');
            var isChecked = $(this).is(':checked');
            // send ajax request to update status
            $.ajax({
                url: "{{ route('update.review.status') }}",
                method: "POST",
                data: {
                    review_id: reviewId,
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
