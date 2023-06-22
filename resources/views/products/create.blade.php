@extends('layouts.layout')
@section('title','Add a new product')

@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css'>
<style>
    .select2-container--default .select2-selection--multiple {
        border-radius: 0px !important;
        border: 2px solid rgba(0, 0, 0, 0.15) !important;
        padding: 8px 5px 13px 15px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #1abc9c;
        border-radius: 0px;
        border: 1px solid #000000;
        color: #ffffff;
        padding-left: 40px;
        padding-right: 15px;
    }


    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        background-color: #fff;
        border: none;
        border-radius: 0;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover,
    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:focus {
        background-color: #ff6161;
        color: #ffffff;
    }
</style>
@endpush


@section('main')
<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5>Add a new product</h5>
            </div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Product Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Product Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Add A Brief Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select A Brand</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option selected disabled>Please select a brand</option>
                            <option>Samsung</option>
                            <option>Iphone</option>
                            <option>Nokia</option>
                            <option>Oppo</option>
                            <option>Xiaomi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categories">Select Categories</label>
                        <select class="form-control js-examples-basic-multiple" name="categories[]" id="categories"
                            multiple resolve>
                            <option>2/16</option>
                            <option>3/32</option>
                            <option>4/64</option>
                            <option>5" Display</option>
                            <option>6" Display</option>
                        </select>
                    </div>
                    <button type="submit" class="btn  btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="image">Product Name</label>
                    <input type="file" class="dropify form-control" id="image">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src='https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js'></script>
<script src="./script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" />
<script>
    $(document).ready(function() {
        $('.js-examples-basic-multiple').select2({
            placeholder: "Select categories.",
        });

        $('.dropify').dropify();
    });
</script>
@endpush