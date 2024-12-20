<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use DateTime;

class ReportController extends Controller
{
    public function ReportView() {
        return view('admin.backend.report.report-view');
    }

    public function SearchByDate(Request $request) {
        $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        $payments = Payment::where('order_date', $formatDate)->latest()->get();
        return view('admin.backend.report.report-by-date', compact('payments','formatDate'));
    }

    public function SearchByMonth(Request $request) {
        $month = $request->month;
        $year_name = $request->year_name;
        $payments = Payment::where('order_month', $month)->where('order_year', $year_name)->latest()->get();
        return view('admin.backend.report.report-by-month', compact('payments','month','year_name'));
    }

    public function SearchByYear(Request $request) {
        $year = $request->year;
        $payments = Payment::where('order_year', $year)->latest()->get();
        return view('admin.backend.report.report-by-year', compact('year','payments'));
    }
}
