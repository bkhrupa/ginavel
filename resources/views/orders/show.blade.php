@extends('layouts.app')


@section('content')
    @component('components.card', ['header' => 'Order #' . $order->id])

        @component('components.show-row', ['label' => '#'])
            {{ $order->id }}
        @endcomponent

        @component('components.show-row', ['label' => 'Due Date'])
            {{ $order->due_date->toDateString() }}
            @if($order->status !== \App\Models\Order::STATUS_DONE)
                @if($order->due_date->lessThan(\Carbon\Carbon::now()))
                    <i class="fa fa-exclamation text-danger"></i>
                @endif
            @endif
        @endcomponent

        @component('components.show-row', ['label' => 'Client'])
            <a href="{{ route('client.show', $order->client->id) }}">
                {{ $order->client->name }}
            </a>
        @endcomponent

        @component('components.show-row', ['label' => 'Status'])
            {{ $order->statusName }}
        @endcomponent

        @component('components.show-row', ['label' => 'Sum'])
            {{ $order->orderProducts->sum(function ($op) {return $op->sum;}) }}
        @endcomponent

        @component('components.show-row', ['label' => 'Note'])
            {{ $order->note }}
        @endcomponent

        @component('components.show-row', ['label' => 'Created At'])
            {{ $order->created_at }}
        @endcomponent

        @component('components.show-row', ['label' => 'Updated At'])
            {{ $order->updated_at }}
        @endcomponent

        @component('components.show-row', ['label' => 'Created By'])
            <a href="{{ route('user.show', $order->creator->id) }}">
                {{ $order->creator->name }}
            </a>
        @endcomponent
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" method="POST" action="{{ route('order.change-status', $order->id) }}">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    @include(
                                   'partials.form.select',
                                   [
                                       'name' => 'status',
                                       'label' => 'Status',
                                       'value' => $order->status,
                                       'options' => App\Models\Order::$statuses
                                   ]
                                   )
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Change Status
                            </button>
                        </div>
                    </div>
                </form>
            </div>
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
                    Orders
                </a>
                <a class="btn btn-default" href="{{ route('order.edit', $order->id) }}">
                    Edit
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

    @endcomponent
@endsection
