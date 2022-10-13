@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-12 margin-tb">
                <div class="row justify-content-evenly align-items-center">
                    <div class="col-sm-4">
                        <h2>Add New Product</h2>
                    </div>
                    <div class="col-sm-1">
                        <a href="{{ url('/home') }}" class="btn btn-primary ms-auto">Back</a>
                    </div>
                </div>
            </div>
        </div>

        @if($errors->any())

            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input <br><br>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif

        <form action="{{ route('update', $product->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" name="detail" style="height: 150px;" placeholder="Detail">{{$product->detail}}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="image">
                    <img src="/images/{{ $product->image }}" width="300px" class="mt-3" alt="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
            </div>
        </div>

        </form>
    </div>

@endsection