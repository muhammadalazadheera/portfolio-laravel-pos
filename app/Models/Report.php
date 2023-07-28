<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Report extends Model
{
    use HasFactory;

    public function productInStock()
    {
        $productsCount = 0;
        $batches = Batch::all();
        foreach ($batches as $batch) {
            $productsCount += $batch->rem_quantity;
        }
        return $productsCount;
    }

    public function outOfStockProducts()
    {
        return Batch::where('rem_quantity', '==', 0)->count();
    }

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
}
