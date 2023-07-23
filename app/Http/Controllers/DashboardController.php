<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Invoice;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        // Counting products in stock
        $productsCount = 0;
        $batches = Batch::all();
        foreach ($batches as $batch) {
            $productsCount += $batch->rem_quantity;
        }

        // Counting products in stock
        $ouStockProducts = Batch::where('rem_quantity', '==', 0)->count();

        // Top sold product
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

        $maxProduct = '';
        $maxQuantity = 0;
        foreach ($productQuantity as $product => $quantity) {
            if ($quantity > $maxQuantity) {
                $maxProduct = $product;
                $maxQuantity = $quantity;
            }
        }



        // Sold product count
        $soldProducts = 0;
        $invoices = Invoice::whereDate('created_at', Carbon::today())->get();
        foreach ($invoices as $invoice) {
            foreach (json_decode($invoice->products) as $p) {
                $soldProducts += $p->quantity;
            }
        }

        return view('welcome', compact('productsCount', 'soldProducts', 'ouStockProducts', 'maxProduct', 'maxQuantity'));
    }
}
