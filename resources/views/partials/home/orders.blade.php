<h4>Orders (New, In Progress)</h4>
@if (!empty($productOrdersSum))
    <h5>Sum for this page:</h5>
    @foreach ($productOrdersSum as $productName => $quantity)
        {{ $productName }}
        <span class="badge badge-default">
                        {{ $quantity }}
                    </span>
    @endforeach
@endif

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

<h4>Orders (New, In Progress)</h4>

@if($co)
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">
            <tbody>

            @foreach($co as $key => $row)
                <tr>
                    @foreach($row as $cell)
                        @if($key === 0)
                            @if(!$cell)
                                <th></th>
                            @else
                                <th class="rotate">
                                    <div><span>{{ $cell['name'] }}</span></div>
                                </th>
                            @endif
                        @elseif($key === 1)
                            <td>
                                <b>{{ $cell }}</b>
                            </td>
                        @else
                            <td>
                                @if($cell instanceof \App\Models\Order)
                                    <a href="{{ route('order.show', $cell->id) }}">
                                        #{{ $cell->id }}
                                    </a>
                                    {{ $cell->client->name }}
                                @else
                                    {{ $cell }}
                                @endif
                            </td>
                        @endif
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@else
    No Orders ;)
@endif

