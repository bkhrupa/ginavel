@extends('layouts.app')


@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ $product->name }}</div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">Name</div>
                <div class="col-md-6">{{ $product->name }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Price</div>
                <div class="col-md-6">{{ $product->price }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Description</div>
                <div class="col-md-6">{{ $product->description }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Status</div>
                <div class="col-md-6">{{ App\Models\Product::$statuses[$product->status] }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Updated At</div>
                <div class="col-md-6">{{ $product->updated_at }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Created At</div>
                <div class="col-md-6">{{ $product->created_at }}</div>
            </div>
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
                    <a class="btn btn-link" href="{{ route('product.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
