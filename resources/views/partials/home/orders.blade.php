<h4>Orders (New, In Progress)</h4>
<table class="table">
    <thead>
    <tr>
        <th>@sortablelink('id')</th>
        <th>@sortablelink('due_date', 'Due Date')</th>
        <th>@sortablelink('client.name', 'client')</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($ordersList as $order)
        <tr>
            <td rowspan="2">
                <a href="{{ route('order.show', $order->id) }}">
                    {{ $order->id }}
                </a>
            </td>
            <td>
                <a href="{{ route('order.show', $order->id) }}">
                    {{ $order->due_date->toDateString() }}
                </a>
            </td>
            <td>
                <a href="{{ route('client.show', $order->client->id) }}">
                    {{ $order->client->name }}
                </a>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                @foreach($order->orderProducts as $orderProduct)
                    {{ $orderProduct->product->name }}
                    <span class="badge badge-default">
                        {{ $orderProduct->quantity }}
                    </span>
                @endforeach
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{!! $ordersList->appends(Request::except('page'))->render() !!}
