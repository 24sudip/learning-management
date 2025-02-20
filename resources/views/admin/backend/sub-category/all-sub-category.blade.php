<!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
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
                    <li class="breadcrumb-item active" aria-current="page">All SubCategory</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('add.subcategory') }}" class="btn btn-primary px-5">Add SubCategory</a>
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
                            <th>Category Name</th>
                            <th>SubCategory Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sub_categories as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                {{ $item->category->category_name }}
                            </td>
                            <td>{{ $item->sub_category_name }}</td>
                            <td>
                                <a href="{{ route('edit.subcategory', $item->id) }}" class="btn btn-info px-5">Edit</a>
                                <a href="{{ route('delete.subcategory', $item->id) }}" class="btn btn-danger px-5" id="delete">Delete</a>
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
