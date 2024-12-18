<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Payment, Order, CourseSection, Question};
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

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
        $latestOrderItem = Order::where('instructor_id', $id)->select('payment_id', \DB::raw('MAX(id) as max_id'))
        ->groupBy('payment_id');
        $orders = Order::joinSub($latestOrderItem,'latest_order', function ($join) {
            $join->on('orders.id','=','latest_order.max_id');
        })->orderBy('latest_order.max_id','DESC')->get();
        // ->orderBy('id','desc')->get()
        return view('instructor.orders.all-orders', compact('orders'));
    }

    public function InstructorOrderDetails($payment_id) {
        $payment = Payment::where('id', $payment_id)->first();
        $orders = Order::where('payment_id', $payment_id)->orderBy('id','DESC')->get();
        return view('instructor.orders.instructor-order-details', compact('payment','orders'));
    }

    public function InstructorOrderInvoice($payment_id) {
        $payment = Payment::where('id', $payment_id)->first();
        $orders = Order::where('payment_id', $payment_id)->orderBy('id','DESC')->get();
        $pdf = Pdf::loadView('instructor.orders.order-pdf', compact('payment','orders'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path()
        ]);
        return $pdf->download('invoice.pdf');
    }

    public function MyCourse() {
        $id = Auth::user()->id;
        $latestOrderItem = Order::where('user_id', $id)->select('course_id', \DB::raw('MAX(id) as max_id'))
        ->groupBy('course_id');
        $orders = Order::joinSub($latestOrderItem,'latest_order', function ($join) {
            $join->on('orders.id','=','latest_order.max_id');
        })->orderBy('latest_order.max_id','DESC')->get();
        return view('frontend.my-course.my-all-course', compact('orders'));
    }

    public function CourseView($course_id) {
        $id = Auth::user()->id;
        $order = Order::where('course_id', $course_id)->where('user_id', $id)->first();
        $course_sections = CourseSection::where('course_id', $course_id)->orderBy('id','asc')->get();

        $questions = Question::where('course_id', $course_id)->where('parent_id', null)->latest()->get();
        return view('frontend.my-course.course-view', compact('order','course_sections','questions'));
    }
}
