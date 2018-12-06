@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Products</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="btn-group">
                            <a href="{{ route('product.create') }}" class="btn btn-default">New Product</a>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>@sortablelink('id', 'Id')</th>
                                <th>@sortablelink('name')</th>
                                <th>@sortablelink('price')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {!! $products->appends(Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
