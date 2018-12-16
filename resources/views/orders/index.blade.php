@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Orders</div>

        <div class="panel-body">
            <div class="btn-group">
                <a href="{{ route('order.create') }}" class="btn btn-default">New Order</a>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>@sortablelink('id')</th>
                    <th>@sortablelink('due_date')</th>
                    <th>@sortablelink('client.name', 'client')</th>
                    <th>@sortablelink('status')</th>
                    <th>Sum</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td><a href="{{ route('order.show', $order->id) }}">{{ $order->id }}</a></td>
                        <td>
                            <a href="{{ route('order.show', $order->id) }}">
                            {{ $order->due_date->toDateString() }}
                            </a>
                            @if($order->status !== \App\Models\Order::STATUS_DONE)
                                @if($order->due_date->lessThan(\Carbon\Carbon::now()))
                                    <i class="fa fa-exclamation text-danger"></i>
                                @endif
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('client.show', $order->client->id) }}">
                                {{ $order->client->name }}
                            </a>
                        </td>
                        <td>{{ $order->statusName }}</td>
                        <td>{{ $order->orderProducts->sum(function ($op) {return $op->sum;}) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $orders->appends(Request::except('page'))->render() !!}
        </div>
    </div>
@endsection
