@extends('layouts.layout')

@section('title', 'Edit {{ $brand->name }}')

@push('css')
@endpush

@section('main')
<form method="POST" action="{{ route('suppliers.update', $supplier->id) }}" enctype="multipart/form-data">
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
                    <h5>Add a new supplier</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $supplier->name }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{ $supplier->phone }}"
                            pattern="[0-9]{5}-[0-9]{6}">
                        <small>Format: 01XXX-XXXXXX</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" id="name" name="email" value="{{ $supplier->email }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <textarea name="address" id="" cols="30" rows="3"
                            class="form-control">{{ $supplier->address }}</textarea>
                    </div>
                    <button type="submit" class="btn  btn-primary">Edit Supplier</button>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</form>
@endsection

@push('script')
@endpush