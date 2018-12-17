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
                    <th>@sortablelink('id', 'Id')</th>
                    <th>@sortablelink('name')</th>
                    <th>@sortablelink('price')</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-link" href="{{ route('product.show', $product->id) }}">Show</a>
                                <a class="btn btn-link" href="{{ route('product.edit', $product->id) }}">Edit</a>
                                <form method="POST" style="display: inline;" action="{{ route('product.destroy', $product->id) }}">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-link" v-confirm-delete>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $products->appends(Request::except('page'))->render() !!}
        </div>
    </div>
@endsection
