<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $batches = Batch::all();

        //die();
        return view('invoices.create', compact('batches', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        return $request;
        die();

        $productsData = $request->input('products');
        $invoice = new Invoice();
        $invoice->data = $productsData;
        $invoice->save();
        return response()->json(['message' => 'Invoice created successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        foreach ($invoice->data as $data) {
            echo $data['name'];
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
