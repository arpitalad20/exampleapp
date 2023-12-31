@extends('products.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th>Email</th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $i=>$product)
        <tr>
            <td>{{ $i+1 }}</td>
            <td> @if ( $product->image )
            <img src="/images/{{ $product->image }}" width="50px" height="50px">
            @endif
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>{{ $product->email }}</td>
            <td>{{ date('d-m-Y', strtotime($product->pdate)) }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                     <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                     <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                     @csrf
                     @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!} 
@endsection