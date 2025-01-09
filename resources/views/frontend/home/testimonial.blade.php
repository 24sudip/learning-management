<!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
{{-- @php
    $reviews = App\Models\Review::where('course_id', $course->id)->where('status', 1)->latest()->limit(5)->get();
@endphp --}}
<section class="testimonial-area section-padding">
    <div class="container">
        <div class="section-heading text-center">
          <h5 class="ribbon ribbon-lg mb-2">Testimonials</h5>
          <h2 class="section__title">Student's Feedback</h2>
          <span class="section-divider"></span>
        </div>
        <!-- end section-heading -->
    </div>
    <!-- end container -->
    <div class="container-fluid">
        <div class="testimonial-carousel owl-action-styled">
          <div class="card card-item">
            <div class="card-body">
              <div class="media media-card align-items-center pb-3">
                <div class="media-img avatar-md">
                  <img
                    src="{{ asset('frontend/images') }}/small-avatar-1.jpg"
                    alt="Testimonial avatar"
                    class="rounded-full"
                  />
                </div>
                <div class="media-body">
                  <h5>Kevin Martin</h5>
                  <div class="d-flex flex-column align-items-start pt-1">
                    <span class="lh-18 pe-2">Student</span>
                    <div class="review-stars">
                      <span class="la la-star"></span>
                      <span class="la la-star"></span>
                      <span class="la la-star"></span>
                      <span class="la la-star"></span>
                      <span class="la la-star"></span>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end media -->
              <p class="card-text">
                My children and I LOVE Aduca! The courses are fantastic and the
                instructors are so fun and knowledgeable. I only wish we found
                it sooner.
              </p>
            </div>
            <!-- end card-body -->
          </div>
          <!-- end card -->
        </div>
        <!-- end testimonial-carousel -->
    </div>
    <!-- container-fluid -->
</section>
<!-- end testimonial-area -->
