@extends('layouts.layout')
@section('title','Edit batch {{ $batch->batch_no }}')

@push('css')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<style>
    table tr th,
    td {
        padding: 5px;
    }
</style>
@endpush


@section('main')

@if($type == 'adjust_payment')

<form method="POST" action="{{ url('batches/'.$batch->id.'?type=adjust_payment') }}">
    @csrf
    @method('PUT')
    <div class="row" x-effect="total_purchase_cost = (quantity * purchase_price) + {{ $batch->total_purchase_cost }}"
        x-data="{ 
        total_purchase_cost: {{ $batch->total_purchase_cost }},
        status: '{{ $batch->status }}',
        paid: false,
        payable_amount: 0,
        due_amount: {{ $batch->due_amount }},
    }">
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
                    <h5>Ajust Payment: <span class="badge badge-info">{{ $batch->batch_no
                            }}</span></h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="status">Payment Status:</label>
                        <select name="status" id="status" class="form-control" x-model="status"
                            x-on:change="paid = (status === 'paid' || status ==='due') ? true : false, due_amount = (status === 'paid') ? 0 : {{ $batch->due_amount }}, payable_amount = (status === 'paid') ? {{ $batch->due_amount }} : '' ">
                            <option disabled value="">Payment Status</option>
                            @foreach(['paid', 'partial'] as $option)
                            <option value="{{ $option }}">{{ ucfirst($option)
                                }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="paid_amount">Payable Amount <small class="text-info">[Taka]</small></label>
                        <input type="number" class="form-control" id="paid_amount" placeholder="Paid Amount"
                            x-bind:disabled="paid" x-model.number="payable_amount"
                            x-on:keyup="due_amount = {{ $batch->due_amount }} - payable_amount"
                            max="{{ $batch->due_amount }}">

                        <input type="hidden" name="due_amount" x-model.number="due_amount">
                    </div>
                    <h6 class="text-info">Due Amount: <span class="text-danger" x-text="due_amount"></span> taka</h6>
                    <button type="submit" class="btn  btn-primary">Adjust Payment</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h5>Batch <span class="badge badge-info">{{ $batch->batch_no }}</span> Details:</h5>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Product</th>
                            <td>:</td>
                            <td>{{ $batch->product->name }}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>:</td>
                            <td>{{ $batch->quantity }}</td>
                            <td class="text-info">box</td>
                        </tr>
                        <tr>
                            <th>Unit Price</th>
                            <td>:</td>
                            <td>{{ $batch->purchase_price }}</td>
                            <td class="text-info">taka</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td>{{ ucfirst($batch->status) }}</td>
                            <td class="text-info">--</td>
                        </tr>
                        <tr class="text-info">
                            <th>Total Amount</th>
                            <td>:</td>
                            <td>{{ $batch->total_purchase_cost }}</td>
                            <td class="text-info">taka</td>
                        </tr>
                        <tr class="text-success">
                            <th>Paid Amount</th>
                            <td>:</td>
                            <td>{{ $batch->total_purchase_cost - $batch->due_amount }}</td>
                            <td class="text-info">taka</td>
                        </tr>
                        <tr class="text-danger">
                            <th>Due Amount</th>
                            <td>:</td>
                            <td>{{ $batch->due_amount }}</td>
                            <td class="text-info">taka</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
</form>
</div>
@else

<form method="POST" action="{{ route('batches.update',$batch->id) }}">
    @csrf
    @method('PUT')
    <div class="row"
        x-effect="total_purchase_cost = quantity * purchase_price, due_amount = total_purchase_cost - paid_amount"
        x-data="{ 
        quantity: 0, 
        purchase_price: {{ $batch->purchase_price }}, 
        total_purchase_cost: 0,
        status: '',
        paid: false,
        paid_amount: 0,
        due_amount: 0,
        isGreaterThanZero(pvalue){
            if(pvalue > 0){
                return true;
            }else{
                return false;
            }
        }
    }
    ">
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
                    <h5>Edit Batch <span class="badge badge-info">{{ $batch->batch_no }}</span></h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Quantity <small class="text-info">[Piece]</small></label>
                        <input x-model.number="quantity" type="number" class="form-control" id="name" name="quantity"
                            placeholder="Quantity">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Per Unit Purchase Price <small
                                class="text-info">[Taka]</small></label>
                        <input x-model.number="purchase_price" type="number" class="form-control" id="name"
                            name="purchase_price" value="{{ $batch->purchase_price }}" disabled>
                    </div>

                    <div class="form-group">
                        <label for="name">Total Purchase Cost <small class="text-info">[Taka]</small></label>
                        <input type="number" class="form-control" id="name" name="total_purchase_cost"
                            placeholder="Total Purchase Cost" x-model="total_purchase_cost">
                    </div>
                    <div class="form-group">
                        <label for="status">Payment Status:</label>
                        <select name="status" id="status" class="form-control" x-model="status"
                            x-on:change="paid = (status === 'paid' || status ==='due') ? true : false, paid_amount = (status === 'paid') ? total_purchase_cost : 0">
                            <option disabled value="">Payment Status</option>
                            @foreach(['paid', 'partial', 'due'] as $option)
                            <option value="{{ $option }}">{{ ucfirst($option) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="paid_amount">Paid Amount <small class="text-info">[Taka]</small></label>
                        <input type="number" class="form-control" id="paid_amount" placeholder="Paid Amount"
                            x-bind:disabled="paid" x-model.number="paid_amount"
                            x-on:keyup="due_amount = total_purchase_cost - paid_amount"
                            x-on:change="due_amount = total_purchase_cost - paid_amount">
                    </div>
                    <div class="form-group">
                        <label for="due_amount">Due Amount <small class="text-info">[Taka]</small></label>
                        <input type="number" class="form-control" id="due_amount" name="due_amount"
                            placeholder="Due Amount" x-bind:disabled="paid" x-model.number="due_amount"
                            x-on:keyup="paid_amount = total_purchase_cost - due_amount"
                            x-on:change="paid_amount = total_purchase_cost - due_amount">
                    </div>

                    <button type="submit" class="btn  btn-primary">Edit Batch</button>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h5>Batch <span class="badge badge-info">{{ $batch->batch_no }}</span> Details:</h5>
                </div>
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Product</th>
                            <td>:</td>
                            <td>{{ $batch->product->name }}</td>
                        </tr>
                        <tr>
                            <th>Quantity</th>
                            <td>:</td>
                            <td>{{ $batch->quantity }} <span class="text-success" x-show="isGreaterThanZero(quantity)">
                                    +
                                    <span x-text="quantity"></span></span></td>
                            <td class="text-info">box</td>
                        </tr>
                        <tr>
                            <th>Unit Price</th>
                            <td>:</td>
                            <td>{{ $batch->purchase_price }}</td>
                            <td class="text-info">taka</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:</td>
                            <td>{{ ucfirst($batch->status) }}</td>
                            <td class="text-info">--</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>:</td>
                            <td>{{ $batch->total_purchase_cost }}
                                <span class="text-info" x-show="isGreaterThanZero(total_purchase_cost)"> + <span
                                        x-text="total_purchase_cost"></span></span>
                            </td>
                            <td class="text-info">taka</td>
                        </tr>
                        <tr>
                            <th>Paid</th>
                            <td>:</td>
                            <td>{{ $batch->total_purchase_cost - $batch->due_amount }} <span class="text-info"
                                    x-show="isGreaterThanZero(paid_amount)"> + <span x-text="paid_amount"></span></span>
                            </td>
                            <td class="text-info">taka</td>
                        </tr>
                        <tr>
                            <th>Due</th>
                            <td>:</td>
                            <td width="250">{{ $batch->due_amount }} <span class="text-danger"
                                    x-show="isGreaterThanZero(due_amount)">
                                    + <span x-text="due_amount"></span></span></td>
                            <td class="text-info">taka</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endif
@endsection

@push('scripts')
@endpush