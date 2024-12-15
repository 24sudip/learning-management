<!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
@extends('instructor.instructor-dashboard')

@section('instructor_content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Order Details</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong>
                                        {{ $payment->name }}
                                    </strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong>
                                        {{ $payment->email }}
                                    </strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong>
                                        {{ $payment->phone }}
                                    </strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong>
                                        {{ $payment->address }}
                                    </strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Payment Type</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong>
                                        {{ $payment->cash_delivery }}
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Total Amount</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong>
                                        ${{ $payment->total_amount }}
                                    </strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Invoice No</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong>
                                        {{ $payment->invoice_no }}
                                    </strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Order Date</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong>
                                        {{ $payment->order_date }}
                                    </strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Payment Type</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <strong>
                                        {{ $payment->payment_type }}
                                    </strong>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Status</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    @if ($payment->status == 'pending')
                                    <a href="{{ route('pending.confirm', $payment->id) }}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>
                                    @elseif ($payment->status == 'confirmed')
                                    <a href="" class="btn btn-block btn-primary">Order Confirmed</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 ms-3">
                            <div class="table-responsive">
                                <table class="table" style="font-weight: 600;">
                                    <tbody>
                                        <tr>
                                            <td class="col-md-1">
                                                <label>Image</label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>Course Name</label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>Category</label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>Instructor</label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>Price</label>
                                            </td>
                                            @php
                                                $totalPrice = 0;
                                            @endphp
                                        </tr>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td class="col-md-1">
                                                <label><img src="{{ asset($order->course->course_image) }}" width="50"></label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>{{ $order->course->course_name }}</label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>{{ $order->course->category->category_name }}</label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>{{ $order->instructor->name }}</label>
                                            </td>
                                            <td class="col-md-2">
                                                <label>${{ $order->price }}</label>
                                            </td>
                                            @php
                                                $totalPrice += $order->price
                                            @endphp
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="4"></td>
                                            <td class="col-md-3">
                                                <strong>Total Price : ${{ $totalPrice }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection