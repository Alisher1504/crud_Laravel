@extends('layouts.app')
@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> -->


    <div class="container">

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

                    <form action="{{ route('destroy', $product->id);}}" method="POST">

                    <a class="btn btn-info" href="{{route('show', $product->id)}}">Show</a>
                    <a class="btn btn-primary" href="{{route('edit', $product->id)}}">Edit</a>

                    @csrf 
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>

                    </form>

                </td>
            </tr>

            @endforeach

        </table>


    </div>

    <!-- {!! $products->links() !!} -->


@endsection
