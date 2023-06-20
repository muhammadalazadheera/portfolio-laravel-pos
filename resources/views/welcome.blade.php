@extends('layouts.layout')
@section('title','Home')

@section('main')
<div class="row">
    <!-- table card-1 start -->
    <div class="col-md-12 col-xl-4">
        <div class="card flat-card">
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-eye text-c-green mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>10k</h5>
                            <span>Visitors</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-music text-c-red mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>100%</h5>
                            <span>Volume</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-file-text text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>2000 +</h5>
                            <span>Files</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-mail text-c-yellow mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>120</h5>
                            <span>Mails</span>
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
    <div class="col-md-12 col-xl-4">
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
    <!-- Widget primary-success card start -->
    <div class="col-md-12 col-xl-4">
        <div class="card support-bar overflow-hidden">
            <div class="card-body pb-0">
                <h2 class="m-0">350</h2>
                <span class="text-c-blue">Support Requests</span>
                <p class="mb-3 mt-3">Total number of support requests that come in.</p>
            </div>
            <div id="support-chart"></div>
            <div class="card-footer bg-primary text-white">
                <div class="row text-center">
                    <div class="col">
                        <h4 class="m-0 text-white">10</h4>
                        <span>Open</span>
                    </div>
                    <div class="col">
                        <h4 class="m-0 text-white">5</h4>
                        <span>Running</span>
                    </div>
                    <div class="col">
                        <h4 class="m-0 text-white">3</h4>
                        <span>Solved</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Widget primary-success card end -->

    <!-- seo start -->
    <div class="col-xl-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3>$16,756</h3>
                        <h6 class="text-muted m-b-0">Visits<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
                    </div>
                    <div class="col-6">
                        <div id="seo-chart1" class="d-flex align-items-end"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3>49.54%</h3>
                        <h6 class="text-muted m-b-0">Bounce Rate<i class="fa fa-caret-up text-c-green m-l-10"></i></h6>
                    </div>
                    <div class="col-6">
                        <div id="seo-chart2" class="d-flex align-items-end"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h3>1,62,564</h3>
                        <h6 class="text-muted m-b-0">Products<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
                    </div>
                    <div class="col-6">
                        <div id="seo-chart3" class="d-flex align-items-end"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- seo end -->

    <!-- Latest Customers start -->
    <div class="col-lg-12 col-md-12">
        <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Total Leads</h5>
                        <p class="text-c-green f-w-500"><i class="fa fa-caret-up m-r-15"></i> 18% High than
                            last
                            month</p>
                        <div class="row">
                            <div class="col-4 b-r-default">
                                <p class="text-muted m-b-5">Overall</p>
                                <h5>76.12%</h5>
                            </div>
                            <div class="col-4 b-r-default">
                                <p class="text-muted m-b-5">Monthly</p>
                                <h5>16.40%</h5>
                            </div>
                            <div class="col-4">
                                <p class="text-muted m-b-5">Day</p>
                                <h5>4.56%</h5>
                            </div>
                        </div>
                    </div>
                    <div id="tot-lead" style="height:150px"></div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Power</h5>
                        <h2>2789<span class="text-muted m-l-5 f-14">kw</span></h2>
                        <div id="power-card-chart1"></div>
                        <div class="row">
                            <div class="col col-auto">
                                <div class="map-area">
                                    <h6 class="m-0">2876 <span> kw</span></h6>
                                    <p class="text-muted m-0">month</p>
                                </div>
                            </div>
                            <div class="col col-auto">
                                <div class="map-area">
                                    <h6 class="m-0">234 <span> kw</span></h6>
                                    <p class="text-muted m-0">Today</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Temperature</h5>
                        <h2>7.3<span class="text-muted m-l-10 f-14">deg</span></h2>
                        <div id="power-card-chart3"></div>
                        <div class="row">
                            <div class="col col-auto">
                                <div class="map-area">
                                    <h6 class="m-0">4.5 <span> deg</span></h6>
                                    <p class="text-muted m-0">month</p>
                                </div>
                            </div>
                            <div class="col col-auto">
                                <div class="map-area">
                                    <h6 class="m-0">0.5 <span> deg</span></h6>
                                    <p class="text-muted m-0">Today</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Latest Customers end -->
</div>
@endsection