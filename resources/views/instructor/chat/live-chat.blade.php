<!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
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
                    <li class="breadcrumb-item active" aria-current="page">Live Chat</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <h4>Live Chat</h4>
            <div id="app">
                <chat-message></chat-message>
            </div>
        </div>
    </div>
</div>
@endsection
