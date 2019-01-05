@extends('layouts.app')

@section('content')
    @component('components.card', ['header' => 'Orders '])

        <div class="btn-group btn-group-xs">
            <a href="{{ route(
                    'order.index',
                     ['filter-status=i=' . \App\Models\Order::STATUS_NEW . ',' . \App\Models\Order::STATUS_IN_PROGRESS]
                     ) }}" class="btn btn-default btn-danger">
                New Progress
            </a>
            <a href="{{ route(
                    'order.index',
                     ['filter-status=i=' . \App\Models\Order::STATUS_DELIVERED . ',' . \App\Models\Order::STATUS_WAIT_PAYMENT]
                     ) }}" class="btn btn-default btn-info">
                Deliver Wait
            </a>
            <a href="{{ route('order.index', ['filter-status=' . \App\Models\Order::STATUS_DONE]) }}"
               class="btn btn-success">
                Done
            </a>
            <a href="{{ route('order.index') }}" class="btn btn-light">
                All
            </a>
        </div>

        <div class="btn-group">
            <a href="{{ route('order.create') }}" class="btn btn-outline-primary">New Order</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>@sortablelink('id')</th>
                <th>@sortablelink('due_date')</th>
                <th>@sortablelink('client.name', 'client')</th>
                <th class="d-none d-sm-table-cell">@sortablelink('status')</th>
                <th class="d-none d-sm-table-cell">Sum</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                @php($statusClass = '')

                @switch($order->status)
                    @case(\App\Models\Order::STATUS_DONE)
                    @php($statusClass = 'table-success')
                    @break
                    @case(\App\Models\Order::STATUS_NEW)
                    @case(\App\Models\Order::STATUS_IN_PROGRESS)
                    @php($statusClass = 'table-danger')
                    @break
                    @case(\App\Models\Order::STATUS_DELIVERED)
                    @case(\App\Models\Order::STATUS_WAIT_PAYMENT)
                    @php($statusClass = 'table-warning')
                    @break

                @endswitch

                <tr class="{{ $statusClass }}">
                    <td>
                        <a href="{{ route('order.show', $order->id) }}">
                            {{ $order->id }}
                        </a>
                    </td>
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
                    <td class="d-none d-sm-table-cell">{{ $order->statusName }}</td>
                    <td class="d-none d-sm-table-cell">{{ $order->orderProducts->sum(function ($op) {return $op->sum;}) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $orders->appends(Request::except('page'))->render() !!}

    @endcomponent
@endsection
