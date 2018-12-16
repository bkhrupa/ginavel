@extends('layouts.app')


@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Oreder #{{ $order->id }}</div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">#</div>
                <div class="col-md-6">{{ $order->id }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Due Date</div>
                <div class="col-md-6">
                    {{ $order->due_date->toDateString() }}
                    @if($order->status !== \App\Models\Order::STATUS_DONE)
                        @if($order->due_date->lessThan(\Carbon\Carbon::now()))
                            <i class="fa fa-exclamation text-danger"></i>
                        @endif
                    @endif

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">Client</div>
                <div class="col-md-6">
                    <a href="{{ route('client.show', $order->client->id) }}">
                        {{ $order->client->name }}
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">Status</div>
                <div class="col-md-6">{{ $order->statusName }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Sum</div>
                <div class="col-md-6">
                    {{ $order->orderProducts->sum(function ($op) {return $op->sum;}) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">Nore</div>
                <div class="col-md-6">
                    {{ $order->note }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">Created At</div>
                <div class="col-md-6">{{ $order->created_at }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Updated At</div>
                <div class="col-md-6">{{ $order->updated_at }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Created By</div>
                <div class="col-md-6">{{ $order->creator->name }}</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Sum</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->orderProducts as $orderProduct)
                            <tr>
                                <td>
                                    <a href="{{ route('product.show', $orderProduct->product->id) }}">
                                        {{ $orderProduct->product->name }}
                                    </a>
                                </td>
                                <td>{{ $orderProduct->quantity }}</td>
                                <td>{{ $orderProduct->price }}</td>
                                <td>{{ $orderProduct->sum }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-default" href="{{ route('order.index') }}">
                        Back
                    </a>
                    <form method="POST" style="display: inline;" action="{{ route('order.destroy', $order->id) }}">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit" class="btn btn-danger" v-confirm-delete>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
