<!-- Life is available only in the present moment. - Thich Nhat Hanh -->
@extends('instructor.instructor-dashboard')

@section('instructor_content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Coupon</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('instructor.add.coupon') }}" class="btn btn-primary px-5">Add Coupon</a>
            </div>
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
                            <th>Coupon Name</th>
                            <th>Coupon Discount</th>
                            <th>Coupon Status</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $key => $coupon)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $coupon->coupon_name }}</td>
                            <td>{{ $coupon->coupon_discount }}%</td>
                            <td>
                                @if ($coupon->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d') )
                                <span class="badge bg-success">Valid</span>
                                @else
                                <span class="badge bg-danger">Invalid</span>
                                @endif
                            </td>
                            <td>{{ $coupon->course->course_name }}</td>
                            <td>
                                <a href="{{ route('instructor.edit.coupon', $coupon->id) }}" class="btn btn-info px-5">Edit</a>
                                <a href="{{ route('instructor.delete.coupon', $coupon->id) }}" class="btn btn-danger px-5" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
