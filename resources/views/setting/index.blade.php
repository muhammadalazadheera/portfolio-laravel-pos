@extends('layouts.layout')
@section('title', 'Add a new product')

@push('css')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css'>
@endpush


@section('main')
    <form method="POST" action="{{ route('setting.update', 1) }}" enctype="multipart/form-data">
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
                        <h5>Edit Setting</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Shop Name</label>
                            <input type="text" class="form-control" id="name" name="shop_name"
                                value="{{ $settings->shop_name }}">
                        </div>
                        <button type="submit" class="btn  btn-primary">Update</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Logo</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="file" class="dropify form-control" id="image" name="logo"
                                data-max-height="33" data-max-width="131"
                                data-default-file="{{ asset('storage/logo/' . $settings->logo) }}">
                        </div>
                    </div>
                </div>
            </div>
    </form>
    </div>
@endsection

@push('scripts')
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js'></script>
    <script src="./script.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropify').dropify();
        });
    </script>
@endpush
