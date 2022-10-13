@extends('app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>laravel 9 crud (create, read, update and delete) with image upload</h2>
        </div>
        <div class="pull-right" style="margin-bottom:10px;">
            <a href="{{ url('create') }}" class="btn btn-success">createnew product</a>
        </div>
    </div>
</div>

@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Image</th>
        <th>Name</th>
        <th>Detailes</th>
        <th style="width: 280px;">Action</th>
    </tr>

    @foreach($products as $product)

    <tr>
        <td>{{ ++$i }}</td>
        <td><img src="/images/{{$product->image}}" width="100px" alt=""></td>
        <td>{{$product->name}}</td>
        <td>{{$product->detail}}</td>
        <td>

            <form action="" method="POST">

            <a class="btn btn-info" href="">Show</a>
            <a class="btn btn-primary" href="">Edit</a>

            @csrf 
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>

            </form>

        </td>
    </tr>

    @endforeach

</table>

    {!! $products->links() !!}

@endsection