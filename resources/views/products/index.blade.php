@extends('layouts.layout')

@section('title','Products')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

<style>
    .jsalertWindow>* {
        font-family: "Open Sans", sans-serif !important;
        text-transform: capitalize;
    }

    .jsalertImg {
        max-height: none !important;
        width: 25%;
        padding: 10px !important;
        border: 1px solid black;
        border-radius: 50%;
        margin: 34px auto !important;
        font-family: "Open Sans", sans-serif !important;
    }
</style>

@endpush

@section('main')
<div class="card">
    <div class="card-header">
        <h5>Products</h5>
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Categories</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->brand->name }}</td>
                    <td>
                        @foreach ($product->categories as $category)
                        <span class="badge badge-success">{{ $category->name }}</span>
                        @endforeach
                    </td>
                    <td><img width="100" src="{{ asset('storage/products/'.$product->image) }}" alt=""></td>
                    <td><a class="text-info" href="{{ route('products.edit', $product->id) }}"><i
                                class="feather icon-edit"></i>
                            Edit</a>|
                        <a class="text-danger" href="javascript:{}" onclick="deleteFunction({{ $product->id }})"><i
                                class="feather icon-trash"></i>
                            Delete</a>
                        <form method="POST" id="deleteForm_{{ $product->id }}"
                            action="{{ route('products.destroy', $product->id) }}">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Categories</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('js/jsalert.min.js') }}"></script>

<script>
    $(document).ready(function () {
    $('#example').DataTable();
});


function deleteFunction (id) {
    
    JSAlert.confirm("This cant be restored.", "Sure you want to delete ?", JSAlert.Icons.Deleted).then(function(result) {

    // Check if pressed yes
    if (!result)
    return;
    
    // User pressed yes!
    $('#deleteForm_'+id).submit();
    JSAlert.alert("Product successfully deleted!");
    
    });
    
}
</script>
@endpush