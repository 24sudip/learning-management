<!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->
@extends('frontend.master')

@section('home_content')
    @section('title')
    {{ $course->course_name }} | Easy Learning
    @endsection
    <!-- ================================
    START BREADCRUMB AREA
================================= -->
    <section class="breadcrumb-area pt-50px pb-50px bg-white pattern-bg">
        <div class="container">
            <div class="col-lg-8 me-auto">
                <div class="breadcrumb-content">
                    <ul class="generic-list-item generic-list-item-arrow d-flex flex-wrap align-items-center">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">{{ $course->category->category_name }}</a></li>
                        <li><a href="#">{{ $course->sub_category->sub_category_name }}</a></li>
                    </ul>
                    <div class="section-heading">
                        <h2 class="section__title">
                            {{ $course->course_name }}
                        </h2>
                        <p class="section__desc pt-2 lh-30">
                            {{ $course->course_title }}
                        </p>
                    </div>
                    <!-- end section-heading -->
                    <div class="d-flex flex-wrap align-items-center pt-3">
                        @if ($course->best_seller == 1)
                        <h6 class="ribbon ribbon-lg me-2 bg-3 text-white">Bestseller</h6>
                        @endif
                        <div class="rating-wrap d-flex flex-wrap align-items-center">
                            @php
                                $review_count = App\Models\Review::where('course_id', $course->id)->where('status', 1)->latest()
                                ->get();
                                $average = App\Models\Review::where('course_id', $course->id)->where('status', 1)->avg('rating');
                            @endphp
                            <div class="review-stars">
                                <span class="rating-number">{{ round($average, 1) }}</span>
                                @if ($average == 0)
                                <span class="la la-star-o"></span>
                                <span class="la la-star-o"></span>
                                <span class="la la-star-o"></span>
                                <span class="la la-star-o"></span>
                                <span class="la la-star-o"></span>
                                @elseif ($average == 1 || $average < 2)
                                <span class="la la-star"></span>
                                <span class="la la-star-o"></span>
                                <span class="la la-star-o"></span>
                                <span class="la la-star-o"></span>
                                <span class="la la-star-o"></span>
                                @elseif ($average == 2 || $average < 3)
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star-o"></span>
                                <span class="la la-star-o"></span>
                                <span class="la la-star-o"></span>
                                @elseif ($average == 3 || $average < 4)
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star-o"></span>
                                <span class="la la-star-o"></span>
                                @elseif ($average == 4 || $average < 5)
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star-o"></span>
                                @elseif ($average == 5 || $average < 5)
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                <span class="la la-star"></span>
                                @endif
                            </div>
                            <span class="rating-total ps-1">({{ count($review_count) }} ratings)</span>
                            @php
                                $enrollment_count = App\Models\Order::where('course_id', $course->id)->count();
                            @endphp
                            <span class="student-total ps-2">{{ number_format($enrollment_count) }} students</span>
                        </div>
                    </div>
                    <!-- end d-flex -->
                    <p class="pt-2 pb-1">
                        Created by
                        <a href="teacher-detail.html" class="text-color hover-underline">
                            {{ $course->user->name }}
                        </a>
                    </p>
                    <div class="d-flex flex-wrap align-items-center">
                        <p class="pe-3 d-flex align-items-center">
                            <svg
                            class="svg-icon-color-gray me-1"
                            width="16px"
                            viewBox="0 0 24 24"
                            >
                            <path
                                d="M23 12l-2.44-2.78.34-3.68-3.61-.82-1.89-3.18L12 3 8.6 1.54 6.71 4.72l-3.61.81.34 3.68L1 12l2.44 2.78-.34 3.69 3.61.82 1.89 3.18L12 21l3.4 1.46 1.89-3.18 3.61-.82-.34-3.68L23 12zm-10 5h-2v-2h2v2zm0-4h-2V7h2v6z"
                            ></path>
                            </svg>
                            Last updated {{ $course->created_at->format('M d Y') }}
                        </p>
                        <p class="pe-3 d-flex align-items-center">
                            <svg
                            class="svg-icon-color-gray me-1"
                            width="16px"
                            viewBox="0 0 24 24"
                            >
                            <path
                                d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zm6.93 6h-2.95a15.65 15.65 0 00-1.38-3.56A8.03 8.03 0 0118.92 8zM12 4.04c.83 1.2 1.48 2.53 1.91 3.96h-3.82c.43-1.43 1.08-2.76 1.91-3.96zM4.26 14C4.1 13.36 4 12.69 4 12s.1-1.36.26-2h3.38c-.08.66-.14 1.32-.14 2s.06 1.34.14 2H4.26zm.82 2h2.95c.32 1.25.78 2.45 1.38 3.56A7.987 7.987 0 015.08 16zm2.95-8H5.08a7.987 7.987 0 014.33-3.56A15.65 15.65 0 008.03 8zM12 19.96c-.83-1.2-1.48-2.53-1.91-3.96h3.82c-.43 1.43-1.08 2.76-1.91 3.96zM14.34 14H9.66c-.09-.66-.16-1.32-.16-2s.07-1.35.16-2h4.68c.09.65.16 1.32.16 2s-.07 1.34-.16 2zm.25 5.56c.6-1.11 1.06-2.31 1.38-3.56h2.95a8.03 8.03 0 01-4.33 3.56zM16.36 14c.08-.66.14-1.32.14-2s-.06-1.34-.14-2h3.38c.16.64.26 1.31.26 2s-.1 1.36-.26 2h-3.38z"
                            ></path>
                            </svg>
                            English
                        </p>
                    </div>
                    <!-- end d-flex -->
                    <div class="bread-btn-box pt-3">
                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 me-2 mb-2">
                            <i class="la la-heart-o me-1"></i>
                            <span
                            class="swapping-btn"
                            data-text-swap="Wishlisted"
                            data-text-original="Wishlist"
                            >Wishlist</span
                            >
                        </button>
                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 me-2 mb-2" data-bs-toggle="modal"
                            data-bs-target="#shareModal">
                            <i class="la la-share me-1"></i>Share
                        </button>
                        <button class="btn theme-btn theme-btn-sm theme-btn-transparent lh-28 mb-2" data-bs-toggle="modal"
                            data-bs-target="#reportModal">
                            <i class="la la-flag me-1"></i>Report abuse
                        </button>
                    </div>
                </div>
                <!-- end breadcrumb-content -->
            </div>
            <!-- end col-lg-8 -->
        </div>
        <!-- end container -->
    </section>
    <!-- end breadcrumb-area -->
    <!-- ================================
    END BREADCRUMB AREA
