<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $report = new Report();
        $currentDateInvoices = Invoice::whereDate('created_at', Carbon::now())->take(5)->get();




        // Today's all report
        $dailyReport = $report->getReport('daily', null, null);

        // Profit of current week
        $weeklyProfit = $report->getReport('weekly', null, null);

        // Profit of current week
        $monthlyProfit = $report->getReport('monthly', null, null);


        return view('welcome', compact('dailyReport', 'weeklyProfit', 'monthlyProfit', 'currentDateInvoices'));
    }
}
