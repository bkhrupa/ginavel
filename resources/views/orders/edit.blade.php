@extends('layouts.app')

<?php /** @var \App\Models\Order $order */ ?>

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">New Order</div>

        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="{{ route('order.update', $order->id) }}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">

                @include(
                    'partials.form.datepicker-yyyy-mm-dd',
                    ['name' => 'due_date', 'label' => 'Due Date', 'value' => $order->due_date->toDateString()]
                )

                @include(
                'partials.form.select',
                [
                    'name' => 'client_id',
                    'label' => 'Client',
                    'value' => $order->client_id,
                    'options' => App\Models\Client::query()->pluck('name', 'id')->prepend('', '')
                ]
                )

                @include(
                'partials.form.select',
                [
                    'name' => 'status',
                    'label' => 'Status',
                    'value' => $order->status,
                    'options' => App\Models\Order::$statuses
                ]
                )

                @include('partials.form.textarea', ['name' => 'note', 'label' => 'Note', 'value' => $order->note])

                <h4 class="text-center">Enter products quantity</h4>

                @if ($errors->has('products'))
                    <div class="form-group{{ $errors->has('products') ? ' has-error' : '' }}">
                        <div class="col-md-4"></div>
                        <div class="col-md-6">
                        <span class="help-block">
                            <strong>{{ $errors->first('products') }}</strong>
                        </span>
                        </div>
                    </div>
                @endif

                @foreach($products as $product)
                    @include(
                    'partials.form.product-quantity',
                     [
                         'label' => $product->name,
                         'value' => optional($order->orderProducts->firstWhere('product_id', $product->id))->quantity,
                         'id' => $product->id,
                         'price' => $product->price
                     ]
                     )
                @endforeach

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>

                        <a class="btn btn-link" href="{{ route('product.index') }}">
                            Cancel
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
