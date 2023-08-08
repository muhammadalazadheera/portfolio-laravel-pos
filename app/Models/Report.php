<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;


    public function getReport($range,  $to, $from)
    {

        $startDate = null;
        $endDate = null;

        switch ($range) {
            case 'daily':
                $startDate = Carbon::now()->startOfDay();
                $endDate = Carbon::now()->endOfDay();
                break;
            case 'weekly':
                $startDate = Carbon::now()->startOfWeek();
                $endDate = Carbon::now()->endOfWeek();
                break;
            case 'monthly':
                $startDate = Carbon::now()->startOfMonth();
                $endDate = Carbon::now()->endOfMonth();
                break;
            case 'yearly':
                $startDate = Carbon::now()->startOfYear();
                $endDate = Carbon::now()->endOfYear();
                break;
            case 'custom':
                $startDate = $to;
                $endDate = $from;
                break;
            default:
                // Invalid range, handle the error or set default behavior here.
                return null;
        }

        // 1 ----------------------------------------------------- Counting the total products available in stock
        $productsCount = 0;
        $batches = Batch::all();
        foreach ($batches as $batch) {
            $productsCount += $batch->rem_quantity;
        }

        // 2 ----------------------------------------------------- Counting the out of stock products
        $outOfStockProducts = Batch::where('rem_quantity', '==', 0)->count();

        // 3 ----------------------------------------------------- Counting the total sold product (in the current date)
        $soldProducts = 0;
        $invoices = Invoice::whereBetween('created_at', [$startDate, $endDate])->get();
        foreach ($invoices as $invoice) {
            foreach (json_decode($invoice->products) as $p) {
                $soldProducts += $p->quantity;
            }
        }

        // 4 ----------------------------------------------------- Counting the top sold product

        // Decode JSON data into a PHP array
        $invoices = json_decode(Invoice::whereBetween('created_at', [$startDate, $endDate])->get(), true);

        // Initialize an empty array to store the total quantity of each product
        $productQuantity = [];

        foreach (Invoice::whereBetween('created_at', [$startDate, $endDate])->get() as $invoice) {
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

        $topSoldProduct = array('maxProduct' => $maxProduct, 'maxQuantity' => $maxQuantity);

        // 5 ----------------------------------------------------- Counting the total number of order(in the current date)
        $totalOrder = Invoice::whereBetween('created_at', [$startDate, $endDate])->count();

        //----------------------------------------------------- Counting the total of sell amount
        $invoices = Invoice::whereBetween('created_at', [$startDate, $endDate])->get();
        $totalSellAmount = null;
        foreach ($invoices as $invoice) {
            $totalSellAmount += $invoice->total;
        }

        // 6 ----------------------------------------------------- Counting the total of sell amount
        $invoices = Invoice::whereBetween('created_at', [$startDate, $endDate])->get();
        $totalDueAmount = null;
        foreach ($invoices as $invoice) {
            $totalDueAmount += $invoice->due;
        }

        // 7 ----------------------------------------------------- Counting the total of profit
        $profit = null;
        $invoices = Invoice::whereBetween('created_at', [$startDate, $endDate])->get();
        foreach ($invoices as $invoice) {
            $profit += $invoice->profit;
        }


        // 8 ----------------------------------------------------- Counting the total expense

        $expenses = Expense::whereBetween('created_at', [$startDate, $endDate])->get();
        $totalExpense = null;
        foreach ($expenses as $key => $expense) {
            $totalExpense += $expense->amount;
        }

        // 9 ----------------------------------------------------- Top Expese Type

        $topExpenseCategory = null;
        $topCategoryId = Expense::whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('type_id')
            ->selectRaw('type_id, COUNT(*) as total_expenses')
            ->orderByDesc('total_expenses')
            ->value('type_id');

        if ($topCategoryId != null) {
            $topExpenseCategory = Type::find((int) $topCategoryId)->name;
        }
        return [
            'productsCount' => $productsCount,
            'outOfStockProducts' => $outOfStockProducts,
            'soldProducts' => $soldProducts,
            'topSoldProduct' => $topSoldProduct,
            'totalOrder' => $totalOrder,
            'profit' => $profit,
            'totalDueAmount' => $totalDueAmount,
            'totalSellAmount' => $totalSellAmount,
            'totalExpense' => $totalExpense,
            'topExpenseCategory' => $topExpenseCategory
        ];
    }
}
