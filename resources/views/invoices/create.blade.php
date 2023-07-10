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
<form method="POST" action="{{ route('invoices.store') }}" x-effect="calculateTotal()" x-data="
{
    removeRow: function(i){
        this.$refs['row-' + i].remove();
        let rowCount = this.$refs.invoiceTable.rows.length;
        this.$refs.product.value = null;

        if(rowCount == 1){
            this.$refs.createInvoiceBtn.style.display = 'none';
        }
        
        this.$refs.paid.value = 0;
        this.calculateTotal();
    },

    setStatus: function(){
       let total_amount = $('#total').val();
       let paid_amount = $('#paid').val();
       let due_amount = $('#due_amount').val();

       if(total_amount){
        if(due_amount == total_amount){
            $('#status').val('due');
            $('#status').trigger('change');
        }else if(due_amount == 0){
            $('#status').val('paid');
            $('#status').trigger('change');
        }else{
            $('#status').val('partial');
            $('#status').trigger('change');
        }
       }
    },

    calculateTotal: function(refs) {
        let total = 0;
        let inputFields = document.querySelectorAll('input[id^=\'subTotal-\']');
        inputFields.forEach(input => {
            total += parseFloat(input.value);
        });
        this.$refs.total.value = total;
        this.$refs.paid.value = null;
        this.$refs.due.value = this.$refs.total.value;

        this.setStatus();
    },

    calculateSubTotal: function(i) {
        if (i) {
            let price = parseFloat(this.$refs['price-' + i].value);
            let quantity = parseInt(this.$refs['quantity-' + i].value);
            let subTotalAmount = quantity * price;
            this.$refs['subTotal-' + i].value = subTotalAmount;
        }
        this.calculateTotal();
    },
}
">
    @csrf
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h5>Create Invoice</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="products">Select Product(s)</label>
                        <select class="form-control js-example-basic-single" id="products" x-ref="product">
                            <option></option>
                            @foreach ($batches as $product)
                            <option product_name="{{ $product->product->name}}"
                                product_price="{{ $product->sell_price}}" value="{{ $product->id}}">{{
                                $product->product->name }} - <span>Purchase Price: {{ $product->purchase_price
                                    }} tk/-</span></option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="customers">Customer</label>
                        <select class="form-control js-example-basic-single" name="customer_id" id="customers">
                            <option></option>
                            @foreach ($customers as $customer)
                            <option value="{{ $customer->id}}">{{ $customer->name }} - ({{ $customer->phone }})
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="total">Total <small class="text-info">[Taka]</small></label>
                        <input type="number" class="form-control" id="total" x-ref="total" name="total"
                            placeholder="Total Purchase Cost">
                    </div>
                    <div class="form-group">
                        <label for="paid">Paid <small class="text-info">[Taka]</small></label>
                        <input type="number" class="form-control" id="paid" x-ref="paid" placeholder="Paid Amount"
                            x-on:input="$refs.due.value = $refs.total.value - $refs.paid.value" x-on:blur="setStatus()">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Due<small class="text-info">[Taka]</small></label>
                        <input type="number" class="form-control" id="due_amount" x-ref="due" name="due_amount"
                            placeholder="Due Amount" x-on:input="$refs.paid.value = $refs.total.value - $refs.due.value"
                            x-on:blur="setStatus()">
                    </div>
                    <div class="form-group">
                        <label for="status">Payment Status<small class="text-info">[Taka]</small></label>
                        <select name="status" id="status" x-ref="status" class="form-control" readonly required>
                            <option></option>
                            <option value="paid">Paid</option>
                            <option value="partial">Partial</option>
                            <option value="due">Due</option>
                        </select>
                    </div>
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
                    <h5>Products Details</h5>
                </div>
                <div class="card-body">
                    <table class="invoice-table" id="invoiceTable" x-ref="invoiceTable">
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Sell Price</th>
                            <th>Sub Total</th>
                        </tr>
                    </table>
                    <button x-ref="createInvoiceBtn" id="createInvoiceBtn" style="display: none;" type="submit"
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
    function calculateTotal(){
        let total = 0;
        let inputFields = document.querySelectorAll('input[id^=\'subTotal-\']');
        inputFields.forEach(input => {
            total += parseFloat(input.value);
        });
        $('#total').val(total);
        $('#paid').val(null);
        let due_amount = $('#due_amount').val();
        due_amount = $('#total').val();
    }

    function checkRow () {
        let rowCount = $('#invoiceTable').find('tr').length
        if(rowCount <= 1){
            $('#createInvoiceBtn').hide();
            $('#products').val(null);
        }else{
            $('#createInvoiceBtn').show();
        }

        if(rowCount == 2){
            let firstProductPrice = $('#price-1').val()
            $('#total').val(firstProductPrice);
            $('#due_amount').val(firstProductPrice);
            $('#status').val('due').change();
        }

        if(rowCount == 3){
            let firstProductPrice = $('#price-1').val()
            $('#total').val(firstProductPrice);
            $('#due_amount').val(firstProductPrice);
            $('#status').val('due').change();
        }
    }
 

    $(document).ready(function() {
        
        let i = 0;
        $('#products').select2({
            placeholder: "Please select a product",
            containerCssClass: "form-control-sm",
        }).on('change', function(event){
            
            let product_name = $('#products option:selected').attr('product_name');
            let product_price = $('#products option:selected').attr('product_price');
            let batch_id = $('#products').val();
            i += 1;


            
            $('#invoiceTable').append(`<tr id="row-${i}" x-ref="row-${i}" class="border-bottom border-dark single-product">
                <input type="hidden" name="products[${i}][batch_id]" value="${batch_id}">
                <td><input class="invoice-input" type="text" name="products[${i}][name]" value="${product_name}" readonly></td>
                <td>
                    <input x-ref="quantity-${i}" class="invoice-input quantity" type="number" name="products[${i}][quantity]" x-on:input="calculateSubTotal(${i})" min="1" value="1" required>
                </td>
                <td>
                    <input id="price-${i}" x-ref="price-${i}" class="invoice-input price" type="number" name="products[${i}][price]" value="${product_price}" x-on:input="calculateSubTotal(${i})" required>
                </td>
                <td>
                    <input id="subTotal-${i}" x-ref="subTotal-${i}" class="invoice-input sub_total" type="number" name="products[${i}][total]" required value="${product_price}">
                </td>
                <td>
                    <button @click="removeRow(${i})" type="button" class="close invoice-close" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                    </button>
                </td>
            </tr>`);
            
            checkRow();

            calculateTotal();
            
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