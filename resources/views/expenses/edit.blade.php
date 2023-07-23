@extends('layouts.layout')

@section('title', 'Edit {{ $expense->name }}')

@push('css')
@endpush

@section('main')
<form method="POST" action="{{ route('expenses.update', $expense) }}">
    @method('PUT')
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
                    <h5>Edit {{ $brand->name }}</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Expense</label>
                        <input type="number" class="form-control" id="name" name="amount" placeholder="Amount">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Expense Category</label>
                        <select class="form-control" id="name" name="type">
                            <option disabled selected>Select a category</option>
                            @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn  btn-primary">Add Expense</button>
                </div>
            </div>
        </div>
        <div class="col-4">

        </div>
</form>
</div>
@endsection

@push('script')
@endpush