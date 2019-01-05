@extends('layouts.app')


@section('content')
    @component('components.card', ['header' => $product->name])

        @component('components.show-row', ['label' => 'Name'])
            {{ $product->name }}
        @endcomponent

        @component('components.show-row', ['label' => 'Price'])
            {{ $product->price }}
        @endcomponent

        @component('components.show-row', ['label' => 'Description'])
            {{ $product->description }}
        @endcomponent

        @component('components.show-row', ['label' => 'Status'])
            {{ App\Models\Product::$statuses[$product->status] }}
        @endcomponent

        @component('components.show-row', ['label' => 'Updated At'])
            {{ $product->updated_at }}
        @endcomponent

        @component('components.show-row', ['label' => 'Created At'])
            {{ $product->created_at }}
        @endcomponent

        @if ($product->priceHistories->isNotEmpty())
            <div class="row">
                <div class="col-md-12">
                    <h4>Prices History</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Updated</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product->priceHistories as $priceHistory)
                            <tr>
                                <td>{{ $priceHistory->updated_at->toDateString() }}</td>
                                <td>{{ $priceHistory->price }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-default" href="{{ route('product.index') }}">
                    Products
                </a>
            </div>
        </div>

    @endcomponent
@endsection
