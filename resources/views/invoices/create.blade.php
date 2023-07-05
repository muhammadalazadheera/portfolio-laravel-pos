@extends('layouts.layout')
@section('title','Create a new invoice.')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container--default .select2-selection--single {
        background-color: #fff;
        border: 2px solid rgba(0, 0, 0, 0.15);
        border-radius: 0px;
        height: 49px;
    }

    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 45px;
        margin-left: 10px;
    }

    .select2-container--default .select2-selection--single .select2-selection__arrow {
        top: 10px;
        right: 5px;
    }

    .invoice-table {
        width: 90%;
        margin-bottom: 10px;
    }

    .invoice-table td {
        padding: 4px;
    }

    .invoice-table th {
        padding-left: 10px;
    }

    .invoice-input {
        padding-left: 7px;
        margin: 7px 0 7px 7px;
        height: 35px;
    }

    .invoice-close {
        padding: 0 5px !important;
        border: 2px solid darksalmon !important;
        border-radius: 50%;

    }

    .invoice-close:focus-visible {
        border: none !important;
    }
</style>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush


@section('main')
<form method="POST" action="" x-effect="calculateTotal()" x-data="{
    quantity: null,
    price: null,
    subTotal:null,
    calculateTotal: function(i) { 
       if(i){
        let price = this.$refs['price-' + i].value;
        let quantity = this.$refs['quantity-' + i].value;
        let subTotalAmount = quantity * price;
        this.$refs['subTotal-' + i].value = subTotalAmount;
       }
    },
}">
    @csrf
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h5>Create Invoice</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="products">Select A Product</label>
                        <select class="form-control js-example-basic-single" name="product_id" id="products">
                            <option></option>
                            @foreach ($batches as $product)
                            <option product_price="{{ $product->sell_price}}" value="{{ $product->product->name}}">{{
                                $product->product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="customers">Customer</label>
                        <label for="products">Select A Product</label>
                        <select class="form-control js-example-basic-single" name="product_id" id="customers">
                            <option></option>
                            @foreach ($customers as $customer)
                            <option value="{{ $customer->id}}">{{ $customer->name }} - ({{ $customer->phone }})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Payment Status<small class="text-info">[Taka]</small></label>
                        <select name="status" id="status" class="form-control">
                            <option></option>
                            <option value="paid">Paid</option>
                            <option value="partial">Partial</option>
                            <option value="due">Due</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Payment Status:</label>
                    </div>
                    <table>
                        <tr>
                            <th>Quantity</th>
                            <td>:</td>
                            <td></td>
                            <td class="text-info">box</td>
                        </tr>
                        <tr>
                            <th>Unit Price</th>
                            <td>:</td>
                            <td></td>
                            <td class="text-info">taka</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td></td>
                            <td class="text-info">--</td>
                        </tr>
                        <tr class="text-info">
                            <th>Total Amount</th>
                            <td>:</td>
                            <td></td>
                            <td class="text-info">taka</td>
                        </tr>
                        <tr class="text-success">
                            <th>Paid Amount</th>
                            <td>:</td>
                            <td></td>
                            <td class="text-info">taka</td>
                        </tr>
                        <tr class="text-danger">
                            <th>Due Amount</th>
                            <td>:</td>
                            <td></td>
                            <td class="text-info">taka</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-header">
                    <h5>Invoice Details</h5>
                </div>
                <div class="card-body">
                    <table class="invoice-table" id="invoiceTable">
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Sell Price</th>
                            <th>Sub Total</th>
                        </tr>
                    </table>
                    <button id="createInvoiceBtn" style="display: none;" type="submit"
                        class="btn  btn-primary btn-sm show btn-block">Create
                        Invoice</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    function checkRow () {
        let rowCount = $('#invoiceTable').find('tr').length
        if(rowCount <= 1){
            $('#createInvoiceBtn').hide();
            $('#products').val(null);
        }else{
            $('#createInvoiceBtn').show();
        }
    }

    

    function removeRow (i) {
        $('#row-'+i).remove();
        checkRow();
    }  

    $(document).ready(function() {
        let i = 0;
        $('#products').select2({
            placeholder: "Please select a product",
            containerCssClass: "form-control-sm",
        }).on('change', function(event){
            
            let product_price = $('#products option:selected').attr('product_price');
            let name = $('#products').val();
            i += 1;
            
            $('#invoiceTable').append(`<tr id="row-${i}" class="border-bottom border-dark single-product">
                <td><input class="invoice-input" type="text" name="products[${i}][name]" value="${name}" readonly></td>
                <td>
                    <input x-ref="quantity-${i}" class="invoice-input quantity" type="number" name="products[${i}][quantity]" placeholder="Quantity" x-on:input="calculateTotal(${i})">
                </td>
                <td>
                    <input x-ref="price-${i}" class="invoice-input price" type="number" name="products[${i}][price]" value="${product_price}" x-on:input="calculateTotal(${i})">
                </td>
                <td>
                    <input x-ref="subTotal-${i}" class="invoice-input sub_total" type="number" name="products[${i}][total]" placeholder="Sub Total">
                </td>
                <td>
                    <button onclick="removeRow(${i})" type="button" class="close invoice-close" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                </td>
            </tr>`);
            
            checkRow();
            
        });

    });
</script>

<script>
    $(document).ready(function(){
        $('#customers').select2({
        placeholder: "Select a customer",
        });
        
        $('#status').select2({
        placeholder: "Payment Status",
        });
    });
</script>
@endpush