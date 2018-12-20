@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Products</div>

        <div class="panel-body">
            <div class="btn-group">
                <a href="{{ route('product.create') }}" class="btn btn-default">New Product</a>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th class="hidden-xs">@sortablelink('id', 'Id')</th>
                    <th>@sortablelink('name')</th>
                    <th>@sortablelink('price')</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="hidden-xs">{{ $product->id }}</td>
                        <td>
                            <a title="Show" href="{{ route('product.show', $product->id) }}">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td>{{ $product->price }}</td>
                        <td>@include('partials.btns-ed', ['model' => $product])</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $products->appends(Request::except('page'))->render() !!}
        </div>
    </div>
@endsection
