<!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
@extends('instructor.instructor-dashboard')

@section('instructor_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Questions</li>
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
                            <th>Subject</th>
                            <th>User</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $key => $question)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                {{ $question->course->course_name }}
                            </td>
                            <td>{{ $question->subject }}</td>
                            <td>{{ $question->user->name }}</td>
                            <td>{{ Carbon\Carbon::parse($question->created_at)->diffForHumans() }}</td>
                            <td>
                                <a href="{{ route('question.details', $question->id) }}" class="btn btn-info">
                                    <i class="lni lni-eye"></i>
                                </a>
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
