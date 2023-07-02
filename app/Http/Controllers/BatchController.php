<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Product;
use App\Models\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches = Batch::all();
        return view('batches.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('batches.create', compact('products', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'quantity' => 'required',
            'purchase_price' => 'required',
            'sell_price' => 'required',
            'supplier_id' => 'required',
            'total_purchase_cost' => 'required',
            'due_amount' => 'required',
            'status' => 'required',
        ]);

        $batch = new Batch();

        $batch->batch_no = 'batch-' . Str::random(5) . '-' . Carbon::now()->format('D-M-Y');
        $batch->product_id = $request->product_id;
        $batch->quantity = $request->quantity;
        $batch->purchase_price = $request->purchase_price;
        $batch->sell_price = $request->sell_price;
        $batch->supplier_id = $request->supplier_id;
        $batch->total_purchase_cost = $request->total_purchase_cost;
        $batch->due_amount = $request->due_amount;
        $batch->status = $request->status;
        $batch->save();

        return redirect()->route('batches.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Batch $batch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Batch $batch,  Request $request)
    {

        $type = $request->type;
        $products = Product::all();
        $suppliers = Supplier::all();

        return view('batches.edit', compact('batch', 'products', 'suppliers', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Batch $batch)
    {

        if ($request->type === 'adjust_payment') {
            $request->validate([
                'status' => 'required',
                'due_amount' => 'required'
            ]);

            $batch->status = $request->status;
            $batch->due_amount = $request->due_amount;
        } else {

            if ($batch->status == 'paid' && $request->status == 'partial') {
                $batch->status = 'partial';
            } elseif ($batch->status == 'paid' && $request->status == 'due') {
                $batch->status = 'partial';
            } elseif ($batch->status == 'due' && $request->status == 'paid') {
                $batch->status = 'partial';
            }
        }

        $batch->quantity = $batch->quantity + $request->quantity;
        $batch->total_purchase_cost = $batch->total_purchase_cost + $request->total_purchase_cost;
        $batch->due_amount = $request->due_amount;
        $batch->update();
        return redirect()->route('batches.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();
        return redirect()->back();
    }
}
