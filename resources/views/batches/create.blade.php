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
@endpush


@section('main')
<form method="POST" action="{{ route('batches.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
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
                        <label for="exampleInputEmail1">Quantity</label>
                        <input type="number" class="form-control" id="name" name="quantity" placeholder="Quantity">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Per Unit Purchase Price</label>
                        <input type="number" class="form-control" id="name" name="purchase_price"
                            placeholder="Per Unit Purchase Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Per Unit Sell Price</label>
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
                        <label for="products">Supplier</label>
                        <select class="form-control js-examples-basic-multiple" name="product" id="products">
                            @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Total Purchase Cost</label>
                        <input type="number" class="form-control" id="name" name="total_purchase_cost"
                            placeholder="Total Purchase Cost">
                    </div>
                    <div class="form-group">
                        <label for="status">Payment Status:</label>
                        <select name="status" id="status" class="form-control">
                            <option disabled selected>Payment Status</option>
                            @foreach(['paid', 'partial', 'due'] as $option)
                            <option value="{{ $option }}" {{ old('status')==$option ? 'selected' : '' }}>{{
                                ucfirst($option) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Paid Amount</label>
                        <input type="number" class="form-control" id="name" name="total_purchase_cost"
                            placeholder="Total Purchase Cost">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Due Amount</label>
                        <input type="number" class="form-control" id="name" name="total_purchase_cost"
                            placeholder="Total Purchase Cost">
                    </div>
                </div>
            </div>
        </div>
</form>
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
    });
</script>
@endpush