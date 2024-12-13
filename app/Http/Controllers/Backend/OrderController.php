<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Payment, Order};
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function AdminPendingOrder() {
        $payments = Payment::where('status','pending')->orderBy('id','DESC')->get();
        return view('admin.backend.orders.pending-orders', compact('payments'));
    }

    public function AdminOrderDetails($payment_id) {
        $payment = Payment::where('id', $payment_id)->first();
        $orders = Order::where('payment_id', $payment_id)->orderBy('id','DESC')->get();
        return view('admin.backend.orders.admin-order-details', compact('payment','orders'));
    }

    public function PendingToConfirm($payment_id) {
        Payment::find($payment_id)->update(['status' => 'confirmed']);
        $notification = array(
            'message' => 'Order Confirmed Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.confirmed.order')->with($notification);
    }

    public function AdminConfirmedOrder() {
        $payments = Payment::where('status','confirmed')->orderBy('id','DESC')->get();
        return view('admin.backend.orders.confirmed-orders', compact('payments'));
    }

    public function InstructorAllOrder() {
        $id = Auth::user()->id;
        $orders = Order::where('instructor_id', $id)->orderBy('id','desc')->get();
        return view('instructor.orders.all-orders', compact('orders'));
    }
}
