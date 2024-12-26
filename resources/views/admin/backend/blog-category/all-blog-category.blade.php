<!-- Simplicity is an acquired taste. - Katharine Gerould -->
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
                    <li class="breadcrumb-item active" aria-current="page">All Blog Category</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Blog Category
                </button>
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
                            <th>Category Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blog_categories as $key => $blog_category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $blog_category->category_name }}</td>
                            <td>
                                {{ $blog_category->category_slug }}
                            </td>
                            <td>
                                <a href="{{ route('edit.category', $blog_category->id) }}" class="btn btn-info px-5">Edit</a>
                                <a href="{{ route('delete.category', $blog_category->id) }}" class="btn btn-danger px-5" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Blog Category</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('blog.category.store') }}" method="post">
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="inputFirstName" class="form-label">Blog Category Name</label>
                        <input type="text" class="form-control" id="inputFirstName" name="category_name">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
