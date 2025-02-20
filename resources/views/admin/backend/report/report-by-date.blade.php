<!-- An unexamined life is not worth living. - Socrates -->
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
                    <li class="breadcrumb-item active" aria-current="page">Report By Date</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="" class="btn btn-primary px-5">Search By Date : {{ $formatDate }}</a>
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
                            <th>Date</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Invoice</th>
                            <th>Amount</th>
                            <th>Payment Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $key => $payment)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $payment->order_date }}</td>
                            <td>{{ $payment->name }}</td>
                            <td>{{ $payment->email }}</td>
                            <td>{{ $payment->invoice_no }}</td>
                            <td>{{ $payment->total_amount }}</td>
                            <td>{{ $payment->payment_type }}</td>
                            <td>
                                <span class="badge rounded-pill bg-success">
                                    {{ $payment->status }}
                                </span>
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
