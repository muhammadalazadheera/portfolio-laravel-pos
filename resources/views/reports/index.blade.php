@extends('layouts.layout')

@section('title','Reports')

@push('css')
<style>
    table.GeneratedTable {
        width: 100%;
        background-color: #ffffff;
        border-collapse: collapse;
        border-width: 1px;
        border-color: #d1d1d1;
        border-style: solid;
        color: #3b3b3b;
    }

    table.GeneratedTable th {
        border: 1px solid #6b6b6b;
        padding: 10px 5px;
    }

    table.GeneratedTable td {
        border-width: 1px;
        border-color: #6b6b6b;
        border-style: solid;
        padding: 5px;
    }

    table.GeneratedTable thead {
        background-color: #d2ffee;
    }

    .border-dark {
        border-color: black;
    }
</style>
@endpush

@section('main')

@if (isset($_GET['range']))
@if ($_GET['range'] == 'set_custom_range')
<div class="card">
    <div class="card-header">
        <h5>Select A Date Range</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('reports') }}" method="GET">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="birthday">To:</label>
                        <input class="form-control" type="date" id="birthday" name="to" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="birthday">From:</label>
                        <input class="form-control" type="date" id="birthday" name="from" required>
                        <input type="hidden" name="range" value="custom">
                    </div>
                </div>
            </div>
            <input class="btn btn-info btn-block" type="submit">
        </form>
    </div>
</div>
@endif
@endif



@if (isset($_GET['range']) && $_GET['range'] != 'set_custom_range')
<div class="card">
    <div class="card-header">
        <h5>Product report</h5>
    </div>
    <div class="card-body">
        <table class="GeneratedTable">
            <thead>
                <tr>
                    <th class="text-center" colspan="2"><i>Oslo Mobile Mart</i><br>
                        <b class="text-capitalize">
                            {{ $_GET['range'] }} Report
                        </b>
                        <br>
                        @if ($_GET['range'] == 'daily')
                        <small>{{
                            \Carbon\Carbon::now()->format('d F, Y') }}
                        </small>
                        @elseif ($_GET['range'] == 'monthly')
                        <small>{{
                            \Carbon\Carbon::now()->format('F, Y') }}
                        </small>
                        @elseif ($_GET['range'] == 'yearly')
                        <small>{{
                            \Carbon\Carbon::now()->format('Y') }}
                        </small>
                        @elseif ($_GET['range'] == 'custom')
                        <small>
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $_GET['to'])->format('d F, Y') }} to
                            {{ \Carbon\Carbon::createFromFormat('Y-m-d', $_GET['from'])->format('d F, Y') }}
                        </small>
                        @endif

                        <br>
                        @if ($_GET['range'] == 'daily')
                        <small>
                            {{ \Carbon\Carbon::parse(\Carbon\Carbon::now())->dayName; }}
                        </small>
                        @endif

                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="text-center text-light bg-dark border-dark" colspan="2">Product Report</th>
                </tr>
                @if (isset($_GET['range']) && $_GET['range'] == 'daily')
                <tr>
                    <th>Total Product <span class="text-success">(Instock)</span>
                    </th>
                    <td>{{ $report['productsCount'] }}<small>pc</small></td>
                </tr>
                <tr>
                    <th>Total Product <span class="text-danger">(Out of Stock)</span></th>
                    <td>{{ $report['outOfStockProducts'] }}<small>pc</small></td>
                </tr>
                @endif

                <tr>
                    <th>Total Sold Product</th>
                    <td>{{ $report['soldProducts'] }}<small>pc</small></td>
                </tr>
                <tr>
                    <th>Top Sold Product</th>
                    <td>
                        {{ $report['topSoldProduct']['maxProduct'] }}
                        {{ $report['topSoldProduct']['maxQuantity'] }}
                        <small>pc</small>
                    </td>
                </tr>
                <tr>
                    <th class="text-center text-light bg-dark border-dark" colspan="2">Sell Report</th>
                </tr>
                <tr>
                    <th>Total Invoice</th>
                    <td>{{ $report['totalOrder'] }}<small></small></td>
                </tr>
                <tr>
                    <th>Total Sell Amount</th>
                    <td>{{ (int) $report['totalSellAmount'] }}<small>tk</small></td>
                </tr>
                <tr>
                    <th>Total Paid Amount</th>
                    <td>{{
                        (int) $report['totalSellAmount'] - (int)
                        $report['totalDueAmount'] }}<small>tk</small></td>
                </tr>
                <tr>
                    <th>Total Due Amount</th>
                    <td>{{ (int) $report['totalDueAmount'] }}<small>tk</small></td>
                </tr>
                <tr>
                    <th>Total Profit</th>
                    <td>{{ (int) $report['profit'] }}<small>tk</small></td>
                </tr>
                <tr>
                    <th class="text-center text-light bg-dark border-dark" colspan="2">Expense Report</th>
                </tr>
                <tr>
                    <th>Total Expense</th>
                    <td>{{ (int) $report['totalExpense'] }}<small>tk</small></td>
                </tr>
                <tr>
                    <th>Top Expense Criteria</th>
                    <td>{{ $report['topExpenseCategory'] }}<small></small></td>
                </tr>
            </tbody>
        </table>
        <div class="row m-t-10">
            <div class="col-6">
                <button class="btn border-dark btn-block"><i class="feather icon-printer"></i> Print</button>
            </div>
            <div class="col-6">
                <button class="btn border-dark btn-block"><i class="feather icon-download"></i> Download</button>
            </div>
        </div>
    </div>

</div>
@endif


@endsection

@push('scripts')
@endpush