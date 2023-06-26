@extends('layouts.layout')

@section('title','Categories')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
@endpush

@section('main')
<div class="card">
    <div class="card-header">
        <h5>Categories</h5>
    </div>
    <div class="card-body">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th width="1%">#</th>
                    <th width="95%">Name</th>
                    <th width="1$">Product Count</th>
                    <th width="3%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                <tr class="table-info">
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $category->name }}</td>
                    <td><span class="badge badge-success"> {{ $category->products->count() }} </span> </td>
                    <td><a class="text-info" href="{{ route('categories.edit', $category->id) }}"><i
                                class="feather icon-edit"></i> Edit</a>|
                        <a class="text-danger" href="javascript:{}" onclick="deleteBrand({{ $category->id }})"><i
                                class="feather icon-trash"></i>
                            Delete</a>
                        <form method="POST" id="deleteForm_{{ $category->id }}"
                            action="{{ route('categories.destroy', $category->id) }}">
                            @method('DELETE')
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Product Count</th>
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


function deleteBrand (id) {
    
    JSAlert.confirm("This cant be restored.", "Sure you want to delete ?", JSAlert.Icons.Deleted).then(function(result) {

    // Check if pressed yes
    if (!result)
    return;
    
    // User pressed yes!
    $('#deleteForm_'+id).submit();
    JSAlert.alert("Category deleted!");
    
    });
    
}
</script>
@endpush