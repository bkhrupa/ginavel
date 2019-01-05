@extends('layouts.app')

@section('content')
    @component('components.card', ['header' => __('product.products')])

        <div class="btn-group">
            <a href="{{ route('product.create') }}" class="btn btn-default">@lang('product.new_product')</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th class="d-none d-sm-table-cell">@sortablelink('id', 'Id')</th>
                <th>@sortablelink('name')</th>
                <th>@sortablelink('price')</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                <tr {!! ($product->status === \App\Models\Product::STATUS_DISABLE) ? 'class="table-secondary"' : '' !!}>
                    <td class="d-none d-sm-table-cell">{{ $product->id }}</td>
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

    @endcomponent
@endsection