================================= -->

    <!--======================================
        START COURSE DETAILS AREA
======================================-->
    <section class="course-details-area pb-20px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 pb-5">
                    <div class="course-details-content-wrap pt-90px">
                        <div class="course-overview-card bg-gray p-4 rounded">
                            <h3 class="fs-24 font-weight-semi-bold pb-3">
                            What you'll learn?
                            </h3>
                            <ul class="generic-list-item overview-list-item">
                                @foreach ($course_goals as $course_goal)
                                <li>
                                <i class="la la-check me-1 text-black"></i> {{ $course_goal->goal_name }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- end course-overview-card -->
                        <div class="course-overview-card bg-gray p-4 rounded">
                            <h3 class="fs-16 font-weight-semi-bold">
                            Curated for the
                            <a href="for-business.html" class="text-color hover-underline"
                                >Aduca for Business</a
                            >
                            collection
                            </h3>
                        </div>
                        <!-- end course-overview-card -->
                        <div class="course-overview-card">
                            <h3 class="fs-24 font-weight-semi-bold pb-3">Requirements</h3>
                            <ul class="generic-list-item generic-list-item-bullet fs-15">
                            <li>
                                {{ $course->prerequisites }}
                            </li>
                        </div>
                        <!-- end course-overview-card -->
                        <div class="course-overview-card border border-gray p-4 rounded">
                            <h3 class="fs-20 font-weight-semi-bold">
                            Top companies trust Aduca
                            </h3>
                            <p class="fs-15 pb-1">
                            Get your team access to Aduca's top 5,000+ courses
                            </p>
                            <div class="pb-3">
                            <img
                                width="85"
                                class="me-3"
                                src="{{ asset('frontend/images') }}/sponsor-img.png"
                                alt="company logo"
                            />
                            <img
                                width="80"
                                class="me-3"
                                src="{{ asset('frontend/images') }}/sponsor-img2.png"
                                alt="company logo"
                            />
                            <img
                                width="80"
                                class="me-3"
                                src="{{ asset('frontend/images') }}/sponsor-img3.png"
                                alt="company logo"
                            />
                            <img
                                width="70"
                                class="me-3"
                                src="{{ asset('frontend/images') }}/sponsor-img4.png"
                                alt="company logo"
                            />
                            </div>
                            <a href="for-business.html" class="btn theme-btn theme-btn-sm"
                            >Try Aduca for Business</a
                            >
                        </div>
                        <!-- end course-overview-card -->
                        <div class="course-overview-card">
                            <h3 class="fs-24 font-weight-semi-bold pb-3">Description</h3>
                            <p class="fs-15 pb-2">
                                {!! $course->description !!}
                            </p>
                            <div class="collapse" id="collapseMore">
                                <h4 class="fs-20 font-weight-semi-bold py-2">
                                Who this course is for:
                                </h4>
                                <p class="fs-15 pb-2">{{ $course->prerequisites }}</p>
                            </div>
                            <a
                            class="collapse-btn collapse--btn fs-15"
                            data-bs-toggle="collapse"
                            href="#collapseMore"
                            role="button"
                            aria-expanded="false"
                            aria-controls="collapseMore"
                            >
                            <span class="collapse-btn-hide"
                                >Show more<i class="la la-angle-down ms-1 fs-14"></i
                            ></span>
                            <span class="collapse-btn-show"
                                >Show less<i class="la la-angle-up ms-1 fs-14"></i
                            ></span>
                            </a>
                        </div>
                        <!-- end course-overview-card -->
                        @php
                            $course_lectures = App\Models\CourseLecture::where('course_id', $course->id)->get();
                        @endphp
                        <div class="course-overview-card">
                            <div class="curriculum-header d-flex align-items-center justify-content-between pb-4">
                                <h3 class="fs-24 font-weight-semi-bold">Course content</h3>
                                <div class="curriculum-duration fs-15">
                                    <span class="curriculum-total__text me-2">
                                        <strong class="text-black font-weight-semi-bold">Total:</strong>
                                        {{ count($course_lectures) }} lectures
                                    </span>
                                    <span class="curriculum-total__hours">
                                        <strong class="text-black font-weight-semi-bold">Total hours:</strong>
                                        {{ $course->duration }}
                                    </span>
                                </div>
                            </div>
                            @php
                                $course_sections = App\Models\CourseSection::where('course_id', $course->id)
                                ->orderBy('id','asc')->get();
                            @endphp
                            <div class="curriculum-content">
                                <div id="accordion" class="generic-accordion">
                                    @foreach ($course_sections as $course_section)
                                    <div class="card">
                                        @php
                                            $course_lectures = App\Models\CourseLecture::where('section_id',
                                            $course_section->id)->get();
                                        @endphp
                                        <div class="card-header" id="heading{{ $course_section->id }}">
                                            <button class="btn btn-link d-flex align-items-center justify-content-between"
                                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $course_section->id }}"
                                                aria-expanded="true" aria-controls="collapse{{ $course_section->id }}">
                                                <i class="la la-plus"></i>
                                                <i class="la la-minus"></i>
                                                {{ $course_section->section_title }}
                                                <span class="fs-15 text-gray font-weight-medium">
                                                    {{ count($course_lectures) }} lectures
                                                </span>
                                            </button>
                                        </div>
                                        <!-- end card-header -->
                                        <div id="collapse{{ $course_section->id }}" class="collapse"
                                            aria-labelledby="heading{{ $course_section->id }}" data-bs-parent="#accordion">
                                            <div class="card-body">
                                                <ul class="generic-list-item">
                                                    @foreach ($course_lectures as $course_lecture)
                                                    <li>
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <span>
                                                                <i class="la la-play-circle me-1"></i>
                                                                {{ $course_lecture->lecture_title }}
                                                            </span>
                                                            <span>03:09</span>
                                                        </div>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <!-- end card-body -->
                                        </div>
                                        <!-- end collapse -->
                                    </div>
                                    <!-- end card -->
                                    @endforeach
                                </div>
                                <!-- end generic-accordion -->
                            </div>
                            <!-- end curriculum-content -->
                        </div>
                        <!-- end course-overview-card -->
                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-4">
                            Students also bought
                            </h3>
                            <div class="view-more-carousel owl-action-styled">
                                <div class="card card-item card-item-list-layout border border-gray shadow-none">
                                    <div class="card-image">
                                        <a href="course-details.html" class="d-block">
                                            <img
                                            class="card-img-top"
                                            src="{{ asset('frontend/images') }}/img8.jpg"
                                            alt="Card image cap"
                                            />
                                        </a>
                                        <div class="course-badge-labels">
                                            <div class="course-badge">Bestseller</div>
                                            <div class="course-badge blue">-39%</div>
                                        </div>
                                    </div>
                                    <!-- end card-image -->
                                    <div class="card-body">
                                    <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">
                                        All Levels
                                    </h6>
                                    <h5 class="card-title">
                                        <a href="course-details.html"
                                        >The Business Intelligence Analyst Course 2021</a
                                        >
                                    </h5>
                                    <p class="card-text">
                                        <a href="teacher-detail.html">Jose Portilla</a>
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
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <p class="card-price text-black font-weight-bold">
                                        12.99
                                        <span class="before-price font-weight-medium"
                                            >129.99</span
                                        >
                                        </p>
                                        <div
                                        class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                        title="Add to Wishlist"
                                        >
                                        <i class="la la-heart-o"></i>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            <div class="card card-item card-item-list-layout border border-gray shadow-none">
                                <div class="card-image">
                                <a href="course-details.html" class="d-block">
                                    <img
                                    class="card-img-top"
                                    src="{{ asset('frontend/images') }}/img9.jpg"
                                    alt="Card image cap"
                                    />
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge red">Featured</div>
                                </div>
                                </div>
                                <!-- end card-image -->
                                <div class="card-body">
                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">
                                    All Levels
                                </h6>
                                <h5 class="card-title">
                                    <a href="course-details.html"
                                    >The Business Intelligence Analyst Course 2021</a
                                    >
                                </h5>
                                <p class="card-text">
                                    <a href="teacher-detail.html">Jose Portilla</a>
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
                                <div
                                    class="d-flex justify-content-between align-items-center"
                                >
                                    <p class="card-price text-black font-weight-bold">
                                    129.99
                                    </p>
                                    <div
                                    class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                    title="Add to Wishlist"
                                    >
                                    <i class="la la-heart-o"></i>
                                    </div>
                                </div>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                            <div
                                class="card card-item card-item-list-layout border border-gray shadow-none"
                            >
                                <div class="card-image">
                                <a href="course-details.html" class="d-block">
                                    <img
                                    class="card-img-top"
                                    src="{{ asset('frontend/images') }}/img8.jpg"
                                    alt="Card image cap"
                                    />
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge">Bestseller</div>
                                    <div class="course-badge blue">-39%</div>
                                </div>
                                </div>
                                <!-- end card-image -->
                                <div class="card-body">
                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">
                                    All Levels
                                </h6>
                                <h5 class="card-title">
                                    <a href="course-details.html"
                                    >The Business Intelligence Analyst Course 2021</a
                                    >
                                </h5>
                                <p class="card-text">
                                    <a href="teacher-detail.html">Jose Portilla</a>
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
                                <div
                                    class="d-flex justify-content-between align-items-center"
                                >
                                    <p class="card-price text-black font-weight-bold">
                                    12.99
                                    <span class="before-price font-weight-medium"
                                        >129.99</span
                                    >
                                    </p>
                                    <div
                                    class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                    title="Add to Wishlist"
                                    >
                                    <i class="la la-heart-o"></i>
                                    </div>
                                </div>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                            <div
                                class="card card-item card-item-list-layout border border-gray shadow-none"
                            >
                                <div class="card-image">
                                <a href="course-details.html" class="d-block">
                                    <img
                                    class="card-img-top"
                                    src="{{ asset('frontend/images') }}/img9.jpg"
                                    alt="Card image cap"
                                    />
                                </a>
                                <div class="course-badge-labels">
                                    <div class="course-badge red">Featured</div>
                                </div>
                                </div>
                                <!-- end card-image -->
                                <div class="card-body">
                                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">
                                    All Levels
                                </h6>
                                <h5 class="card-title">
                                    <a href="course-details.html"
                                    >The Business Intelligence Analyst Course 2021</a
                                    >
                                </h5>
                                <p class="card-text">
                                    <a href="teacher-detail.html">Jose Portilla</a>
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
                                <div
                                    class="d-flex justify-content-between align-items-center"
                                >
                                    <p class="card-price text-black font-weight-bold">
                                    129.99
                                    </p>
                                    <div
                                    class="icon-element icon-element-sm shadow-sm cursor-pointer"
                                    title="Add to Wishlist"
                                    >
                                    <i class="la la-heart-o"></i>
                                    </div>
                                </div>
                                </div>
                                <!-- end card-body -->
                            </div>
                            <!-- end card -->
                            </div>
                            <!-- end view-more-carousel -->
                        </div>
                        <!-- end course-overview-card -->
                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-4">
                                About the instructor
                            </h3>
                            <div class="instructor-wrap">
                                <div class="media media-card">
                                    <div class="instructor-img">
                                        <a href="teacher-detail.html" class="media-img d-block">
                                            <img class="lazy"
                                            src="{{ (!empty($course->user->photo)) ? url('upload/instructor-images/'.$course->user->photo) : url('frontend/images/img-loading.png') }}"
                                            data-src="{{ (!empty($course->user->photo)) ? url('upload/instructor-images/'.$course->user->photo) : url('frontend/images/small-avatar-1.jpg') }}"
                                            alt="Avatar image"/>
                                        </a>
                                        <ul class="generic-list-item pt-3">
                                            <li>
                                                <i class="la la-star me-2 text-color-3"></i> 4.6
                                                Instructor Rating
                                            </li>
                                            <li>
                                                <i class="la la-user me-2 text-color-3"></i> 45,786
                                                Students
                                            </li>
                                            <li>
                                                <i class="la la-comment-o me-2 text-color-3"></i>
                                                2,533 Reviews
                                            </li>
                                            <li>
                                                <i class="la la-play-circle-o me-2 text-color-3"></i>
                                                {{ count($instructor_courses) }} Courses
                                            </li>
                                            <li>
                                                <a href="teacher-detail.html">View all Courses</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end instructor-img -->
                                    <div class="media-body">
                                        <h5><a href="teacher-detail.html">{{ $course->user->name }}</a></h5>
                                        <span class="d-block lh-18 pt-2 pb-3">
                                            Joined {{ Carbon\Carbon::parse($course->user->created_at)->diffForHumans() }}
                                        </span>
                                        <p class="text-black lh-18 pb-3">
                                            {{ $course->user->email }}
                                        </p>
                                        <p class="pb-3">
                                            Lorem Ipsum is simply dummy text of the printing and
                                            typesetting industry. Lorem Ipsum has been the
                                            industry’s standard dummy text ever since the 1500s,
                                            when an unknown printer took a galley of type and
                                            scrambled it to make a type specimen book. It has
                                            survived not only five centuries, but also the leap into
                                            electronic typesetting, remaining essentially unchanged.
                                        </p>
                                        <div class="collapse" id="collapseMoreTwo">
                                            <p class="pb-3">
                                            After learning the hard way, Tim was determined to
                                            become the best teacher he could, and to make his
                                            training as painless as possible, so that you, or
                                            anyone else with the desire to become a software
                                            developer, could become one.
                                            </p>
                                            <p class="pb-3">
                                            If you want to become a financial analyst, a finance
                                            manager, an FP&A analyst, an investment banker, a
                                            business executive, an entrepreneur, a business
                                            intelligence analyst, a data analyst, or a data
                                            scientist,
                                            <strong class="text-black font-weight-semi-bold"
                                                >Tim Buchalka's courses are the perfect course to
                                                start</strong
                                            >.
                                            </p>
                                        </div>
                                        <a class="collapse-btn collapse--btn fs-15" data-bs-toggle="collapse"
                                            href="#collapseMoreTwo" role="button" aria-expanded="false"
                                            aria-controls="collapseMoreTwo">
                                            <span class="collapse-btn-hide">
                                                Show more<i class="la la-angle-down ms-1 fs-14"></i>
                                            </span>
                                            <span class="collapse-btn-show">
                                                Show less<i class="la la-angle-up ms-1 fs-14"></i>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- end instructor-wrap -->
                        </div>
                        <!-- end course-overview-card -->
                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-40px">
                            Student feedback
                            </h3>
                            <div class="feedback-wrap">
                            <div class="media media-card align-items-center">
                                <div class="review-rating-summary">
                                    <span class="stats-average__count">{{ round($average, 1) }}</span>
                                    <div class="rating-wrap pt-1">
                                        <div class="review-stars">
                                            @if ($average == 0)
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            @elseif ($average == 1 || $average < 2)
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            @elseif ($average == 2 || $average < 3)
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            @elseif ($average == 3 || $average < 4)
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            @elseif ($average == 4 || $average < 5)
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o"></span>
                                            @elseif ($average == 5 || $average < 5)
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            @endif
                                        </div>
                                        <span class="rating-total d-block">({{ count($review_count) }})</span>
                                        <span>Course Rating</span>
                                    </div>
                                    <!-- end rating-wrap -->
                                </div>
                                <!-- end review-rating-summary -->
                                <div class="media-body">
                                    @php
                                        $reviewCount = App\Models\Review::where('course_id', $course->id)->where('status', 1)
                                        ->select('rating', DB::raw('count(*) as count'))->groupBy('rating')
                                        ->orderBy('rating','desc')->get();
                                        $total_reviews = $reviewCount->sum('count');
                                        $percentage = [];
                                        for ($i = 5; $i >= 1; $i--) {
                                            $ratingCount = $reviewCount->where('rating', $i)->first();
                                            $count = $ratingCount ? $ratingCount->count : 0;
                                            $percent = $total_reviews > 0 ? ($count / $total_reviews) * 100 : 0;
                                            $percentage[] = [
                                                'rating' => $i,
                                                'percent' => $percent,
                                                'count' => $count
                                            ];
                                        }
                                    @endphp

                                    @if (count($percentage) > 0)
                                        @foreach ($percentage as $ratingInfo)
                                        <div class="review-bars d-flex align-items-center mb-2">
                                            <div class="review-bars__text">{{ $ratingInfo['rating'] }} stars</div>
                                            <div class="review-bars__fill">
                                                <div class="skillbar-box">
                                                    <div class="skillbar" data-percent="{{ $ratingInfo['percent'] }}%">
                                                        <div class="skillbar-bar bg-3" style="width: {{ $ratingInfo['percent'] }}%;"></div>
                                                    </div>
                                                    <!-- End Skill Bar -->
                                                </div>
                                            </div>
                                            <!-- end review-bars__fill -->
                                            <div class="review-bars__percent">{{ number_format($ratingInfo['percent'], 2) }} %</div>
                                        </div>
                                        <!-- end review-bars -->
                                        @endforeach
                                    @else
                                    <p>No Reviews Available</p>
                                    @endif
                                </div>
                                <!-- end media-body -->
                            </div>
                            </div>
                            <!-- end feedback-wrap -->
                        </div>
                        <!-- end course-overview-card -->
                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-4">Reviews</h3>
                            @php
                                $reviews = App\Models\Review::where('course_id', $course->id)->where('status', 1)->latest()
                                ->limit(5)->get();
                            @endphp
                            <div class="review-wrap">
                                @foreach ($reviews as $review)
                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                                    <div class="media-img me-4 rounded-full">
                                    <img
                                        class="rounded-full lazy"
                                        src="{{ (!empty($review->user->photo)) ? url('upload/user-images/'.$review->user->photo) : url('frontend/images/small-avatar-1.jpg') }}"
                                        data-src="{{ (!empty($review->user->photo)) ? url('upload/user-images/'.$review->user->photo) : url('frontend/images/small-avatar-1.jpg') }}"
                                        alt="User image"
                                    />
                                    </div>
                                    <div class="media-body">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between pb-1">
                                        <h5>{{ $review->user->name }}</h5>
                                        <div class="review-stars">
                                            @if ($review->rating == NULL)
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            @elseif ($review->rating == 1)
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            @elseif ($review->rating == 2)
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            @elseif ($review->rating == 3)
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o"></span>
                                            <span class="la la-star-o"></span>
                                            @elseif ($review->rating == 4)
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star-o"></span>
                                            @elseif ($review->rating == 5)
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            <span class="la la-star"></span>
                                            @endif
                                        </div>
                                    </div>
                                    <span class="d-block lh-18 pb-2">{{ Carbon\Carbon::parse($review->created_at)
                                    ->diffForHumans() }}</span>
                                    <p class="pb-2">
                                        {{ $review->comment }}
                                    </p>
                                    <div class="helpful-action">
                                        <span class="d-block fs-13"
                                        >Was this review helpful?</span
                                        >
                                        <button class="btn">Yes</button>
                                        <button class="btn">No</button>
                                        <span
                                        class="btn-text fs-14 cursor-pointer ps-1"
                                        data-bs-toggle="modal"
                                        data-bs-target="#reportModal"
                                        >Report</span
                                        >
                                    </div>
                                    </div>
                                </div>
                                <!-- end media -->
                                @endforeach
                            </div>
                            <!-- end review-wrap -->
                            <div class="see-more-review-btn text-center">
                            <button
                                type="button"
                                class="btn theme-btn theme-btn-transparent"
                            >
                                Load more reviews
                            </button>
                            </div>
                        </div>
                        <!-- end course-overview-card -->
                        @guest
                        <p>
                            <b>
                                For Adding Course Review You Need To Login First <a href="{{ route('login') }}">Login Here</a>
                            </b>
                        </p>
                        @else
                        <div class="course-overview-card pt-4">
                            <h3 class="fs-24 font-weight-semi-bold pb-4">Add a Review</h3>
                            <form method="post" class="row" action="{{ route('store.review') }}">
                                @csrf
                                <div class="leave-rating-wrap pb-4">
                                    <div class="leave-rating leave--rating">
                                        <input type="radio" name="rate" id="star5" value="5" />
                                        <label for="star5"></label>
                                        <input type="radio" name="rate" id="star4" value="4" />
                                        <label for="star4"></label>
                                        <input type="radio" name="rate" id="star3" value="3" />
                                        <label for="star3"></label>
                                        <input type="radio" name="rate" id="star2" value="2" />
                                        <label for="star2"></label>
                                        <input type="radio" name="rate" id="star1" value="1" />
                                        <label for="star1"></label>
                                    </div>
                                    <!-- end leave-rating -->
                                </div>
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <input type="hidden" name="instructor_id" value="{{ $course->instructor_id }}">
                                <div class="input-box col-lg-12">
                                    <label class="label-text">Message</label>
                                    <div class="form-group">
                                    <textarea
                                        class="form-control form--control ps-3"
                                        name="comment"
                                        placeholder="Write Message"
                                        rows="5"
                                    ></textarea>
                                    </div>
                                </div>
                                <!-- end input-box -->
                                <div class="btn-box col-lg-12">
                                    <button class="btn theme-btn" type="submit">
                                        Submit Review
                                    </button>
                                </div>
                                <!-- end btn-box -->
                            </form>
                        </div>
                        <!-- end course-overview-card -->
                        @endguest
                    </div>
                    <!-- end course-details-content-wrap -->
                </div>
                <!-- end col-lg-8 -->
                <div class="col-lg-4">
                    <div class="sidebar sidebar-negative">
                        <div class="card card-item">
                            <div class="card-body">
                                <div class="preview-course-video">
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#previewModal">
                                    <img
                                        src="{{ asset($course->course_image) }}"
                                        data-src="{{ asset($course->course_image) }}"
                                        alt="course-img"
                                        class="w-100 rounded lazy"
                                    />
                                    <div class="preview-course-video-content">
                                        <div class="overlay"></div>
                                        <div class="play-button">
                                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                viewBox="-307.4 338.8 91.8 91.8"
                                                style="enable-background: new -307.4 338.8 91.8 91.8;"
                                                xml:space="preserve">
                                                <style type="text/css">
                                                    .st0 {
                                                        fill: #ffffff;
                                                        border-radius: 100px;
                                                    }
                                                    .st1 {
                                                        fill: #000000;
                                                    }
                                                </style>
                                                <g>
                                                    <circle
                                                        class="st0"
                                                        cx="-261.5"
                                                        cy="384.7"
                                                        r="45.9"
                                                    ></circle>
                                                    <path
                                                        class="st1"
                                                        d="M-272.9,363.2l35.8,20.7c0.7,0.4,0.7,1.3,0,1.7l-35.8,20.7c-0.7,0.4-1.5-0.1-1.5-0.9V364C-274.4,363.3-273.5,362.8-272.9,363.2z"
                                                    ></path>
                                                </g>
                                            </svg>
                                        </div>
                                        <p class="fs-15 font-weight-bold text-white pt-3">
                                        Preview this course
                                        </p>
                                    </div>
                                    </a>
                                </div>
                                <!-- end preview-course-video -->
                                @php
                                    $amount = $course->selling_price - $course->discount_price;
                                    $discount = ($amount / $course->selling_price) * 100;
                                @endphp
                                <div class="preview-course-feature-content pt-40px">
                                    <p class="d-flex align-items-center pb-2">
                                        @if ($course->discount_price == null)
                                        <span class="fs-35 font-weight-semi-bold text-black">
                                            ${{ $course->selling_price  }}
                                        </span>
                                        @else
                                        <span class="fs-35 font-weight-semi-bold text-black">
                                            ${{ $course->discount_price }}
                                        </span>
                                        <span class="before-price mx-1">${{ $course->selling_price }}</span>
                                        @endif
                                        <span class="price-discount">{{ round($discount) }}% off</span>
                                    </p>
                                    <p class="preview-price-discount-text pb-35px">
                                        <span class="text-color-3">4 days</span> left at this price!
                                    </p>
                                    <div class="buy-course-btn-box">
                                        <button type="submit" class="btn theme-btn w-100 mb-2"
                                            onclick="addToCart({{ $course->id }},'{{ $course->course_name }}',
                                            '{{ $course->instructor_id }}','{{ $course->course_name_slug }}')">
                                            <i class="la la-shopping-cart fs-18 me-1"></i> Add to cart
                                        </button>
                                        <button type="button" class="btn theme-btn w-100 theme-btn-white mb-2"
                                            onclick="buyCourse({{ $course->id }},'{{ $course->course_name }}',
                                            '{{ $course->instructor_id }}','{{ $course->course_name_slug }}')">
                                            <i class="la la-shopping-bag me-1"></i> Buy this course
                                        </button>
                                        <div class="input-group mb-2" id="couponField">
                                            <input class="form-control form--control ps-3" type="text" id="coupon_name" placeholder="Coupon code"/>
                                            <div class="input-group-append">
                                                <input type="hidden" id="course_id" name="course_id" value="{{ $course->id }}">
                                                <input type="hidden" id="instructor_id" name="instructor_id" value="{{ $course->instructor_id }}">
                                                <a class="btn theme-btn" type="submit" onclick="applyInsCoupon()">Apply Code</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="fs-14 text-center pb-4">
                                        30-Day Money-Back Guarantee
                                    </p>
                                    <div class="preview-course-incentives">
                                        <h3 class="card-title fs-18 pb-2">
                                            This course includes
                                        </h3>
                                        <ul class="generic-list-item pb-3">
                                            <li>
                                                <i class="la la-play-circle-o me-2 text-color"></i>{{ $course->duration }}
                                                hours on-demand video
                                            </li>
                                            <li>
                                                <i class="la la-file me-2 text-color"></i>{{ $course->resources }} articles
                                            </li>
                                            <li>
                                            <i class="la la-file-text me-2 text-color"></i>12
                                            downloadable resources
                                            </li>
                                            <li>
                                            <i class="la la-code me-2 text-color"></i>51 coding
                                            exercises
                                            </li>
                                            <li>
                                            <i class="la la-key me-2 text-color"></i>Full lifetime
                                            access
                                            </li>
                                            <li>
                                            <i class="la la-television me-2 text-color"></i>Access
                                            on mobile and TV
                                            </li>
                                            <li>
                                            <i class="la la-certificate me-2 text-color"></i
                                            >Certificate of Completion
                                            </li>
                                        </ul>
                                        <div class="section-block"></div>
                                        <div class="buy-for-team-container pt-4">
                                            <h3 class="fs-18 font-weight-semi-bold pb-2">
                                            Training 5 or more people?
                                            </h3>
                                            <p class="lh-24 pb-3">
                                            Get your team access to 3,000+ top Aduca courses
                                            anytime, anywhere.
                                            </p>
                                            <a
                                            href="for-business.html"
                                            class="btn theme-btn theme-btn-sm theme-btn-transparent lh-30 w-100"
                                            >Try Aduca for Business</a
                                            >
                                        </div>
                                    </div>
                                    <!-- end preview-course-incentives -->
                                </div>
                                <!-- end preview-course-content -->
                            </div>
                        </div>
                        <!-- end card -->
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">Course Features</h3>
                                <div class="divider"><span></span></div>
                                <ul class="generic-list-item generic-list-item-flash">
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-clock me-2 text-color"></i>Duration</span>
                                        {{ $course->duration }} hours
                                    </li>
                                    <li
                                    class="d-flex align-items-center justify-content-between"
                                    >
                                    <span
                                        ><i class="la la-play-circle-o me-2 text-color"></i
                                        >Lectures</span
                                    >
                                    17
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-file-text-o me-2 text-color"></i>Resources</span>
                                        {{ $course->resources }}
                                    </li>
                                    <li
                                    class="d-flex align-items-center justify-content-between"
                                    >
                                    <span
                                        ><i class="la la-bolt me-2 text-color"></i>Quizzes</span
                                    >
                                    26
                                    </li>
                                    <li
                                    class="d-flex align-items-center justify-content-between"
                                    >
                                    <span
                                        ><i class="la la-eye me-2 text-color"></i>Preview
                                        Lessons</span
                                    >
                                    4
                                    </li>
                                    <li
                                    class="d-flex align-items-center justify-content-between"
                                    >
                                    <span
                                        ><i class="la la-language me-2 text-color"></i
                                        >Language</span
                                    >
                                    English
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-lightbulb me-2 text-color"></i>Skill level</span>
                                        {{ $course->label }}
                                    </li>
                                    <li
                                    class="d-flex align-items-center justify-content-between"
                                    >
                                    <span
                                        ><i class="la la-users me-2 text-color"></i
                                        >Students</span
                                    >
                                    30,506
                                    </li>
                                    <li class="d-flex align-items-center justify-content-between">
                                        <span><i class="la la-certificate me-2 text-color"></i>Certificate</span>
                                        {{ $course->certificate }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- end card -->
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">Course Categories</h3>
                                <div class="divider"><span></span></div>
                                <ul class="generic-list-item">
                                    @foreach ($categories as $category)
                                    <li><a href="{{ url('category/'. $category->id.'/'. $category->category_slug) }}">{{ $category->category_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- end card -->
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">Related Courses</h3>
                                <div class="divider"><span></span></div>
                                @foreach ($related_courses as $related_course)
                                <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                                    <a href="course-details.html" class="media-img">
                                    <img
                                        class="me-3 lazy"
                                        src="{{ asset($related_course->course_image) }}"
                                        data-src="{{ asset($related_course->course_image) }}"
                                        alt="Related course image"
                                    />
                                    </a>
                                    <div class="media-body">
                                    <h5 class="fs-15">
                                        <a href="course-details.html"
                                        >{{ $related_course->course_name }}</a
                                        >
                                    </h5>
                                    <span class="d-block lh-18 py-1 fs-14">{{ $related_course->user->name }}</span>
                                    @if ($related_course->discount_price == null)
                                    <p class="text-black font-weight-semi-bold lh-18 fs-15">
                                        ${{ $related_course->selling_price }}
                                    </p>
                                    @else
                                    <p class="text-black font-weight-semi-bold lh-18 fs-15">
                                        ${{ $related_course->discount_price }} <span class="before-price fs-14">${{ $related_course->selling_price }}</span>
                                    </p>
                                    @endif
                                    </div>
                                </div>
                                <!-- end media -->
                                @endforeach
                                <div class="view-all-course-btn-box">
                                    <a href="course-grid.html" class="btn theme-btn w-100"
                                    >View All Courses
                                    <i class="la la-arrow-right icon ms-1"></i
                                    ></a>
                                </div>
                            </div>
                        </div>
                        <!-- end card -->
                        <div class="card card-item">
                            <div class="card-body">
                                <h3 class="card-title fs-18 pb-2">Course Tags</h3>
                                <div class="divider"><span></span></div>
                                <ul
                                    class="generic-list-item generic-list-item-boxed d-flex flex-wrap fs-15"
                                >
                                    <li class="me-2"><a href="#">Beginner</a></li>
                                    <li class="me-2"><a href="#">Advanced</a></li>
                                    <li class="me-2"><a href="#">Tips</a></li>
                                    <li class="me-2"><a href="#">Photoshop</a></li>
                                    <li class="me-2"><a href="#">Software</a></li>
                                    <li class="me-2"><a href="#">Backend</a></li>
                                    <li class="me-2"><a href="#">Freelance</a></li>
                                    <li class="me-2"><a href="#">Frontend</a></li>
                                    <li class="me-2"><a href="#">Technology</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end sidebar -->
                </div>
                <!-- end col-lg-4 -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </section>
    <!-- end course-details-area -->
    <!--======================================
        END COURSE DETAILS AREA
======================================-->

    <!--======================================
        START RELATED COURSE AREA
======================================-->
    <section class="related-course-area bg-gray pt-60px pb-60px">
      <div class="container">
        <div class="related-course-wrap">
          <h3 class="fs-28 font-weight-semi-bold pb-35px">
            More Courses by
            <a href="teacher-detail.html" class="text-color hover-underline"
              >{{ $course->user->name }}</a
            >
          </h3>
          <div class="view-more-carousel-2 owl-action-styled">
            @foreach ($instructor_courses as $instructor_course)
            <div class="card card-item">
                @php
                    $amount = $instructor_course->selling_price - $instructor_course->discount_price;
                    $discount = ($amount / $instructor_course->selling_price) * 100;
                @endphp
              <div class="card-image">
                <a href="{{ url('course/details/'. $instructor_course->id .'/'. $instructor_course->course_name_slug) }}" class="d-block">
                  <img
                    class="card-img-top"
                    src="{{ asset($instructor_course->course_image) }}"
                    alt="Card image cap"
                  />
                </a>
                <div class="course-badge-labels">
                    @if ($instructor_course->best_seller == 1)
                    <div class="course-badge">Bestseller</div>
                    @endif

                    @if ($instructor_course->discount_price == null)
                    <div class="course-badge blue">New</div>
                    @else
                    <div class="course-badge blue">{{ round($discount) }}%</div>
                    @endif
                </div>
              </div>
              <!-- end card-image -->
              <div class="card-body">
                <h6 class="ribbon ribbon-blue-bg fs-14 mb-3">{{ $instructor_course->label }}</h6>
                <h5 class="card-title">
                  <a href="{{ url('course/details/'. $instructor_course->id .'/'. $instructor_course->course_name_slug) }}"
                    >{{ $instructor_course->course_name }}</a
                  >
                </h5>
                <p class="card-text">
                  <a href="teacher-detail.html">{{ $instructor_course->user->name }}</a>
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
                <div class="d-flex justify-content-between align-items-center">
                    @if ($instructor_course->discount_price == null)
                    <p class="card-price text-black font-weight-bold">${{ $instructor_course->selling_price }}</p>
                    @else
                    <p class="card-price text-black font-weight-bold">
                        ${{ $instructor_course->discount_price }}
                        <span class="before-price font-weight-medium">
                            ${{ $instructor_course->selling_price }}
                        </span>
                    </p>
                    @endif
                  <div
                    class="icon-element icon-element-sm shadow-sm cursor-pointer"
                    title="Add to Wishlist"
                  >
                    <i class="la la-heart-o"></i>
                  </div>
                </div>
              </div>
              <!-- end card-body -->
            </div>
            <!-- end card -->
            @endforeach
          </div>
          <!-- end view-more-carousel -->
        </div>
        <!-- end related-course-wrap -->
      </div>
      <!-- end container -->
    </section>
    <!-- end related-course-area -->
    <!--======================================
        END RELATED COURSE AREA
======================================-->

    <!--======================================
        START CTA AREA
======================================-->
    <section class="cta-area pt-60px pb-60px position-relative overflow-hidden">
      <span class="stroke-shape stroke-shape-1"></span>
      <span class="stroke-shape stroke-shape-2"></span>
      <span class="stroke-shape stroke-shape-3"></span>
      <span class="stroke-shape stroke-shape-4"></span>
      <span class="stroke-shape stroke-shape-5"></span>
      <span class="stroke-shape stroke-shape-6"></span>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-9">
            <div
              class="cta-content-wrap py-4 d-flex flex-wrap align-items-center"
            >
              <svg
                class="flex-shrink-0 me-4"
                width="70"
                viewBox="0 -48 496 496"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="m472 0h-448c-13.230469 0-24 10.769531-24 24v352c0 13.230469 10.769531 24 24 24h448c13.230469 0 24-10.769531 24-24v-352c0-13.230469-10.769531-24-24-24zm8 376c0 4.414062-3.59375 8-8 8h-448c-4.40625 0-8-3.585938-8-8v-352c0-4.40625 3.59375-8 8-8h448c4.40625 0 8 3.59375 8 8zm0 0"
                ></path>
                <path
                  d="m448 32h-400v240h400zm-16 224h-368v-208h368zm0 0"
                ></path>
                <path
                  d="m328 200.136719c0-17.761719-11.929688-33.578125-29.007812-38.464844l-26.992188-7.703125v-2.128906c9.96875-7.511719 16-19.328125 16-31.832032v-14.335937c0-21.503906-16.007812-39.726563-36.449219-41.503906-11.183593-.96875-22.34375 2.800781-30.574219 10.351562-8.25 7.550781-12.976562 18.304688-12.976562 29.480469v16c0 12.503906 6.03125 24.328125 16 31.832031v2.128907l-26.992188 7.710937c-17.078124 4.886719-29.007812 20.703125-29.007812 38.464844v39.863281h160zm-16 23.863281h-128v-23.863281c0-10.664063 7.160156-20.152344 17.40625-23.082031l38.59375-11.023438v-23.070312l-3.976562-2.3125c-7.527344-4.382813-12.023438-12.105469-12.023438-20.648438v-16c0-6.703125 2.839844-13.160156 7.792969-17.695312 5.007812-4.601563 11.496093-6.832032 18.382812-6.207032 12.230469 1.0625 21.824219 12.285156 21.824219 25.566406v14.335938c0 8.542969-4.496094 16.265625-12.023438 20.648438l-3.976562 2.3125v23.070312l38.59375 11.023438c10.246094 2.9375 17.40625 12.425781 17.40625 23.082031zm0 0"
                ></path>
                <path
                  d="m32 364.945312 73.886719-36.945312-73.886719-36.945312zm16-48 22.113281 11.054688-22.113281 11.054688zm0 0"
                ></path>
                <path d="m152 288h16v80h-16zm0 0"></path>
                <path d="m120 288h16v80h-16zm0 0"></path>
                <path
                  d="m336 288h-48v32h-104v16h104v32h48v-32h128v-16h-128zm-16 64h-16v-48h16zm0 0"
                ></path>
              </svg>
              <div class="section-heading">
                <h2 class="section__title mb-1 fs-22">
                  Become a Teacher, Share your knowledge
                </h2>
                <p class="section__desc">
                  Create an online video course, reach students across the
                  globe, and earn money
                </p>
              </div>
              <!-- end section-heading -->
            </div>
          </div>
          <!-- end col-lg-9 -->
          <div class="col-lg-3">
            <div class="cta-btn-box text-end">
              <a
                href="become-a-teacher.html"
                class="btn theme-btn"
                type="button"
                >Tech on Aduca <i class="la la-arrow-right icon ms-1"></i>
              </a>
            </div>
          </div>
          <!-- end col-lg-3 -->
        </div>
        <!-- end row -->
      </div>
      <!-- end container -->
    </section>
    <!-- end cta-area -->
    <!--======================================
        END CTA AREA
======================================-->
<!-- Modal -->
    <div
      class="modal fade modal-container"
      id="shareModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="shareModalTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header align-items-start border-bottom-gray">
            <h5
              class="modal-title fs-19 font-weight-semi-bold"
              id="shareModalLongTitle"
            >
              Share this course
            </h5>
            <button
              type="button"
              class="btn-close close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true" class="la la-times"></span>
            </button>
          </div>
          <!-- end modal-header -->
          <div class="modal-body">
            <div class="copy-to-clipboard">
              <span class="success-message">Copied!</span>
              <div class="input-group">
                <input
                  type="text"
                  class="form-control form--control copy-input ps-3"
                  value="http://127.0.0.1:8000/{{ Request::path() }}"
                />
                <div class="input-group-append">
                  <button
                    class="btn theme-btn theme-btn-sm copy-btn shadow-none"
                  >
                    <i class="la la-copy me-1"></i> Copy
                  </button>
                </div>
              </div>
            </div>
            <!-- end copy-to-clipboard -->
          </div>
          <!-- end modal-body -->
          <div class="modal-footer justify-content-center border-top-gray">
            <ul class="social-icons social-icons-styled">
              <li>
                <a href="#" class="facebook-bg"
                  ><i class="la la-facebook"></i
                ></a>
              </li>
              <li>
                <a href="#" class="twitter-bg"><i class="la la-twitter"></i></a>
              </li>
              <li>
                <a href="#" class="instagram-bg"
                  ><i class="la la-instagram"></i
                ></a>
              </li>
            </ul>
          </div>
          <!-- end modal-footer -->
        </div>
        <!-- end modal-content-->
      </div>
      <!-- end modal-dialog -->
    </div>
    <!-- end modal -->

    <!-- Modal -->
    <div
      class="modal fade modal-container"
      id="previewModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="previewModalTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header align-items-start border-bottom-gray">
            <div class="pe-2">
              <p class="pb-2 font-weight-semi-bold">Course Preview</p>
              <h5
                class="modal-title fs-19 font-weight-semi-bold lh-24"
                id="previewModalLongTitle"
              >
                {{ $course->course_name }}
              </h5>
            </div>
            <button
              type="button"
              class="btn-close close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true" class="la la-times"></span>
            </button>
          </div>
          <!-- end modal-header -->
          <div class="modal-body">
            <video
              controls
              crossorigin
              playsinline
              poster="{{ asset($course->course_image) }}"
              id="player"
            >
              <!-- Video files -->
              <source
                src="{{ asset($course->video) }}"
                type="video/mp4"
                size="576"
              />
            </video>
          </div>
          <!-- end modal-body -->
        </div>
        <!-- end modal-content -->
      </div>
      <!-- end modal-dialog -->
    </div>
    <!-- end modal -->

    <!-- Modal -->
    <div
      class="modal fade modal-container"
      id="reportModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="reportModalTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header align-items-start border-bottom-gray">
            <div class="pe-2">
              <h5
                class="modal-title fs-19 font-weight-semi-bold lh-24"
                id="reportModalLongTitle"
              >
                Report Abuse
              </h5>
              <p class="pt-1 fs-14 lh-24">
                Flagged content is reviewed by Aduca staff to determine whether
                it violates Terms of Service or Community Guidelines. If you
                have a question or technical issue, please contact our
                <a href="contact.html" class="text-color hover-underline"
                  >Support team here</a
                >.
              </p>
            </div>
            <button
              type="button"
              class="btn-close close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true" class="la la-times"></span>
            </button>
          </div>
          <!-- end modal-header -->
          <div class="modal-body select-model">
            <form method="post">
              <div class="input-box">
                <label class="label-text">Select Report Type</label>
                <div class="form-group">
                  <div class="select-container select2-full-wrapper w-auto">
                    <select
                      class="select-container-select select-cotainer-model"
                    >
                      <option value>-- Select One --</option>
                      <option value="1">Inappropriate Course Content</option>
                      <option value="2">Inappropriate Behavior</option>
                      <option value="3">Aduca Policy Violation</option>
                      <option value="4">Spammy Content</option>
                      <option value="5">Other</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="input-box">
                <label class="label-text">Write Message</label>
                <div class="form-group">
                  <textarea
                    class="form-control form--control ps-3"
                    name="message"
                    placeholder="Provide additional details here..."
                    rows="5"
                  ></textarea>
                </div>
              </div>
              <div class="btn-box text-end pt-2">
                <button
                  type="button"
                  class="btn font-weight-medium me-3"
                  data-bs-dismiss="modal"
                >
                  Cancel
                </button>
                <button type="submit" class="btn theme-btn theme-btn-sm lh-30">
                  Submit <i class="la la-arrow-right icon ms-1"></i>
                </button>
              </div>
            </form>
          </div>
          <!-- end modal-body -->
        </div>
        <!-- end modal-content -->
      </div>
      <!-- end modal-dialog -->
    </div>
    <!-- end modal -->
@endsection
