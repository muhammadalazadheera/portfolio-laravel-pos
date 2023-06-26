@extends('layouts.layout')

@section('title', 'Create A New Brand')

@push('css')
@endpush

@section('main')
<form method="POST" action="{{ route('brands.store') }}" enctype="multipart/form-data">
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
                    <h5>Add a new brand</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Brand Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Brand Name Ex. Samsung">
                    </div>
                    <button type="submit" class="btn  btn-primary">Add Brand</button>
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