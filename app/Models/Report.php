<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    //----------------------------------------------------- Counting the total products available in stock
    public function productInStock()
    {
        $productsCount = 0;
        $batches = Batch::all();
        foreach ($batches as $batch) {
            $productsCount += $batch->rem_quantity;
        }
        return $productsCount;
    }

    //----------------------------------------------------- Counting the out of stock products

    public function outOfStockProducts()
    {
        return Batch::where('rem_quantity', '==', 0)->count();
    }

    //----------------------------------------------------- Counting the total sold product (in the current date)

    public function dailyTotalSell()
    {
        $soldProducts = 0;
        $invoices = Invoice::whereDate('created_at', Carbon::today())->get();
        foreach ($invoices as $invoice) {
            foreach (json_decode($invoice->products) as $p) {
                $soldProducts += $p->quantity;
            }
        }
        return $soldProducts;
    }

    //----------------------------------------------------- Counting the top sold product

    public function dailyTopSellProduct()
    {
        // Decode JSON data into a PHP array
        $invoices = json_decode(Invoice::whereDate('created_at', Carbon::now())->get(), true);

        // Initialize an empty array to store the total quantity of each product
        $productQuantity = [];

        foreach (Invoice::whereDate('created_at', Carbon::now())->get() as $invoice) {
            $products = json_decode($invoice['products'], true);
            foreach ($products as $product) {
                $productName = $product['name'];
                $productQuantity[$productName] = isset($productQuantity[$productName])
                    ? $productQuantity[$productName] + $product['quantity']
                    : $product['quantity'];
            }
        }

        // Count the top quantity and product name
        $maxProduct = '';
        $maxQuantity = 0;
        foreach ($productQuantity as $product => $quantity) {
            if ($quantity > $maxQuantity) {
                $maxProduct = $product;
                $maxQuantity = $quantity;
            }
        }

        return array('maxProduct' => $maxProduct, 'maxQuantity' => $maxQuantity);
    }

    //----------------------------------------------------- Counting the total number of order(in the current date)

    public function dailyOrder()
    {
        return Invoice::whereDate('created_at', Carbon::now())->count();
    }

    //----------------------------------------------------- Counting the total of sell amount

    public function dailySellAmount()
    {
        $invoices = Invoice::whereDate('created_at', Carbon::now())->get();
        $totalSellAmount = null;
        foreach ($invoices as $invoice) {
            $totalSellAmount += $invoice->total;
        }
        return $totalSellAmount;
    }

    //----------------------------------------------------- Counting the total of sell amount

    public function dailyDueAmount()
    {
        $invoices = Invoice::whereDate('created_at', Carbon::now())->get();
        $totalDueAmount = null;
        foreach ($invoices as $invoice) {
            $totalDueAmount += $invoice->due;
        }
        return $totalDueAmount;
    }

    //----------------------------------------------------- Counting the total of profit

    public function dailyProfit()
    {
        $profit = null;
        $invoices = Invoice::whereDate('created_at', Carbon::now())->get();
        foreach ($invoices as $invoice) {
            $profit += $invoice->profit;
        }
        return $profit;
    }

    public function currentWeekProfit()
    {
        $profit = null;
        $startDate = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->endOfWeek();

        $invoices = Invoice::whereBetween('created_at', [$startDate, $endDate])->get();

        foreach ($invoices as $invoice) {
            $profit += $invoice->profit;
        }

        return $profit;
    }

    public function currentMonthProfit()
    {
        $profit = null;
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $invoices = Invoice::whereBetween('created_at', [$startDate, $endDate])->get();

        foreach ($invoices as $invoice) {
            $profit += $invoice->profit;
        }

        return $profit;
    }
}
