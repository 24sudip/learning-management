<!-- I have not failed. I've just found 10,000 ways that won't work. - Thomas Edison -->
@extends('frontend.dashboard.user-dashboard')

@section('user_content')
<div class="container-fluid">
    <div class="section-block mb-5"></div>
    <div class="dashboard-heading mb-5">
        <h3 class="fs-22 font-weight-semi-bold">My Courses</h3>
    </div>
    <div class="dashboard-cards mb-5">
        @foreach ($orders as $order)
        <div class="card card-item card-item-list-layout">
            <div class="card-image">
                <a href="{{ route('course.view', $order->course_id) }}" class="d-block">
                    <img
                    class="card-img-top"
                    src="{{ asset($order->course->course_image) }}"
                    alt="Card image cap"
                    />
                </a>
            </div>
            <!-- end card-image -->
            <div class="card-body">
                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">{{ $order->course->label }}</h6>
                <h5 class="card-title">
                    <a href="{{ route('course.view', $order->course_id) }}">
                        {{ $order->course->course_name }}
                    </a>
                </h5>
                <p class="card-text">
                    <a href="teacher-detail.html">{{ $order->course->user->name }}</a>
                </p>
                <div class="rating-wrap d-flex align-items-center py-2">
                    <div class="review-stars">
                        <span class="rating-number">4.4</span>
                        <span class="la la-star"></span>
                        <span class="la la-star"></span>
                        <span class="la la-star"></span>
                        <span class="la la-star"></span>
                        <span class="la la-star-o"></span>
                    </div>
                    <span class="rating-total ps-1">(20,230)</span>
                </div>
                <!-- end rating-wrap -->
                <ul class="card-duration d-flex align-items-center fs-15 pb-2">
                    <li class="me-2">
                        <span class="text-black">Status:</span>
                        <span class="badge text-bg-success text-white">
                            Published
                        </span>
                    </li>
                    <li class="me-2">
                        <span class="text-black">Duration:</span>
                        <span>{{ $order->course->duration }} hours</span>
                    </li>
                    <li class="me-2">
                        <span class="text-black">Students:</span>
                        <span>30,405</span>
                    </li>
                </ul>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="card-price text-black font-weight-bold">${{ $order->course->selling_price }}</p>
                    <div class="card-action-wrap ps-3">
                    <a
                        href="course-details.html"
                        class="icon-element icon-element-sm shadow-sm cursor-pointer ms-1 text-success"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        data-bs-title="View"
                        ><i class="la la-eye"></i
                    ></a>
                    <div
                        class="icon-element icon-element-sm shadow-sm cursor-pointer ms-1 text-secondary"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        data-bs-title="Edit"
                    >
                        <i class="la la-edit"></i>
                    </div>
                    <div
                        class="icon-element icon-element-sm shadow-sm cursor-pointer ms-1 text-danger"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        data-bs-title="Delete"
                    >
                        <span
                        data-bs-toggle="modal"
                        data-bs-target="#itemDeleteModal"
                        class="w-100 h-100 d-inline-block"
                        ><i class="la la-trash"></i
                        ></span>
                    </div>
                    </div>
                </div>
            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->
        @endforeach
    </div>
    <!-- end col-lg-12 -->
</div>
<!-- end container-fluid -->
@endsection
