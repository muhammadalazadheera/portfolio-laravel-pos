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

        // Counting products in stock
        $productsCount = $report->productInStock();

        // Counting products out of stock
        $outOfStockProducts = $report->outOfStockProducts();

        // Top sold product
        $dailyTopSell = $report->dailyTopSellProduct();
        $maxProduct = $dailyTopSell['maxProduct'];
        $maxQuantity = $dailyTopSell['maxQuantity'];

        // Sold product count
        $soldProducts = $report->dailyTotalSell();

        // Total order
        $totalOrder = $report->dailyOrder();

        // Daily Sell Amount
        $dailySellAmount = $report->dailySellAmount();

        // Daily Due Amount
        $dailyDueAmount = $report->dailyDueAmount();

        // Daily Due Amount
        $dailyPaidAmount = (int) $dailySellAmount - (int) $dailyDueAmount;

        // Today's profit
        $profit = $report->dailyProfit();

        // Profit of current week
        $weeklyProfit = $report->currentWeekProfit();

        // Profit of current week
        $monthlyProfit = $report->currentMonthProfit();


        return view('welcome', compact(
            'productsCount',
            'soldProducts',
            'outOfStockProducts',
            'maxProduct',
            'maxQuantity',
            'totalOrder',
            'dailySellAmount',
            'dailyDueAmount',
            'dailyPaidAmount',
            'profit',
            'weeklyProfit',
            'monthlyProfit',
            'currentDateInvoices'
        ));
    }
}
