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

        <!-- widget primary card end -->
    </div>
    <!-- table card-1 end -->
    <!-- table card-2 start -->
    <div class="col-md-12 col-xl-6">
        <div class="card flat-card">
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-2">
                            <i class="icon feather icon-share-2 text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-10 text-md-center">
                            <h5>Toal Order</h5>
                            <span>{{ $totalOrder }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <i class="icon feather icon-wifi text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-10 text-md-center">
                            <h5>Total Sell Amount</h5>
                            <span>{{ (int) $dailySellAmount }}/-</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-2">
                            <i class="icon feather icon-rotate-ccw text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-10 text-md-center">
                            <h5>Total Paid Amount</h5>
                            <span>{{ $dailyPaidAmount }}/-</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <i class="icon feather icon-shopping-cart text-c-blue mb-1 d-blockz"></i>
                        </div>
                        <div class="col-sm-10 text-md-center">
                            <h5>Total Due Amount</h5>
                            <span>{{ (int) $dailyDueAmount }}/-</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- widget-success-card end -->
    </div>
    <!-- table card-2 end -->
    <div class="col-xl-6 col-md-12">
        <div class="card latest-update-card">
            <div class="card-header">
                <h5>Profit Updates</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                        maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                                        Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                            class="feather icon-minus"></i> collapse</span><span style="display:none"><i
                                            class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                    reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                    remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="latest-update-box">
                    <div class="row p-t-30 p-b-30">
                        <div class="col-auto text-right update-meta">
                            <p class="text-muted m-b-0 d-inline-flex">Today</p>
                            <i class="feather icon-briefcase bg-twitter update-icon"></i>
                        </div>
                        <div class="col">
                            <a href="#!">
                                <h6>{{ $profit }} TK</h6>
                            </a>
                        </div>
                    </div>
                    <div class="row p-b-30">
                        <div class="col-auto text-right update-meta">
                            <p class="text-muted m-b-0 d-inline-flex">This Week</p>
                            <i class="feather icon-briefcase bg-c-red update-icon"></i>
                        </div>
                        <div class="col">
                            <a href="#!">
                                <h6>{{ $weeklyProfit }} TK</h6>
                            </a>
                        </div>
                    </div>
                    <div class="row p-b-0">
                        <div class="col-auto text-right update-meta">
                            <p class="text-muted m-b-0 d-inline-flex">This Month</p>
                            <i class="feather icon-briefcase bg-facebook update-icon"></i>
                        </div>
                        <div class="col">
                            <a href="#!">
                                <h6>{{ $monthlyProfit }} TK</h6>
                                <p>September</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-12">
        <div class="card table-card">
            <div class="card-header">
                <h5>Recent Invoices</h5>
                <div class="card-header-right">
                    <div class="btn-group card-option">
                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="feather icon-more-horizontal"></i>
                        </button>
                        <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                            <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i>
                                        maximize</span><span style="display:none"><i class="feather icon-minimize"></i>
                                        Restore</span></a></li>
                            <li class="dropdown-item minimize-card"><a href="#!"><span><i
                                            class="feather icon-minus"></i> collapse</span><span style="display:none"><i
                                            class="feather icon-plus"></i> expand</span></a></li>
                            <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i>
                                    reload</a></li>
                            <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i>
                                    remove</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Total</th>
                                <th>Due</th>
                                <th>Profit</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($currentDateInvoices as $key=>$invoice)

                            @endforeach
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $invoice->customer->name }}</td>
                                <td>{{ $invoice->total }} <small>tk</small></td>
                                <td>{{ $invoice->due }} <small>tk</small></td>
                                <td>{{ $invoice->profit }} <small>tk</small></td>
                                <td class="text-right"><label class="badge badge-light-danger"><a
                                            href="{{ route('invoices.show',$invoice->id) }}"><i
                                                class="icon feather icon-eye"></i></a></label></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection