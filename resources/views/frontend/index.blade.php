<!-- Let all your things have their places; let each part of your business have its time. - Benjamin Franklin -->
@extends('frontend.master')

@section('home_content')
    @section('title')
    Easy Learning
    @endsection
<!--================================
START HERO AREA
=================================-->
    @include('frontend.home.hero')
<!--================================
END HERO AREA
=================================-->

<!--======================================
START FEATURE AREA
======================================-->
    @include('frontend.home.feature')
<!--======================================
END FEATURE AREA
======================================-->

<!--======================================
START CATEGORY AREA
======================================-->
    @include('frontend.home.category')
<!--======================================
END CATEGORY AREA
======================================-->

<!--======================================
START COURSE AREA
======================================-->
    @include('frontend.home.course')
<!--======================================
END COURSE AREA
======================================-->

<!--======================================
START COURSE AREA
======================================-->
    @include('frontend.home.course-two')
<!--======================================
END COURSE AREA
======================================-->

<!-- ================================
START FUNFACT AREA
================================= -->
    @include('frontend.home.funfact')
<!-- ================================
START FUNFACT AREA
================================= -->

<!--======================================
START CTA AREA
======================================-->
    @include('frontend.home.cta-area')
<!--======================================
END CTA AREA
======================================-->

<!--================================
START TESTIMONIAL AREA
=================================-->
    @include('frontend.home.testimonial')
<!--================================
    END TESTIMONIAL AREA
=================================-->

    <div class="section-block"></div>

<!--======================================
START ABOUT AREA
======================================-->
    @include('frontend.home.about')
<!--======================================
END ABOUT AREA
======================================-->

    <div class="section-block"></div>

<!--======================================
START REGISTER AREA
======================================-->
    @include('frontend.home.register')
<!--======================================
END REGISTER AREA
======================================-->

    <div class="section-block"></div>

<!-- ================================
START CLIENT-LOGO AREA
================================= -->
    @include('frontend.home.client-logo')
<!-- ================================
END CLIENT-LOGO AREA
================================= -->

<!-- ================================
START BLOG AREA
================================= -->
    @include('frontend.home.blog')
<!-- ================================
END BLOG AREA
================================= -->

<!--======================================
START GET STARTED AREA
======================================-->
    @include('frontend.home.get-started')
<!-- ================================
START GET STARTED AREA
================================= -->

<!--======================================
START SUBSCRIBER AREA
======================================-->
    @include('frontend.home.subscriber')
<!--======================================
END SUBSCRIBER AREA
======================================-->
@endsection
