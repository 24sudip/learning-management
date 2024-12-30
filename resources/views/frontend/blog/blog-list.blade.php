<!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
@extends('frontend.master')

@section('home_content')
    <!-- ================================
    START BREADCRUMB AREA
================================= -->
    <section class="breadcrumb-area section-padding img-bg-2">
      <div class="overlay"></div>
      <div class="container">
        <div
          class="breadcrumb-content d-flex flex-wrap align-items-center justify-content-between"
        >
          <div class="section-heading">
            <h2 class="section__title text-white">All Blog</h2>
          </div>
          <ul
            class="generic-list-item generic-list-item-white generic-list-item-arrow d-flex flex-wrap align-items-center"
          >
            <li><a href="index.html">Home</a></li>
            <li>Blog</li>
          </ul>
        </div>
        <!-- end breadcrumb-content -->
      </div>
      <!-- end container -->
    </section>
    <!-- end breadcrumb-area -->
    <!-- ================================
    END BREADCRUMB AREA
================================= -->

    <!-- ================================
       START BLOG AREA
================================= -->
    <section class="blog-area section--padding">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mb-5">
            <div class="row">
                @foreach ($all_posts as $blog_post)
                <div class="col-lg-6">
                  <div class="card card-item">
                    <div class="card-image">
                      <a href="{{ url('blog/details/'. $blog_post->post_slug) }}" class="d-block">
                        <img
                          class="card-img-top lazy"
                          src="{{ asset($blog_post->post_image) }}"
                          data-src="{{ asset($blog_post->post_image) }}"
                          alt="Card image cap"
                        />
                      </a>
                      <div class="course-badge-labels">
                        <div class="course-badge">{{ $blog_post->created_at->format('M d Y') }}</div>
                      </div>
                    </div>
                    <!-- end card-image -->
                    <div class="card-body">
                      <h5 class="card-title">
                        <a href="{{ url('blog/details/'. $blog_post->post_slug) }}"
                          >{{ $blog_post->post_title }}</a
                        >
                      </h5>
                      <ul
                        class="generic-list-item generic-list-item-bullet generic-list-item--bullet d-flex align-items-center flex-wrap fs-14 pt-2"
                      >
                        <li class="d-flex align-items-center">
                          By<a href="#">Admin</a>
                        </li>
                        <li class="d-flex align-items-center">
                          <a href="#">4 Comments</a>
                        </li>
                        <li class="d-flex align-items-center">
                          <a href="#">130 Likes</a>
                        </li>
                      </ul>
                      <div
                        class="d-flex justify-content-between align-items-center pt-3"
                      >
                        <a
                          href="blog-single.html"
                          class="btn theme-btn theme-btn-sm theme-btn-white"
                          >Read More <i class="la la-arrow-right icon ms-1"></i
                        ></a>
                        <div class="share-wrap">
                          <ul class="social-icons social-icons-styled">
                            <li class="me-0">
                              <a href="#" class="facebook-bg"
                                ><i class="la la-facebook"></i
                              ></a>
                            </li>
                            <li class="me-0">
                              <a href="#" class="twitter-bg"
                                ><i class="la la-twitter"></i
                              ></a>
                            </li>
                            <li class="me-0">
                              <a href="#" class="instagram-bg"
                                ><i class="la la-instagram"></i
                              ></a>
                            </li>
                          </ul>
                          <div
                            class="icon-element icon-element-sm shadow-sm cursor-pointer share-toggle"
                            title="Toggle to expand social icons"
                          >
                            <i class="la la-share-alt"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end card-body -->
                  </div>
                  <!-- end card -->
                </div>
                <!-- end col-lg-6 -->
                @endforeach
            </div>
            <!-- end row -->
            <div class="text-center pt-3">
              <nav aria-label="Page navigation example" class="pagination-box">
                {{ $all_posts->links('vendor.pagination.custom') }}
              </nav>
            </div>
          </div>
          <!-- end col-lg-8 -->
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="card card-item">
                <div class="card-body">
                  <h3 class="card-title fs-18 pb-2">Blog Categories</h3>
                  <div class="divider"><span></span></div>
                  <ul class="generic-list-item">
                    @foreach ($blog_categories as $blog_category)
                    <li><a href="{{ url('blog/cat/list/'. $blog_category->id) }}">{{ $blog_category->category_name }}</a></li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <!-- end card -->
              <div class="card card-item">
                <div class="card-body">
                  <h3 class="card-title fs-18 pb-2">Recent Posts</h3>
                  <div class="divider"><span></span></div>
                  @foreach ($recent_posts as $blog_post)
                  <div class="media media-card border-bottom border-bottom-gray pb-4 mb-4">
                    <a href="{{ url('blog/details/'. $blog_post->post_slug) }}" class="media-img">
                      <img
                        class="me-3"
                        src="{{ asset($blog_post->post_image) }}"
                        alt="Related course image"
                      />
                    </a>
                    <div class="media-body">
                      <h5 class="fs-15">
                        <a href="{{ url('blog/details/'. $blog_post->post_slug) }}"
                          >{{ $blog_post->post_title }}</a
                        >
                      </h5>
                      <span class="d-block lh-18 py-1 fs-14">Admin</span>
                    </div>
                  </div>
                  <!-- end media -->
                  @endforeach
                  <div class="view-all-course-btn-box">
                    <a href="blog-no-sidebar.html" class="btn theme-btn w-100"
                      >View All Posts <i class="la la-arrow-right icon ms-1"></i
                    ></a>
                  </div>
                </div>
              </div>
              <!-- end card -->
              <div class="card card-item">
                <div class="card-body">
                  <h3 class="card-title fs-18 pb-2">Sidebar Form</h3>
                  <div class="divider"><span></span></div>
                  <form method="post">
                    <div class="form-group">
                      <input
                        class="form-control form--control"
                        type="text"
                        name="text"
                        placeholder="Name"
                      />
                      <span class="la la-user input-icon"></span>
                    </div>
                    <div class="form-group">
                      <input
                        class="form-control form--control"
                        type="email"
                        name="email"
                        placeholder="Email"
                      />
                      <span class="la la-envelope input-icon"></span>
                    </div>
                    <div class="form-group">
                      <textarea
                        class="form-control form--control ps-3"
                        name="message"
                        rows="4"
                        placeholder="Write message"
                      ></textarea>
                    </div>
                    <div class="btn-box">
                      <button class="btn theme-btn w-100">
                        Contact Author
                        <i class="la la-arrow-right icon ms-1"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <!-- end card -->
              <div class="card card-item">
                <div class="card-body">
                  <h3 class="card-title fs-18 pb-2">Connect & Follow</h3>
                  <div class="divider"><span></span></div>
                  <ul
                    class="social-icons social-icons-styled social--icons-styled"
                  >
                    <li>
                      <a href="#"><i class="la la-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="la la-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="la la-instagram"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="la la-youtube"></i></a>
                    </li>
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
    <!-- end blog-area -->
    <!-- ================================
       START BLOG AREA
================================= -->
@endsection
