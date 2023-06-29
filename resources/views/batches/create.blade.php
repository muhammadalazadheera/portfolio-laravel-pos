@extends('layouts.layout')
@section('title','Add a new product')

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
</style>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush


@section('main')
<form method="POST" action="{{ route('batches.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row" x-data="{ 
        quantity: 0, 
        purchase_price: 0, 
        total_purchase_price: 0,
        status: '',
        paid: true,
        
        disableAmount(){
            if(this.status == 'paid'){
                return this.paid = true;
            }else{
                this.paid = false;
            }
        }
    }" x-effect="total_purchase_price = quantity * purchase_price">
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
                    <h5>Add a new batch of product</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="products">Select A Product</label>
                        <select class="form-control js-example-basic-single" name="product" id="products">
                            @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantity <small class="text-info">[Piece]</small></label>
                        <input x-model.number="quantity" type="number" class="form-control" id="name" name="quantity"
                            placeholder="Quantity">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Per Unit Purchase Price <small
                                class="text-info">[Taka]</small></label>
                        <input x-model="purchase_price" type="number" class="form-control" id="name"
                            name="purchase_price" x-model.number="purchase_price" placeholder="Per Unit Purchase Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Per Unit Sell Price <small
                                class="text-info">[Taka]</small></label>
                        <input type="number" class="form-control" id="name" name="sell_price"
                            placeholder="Per Unit Sell Price">
                    </div>

                    <button type="submit" class="btn  btn-primary">Add Batch</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h5>-</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="supplier">Supplier</label>
                        <select class="form-control js-examples-basic-multiple" name="supplier" id="supplier">
                            @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Purchase Cost <small
                                class="text-info">[Taka]</small></label>
                        <input type="number" class="form-control" id="name" name="total_purchase_price"
                            placeholder="Total Purchase Cost" x-model="total_purchase_price">
                    </div>
                    <div class="form-group">
                        <label for="status">Payment Status:</label>
                        <select name="status" id="status" class="form-control" x-model="status"
                            x-on:change="disableAmount()">
                            <option disabled selected>Payment Status</option>
                            @foreach(['paid', 'partial', 'due'] as $option)
                            <option value="{{ $option }}">{{
                                ucfirst($option) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Paid Amount <small class="text-info">[Taka]</small></label>
                        <input type="number" class="form-control" id="name" name="total_purchase_cost"
                            placeholder="Total Purchase Cost" x-bind:disabled="paid">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Due Amount <small class="text-info">[Taka]</small></label>
                        <input type="number" class="form-control" id="name" name="total_purchase_cost"
                            placeholder="Total Purchase Cost">
                    </div>
                </div>
            </div>
        </div>
</form>
<p>Payment Status: <span x-text="paid"></span></p>
</div>
@endsection

@push('scripts')
<script src="./script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#products').select2({
            placeholder: "Select categories.",
        });

        $('#supplier').select2({
        placeholder: "Select categories.",
        });
    });
</script>
@endpush