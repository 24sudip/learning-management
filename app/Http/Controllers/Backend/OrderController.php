<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class OrderController extends Controller
{
    public function AdminPendingOrder() {
        $payments = Payment::where('status','pending')->orderBy('id','DESC')->get();
        return view('admin.backend.orders.pending-orders', compact('payments'));
    }
}
