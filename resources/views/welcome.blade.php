@extends('layouts.layout')
@section('title','Home')

@section('main')
<div class="row">
    <div class="col-12">
        <!-- widget-success-card start -->
        <div class="card flat-card widget-purple-card">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <h4>{{ \Carbon\Carbon::now()->format('d/m/y') }}</h4>
                </div>
                <div class="col-sm-9">
                    <h4>Welcome {{ auth()->user()->name }}</h4>
                </div>
            </div>
        </div>
        <!-- widget-success-card end -->
        <!-- alert -->
        <div class="card-header bg-info mb-4">
            <h5 class="text-white">Today's Stat.</h5>
        </div>
        <!-- alert end -->
    </div>
    <!-- table card-1 start -->
    <div class="col-md-12 col-xl-6">

        <div class="card flat-card">
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-2">
                            <i class="icon feather icon-eye text-c-green mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-10 text-md-center">
                            <h5>Products In Stock</h5>
                            <span>{{ $productsCount }}pc</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <i class="icon feather icon-music text-c-red mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-10 text-md-center">
                            <h5>Sold Products</h5>
                            <span>{{ $soldProducts }}pc</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-2">
                            <i class="icon feather icon-file-text text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-10 text-md-center">
                            <h5>Out Of Stock Products</h5>
                            <span>{{ $outOfStockProducts }}pc</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-2 p-r-0">
                            <i class="icon feather icon-mail text-c-yellow mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-10 p-l-0 text-md-center">
                            <h5>Most Sold Products</h5>
                            <span>{{ $maxProduct }} {{ $maxQuantity }}pc</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- widget primary card start -->
        <div class="card flat-card widget-primary-card">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="feather icon-star-on"></i>
                </div>
                <div class="col-sm-9">
                    <h4>4000 +</h4>
                    <h6>Ratings Received</h6>
                </div>
            </div>
        </div>
        <!-- widget primary card end -->
    </div>
    <!-- table card-1 end -->
    <!-- table card-2 start -->
    <div class="col-md-12 col-xl-6">
        <div class="card flat-card">
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-share-2 text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>1000</h5>
                            <span>Shares</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-wifi text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>600</h5>
                            <span>Network</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-rotate-ccw text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>3550</h5>
                            <span>Returns</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-shopping-cart text-c-blue mb-1 d-blockz"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>100%</h5>
                            <span>Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- widget-success-card start -->
        <div class="card flat-card widget-purple-card">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="col-sm-9">
                    <h4>17</h4>
                    <h6>Achievements</h6>
                </div>
            </div>
        </div>
        <!-- widget-success-card end -->
    </div>
    <!-- table card-2 end -->
</div>
@endsection