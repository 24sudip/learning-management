<!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
@extends('admin.admin-dashboard')

@section('admin_content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Instructor</li>
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
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>User Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ (!empty($user->photo)) ? url('upload/instructor-images/'.$user->photo) : url('backend/assets/images/avatars/avatar-2.png') }}" style="width: 70px;">
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>
                                {{ $user->email }}
                            </td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                @if ($user->UserOnline())
                                <span class="badge badge-pill bg-success">Active Now</span>
                                @else
                                <span class="badge badge-pill bg-danger">
                                    {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                                </span>
                                @endif
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
