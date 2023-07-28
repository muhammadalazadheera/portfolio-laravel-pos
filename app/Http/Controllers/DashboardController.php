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


        return view('welcome', compact('productsCount', 'soldProducts', 'outOfStockProducts', 'maxProduct', 'maxQuantity'));
    }
}
