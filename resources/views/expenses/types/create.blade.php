@extends('layouts.layout')

@section('title', 'Create A New Type')

@push('css')
@endpush

@section('main')
<form method="POST" action="{{ route('types.store') }}">
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
                    <h5>Add a new category</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Name Ex. Food & Coffee">
                    </div>
                    <button type="submit" class="btn  btn-primary">Add Expense Type</button>
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