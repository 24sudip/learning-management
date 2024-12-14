<!-- Very little is needed to make a happy life. - Marcus Aurelius -->
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
                    <li class="breadcrumb-item active" aria-current="page">All Orders</li>
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
                            <th>Date</th>
                            <th>Invoice</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                {{ $order->payment->order_date }}
                            </td>
                            <td>{{ $order->payment->invoice_no }}</td>
                            <td>{{ $order->payment->total_amount }}</td>
                            <td>{{ $order->payment->payment_type }}</td>
                            <td>
                                @if ($order->payment->status == 'confirmed')
                                <span class="badge bg-success">{{ $order->payment->status }}</span>
                                @else
                                <span class="badge bg-danger">{{ $order->payment->status }}</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('instructor.order.details', $order->payment->id) }}" class="btn btn-info">
                                    <i class="lni lni-eye"></i>
                                </a>
                                <a href="{{ route('instructor.order.invoice', $order->payment->id) }}" class="btn btn-danger"  title="Invoice">
                                    <i class="lni lni-download"></i>
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
