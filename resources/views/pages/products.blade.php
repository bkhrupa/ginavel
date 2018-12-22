@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Products</div>

        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>@sortablelink('name')</th>
                    <th>@sortablelink('price')</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $products->appends(Request::except('page'))->render() !!}

        </div>
    </div>
@endsection