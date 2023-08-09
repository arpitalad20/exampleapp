@extends('products.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>

<!-- display all errors in one place      -->
<!-- @if ($errors->any())
      <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.<br><br>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
@endif -->
<!-- <img src="images/{{ Session::get('image') }}"> -->

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
            </div>
            @if ($errors->name)
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail:</strong>
                <textarea class="form-control @error('detail') is-invalid @enderror" style="height:150px" name="detail" placeholder="Detail"></textarea>
                @if ($errors->detail)
                    <span class="text-danger">{{ $errors->first('detail') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                @if ($errors->email)
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Date:</strong>
                <input type="date" name="pdate" class="form-control @error('pdate') is-invalid @enderror" placeholder="Date">
                @if ($errors->pdate)
                    <span class="text-danger">{{ $errors->first('pdate') }}</span>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
            </div>
            @if ($errors->image)
                <span class="text-danger">{{ $errors->first('image') }}</span>
            @endif
        </div>   
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection
