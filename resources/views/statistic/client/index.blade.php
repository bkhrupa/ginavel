@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Clients Statistic</div>

        <div class="panel-body">
            <table class="table">
                <thead>
                <tr>
                    <th>@sortablelink('name')</th>
                    <th>@sortablelink('orders_count', 'Orders')</th>
                    <th>Last Order</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td><a href="{{ route('client.show', $client->id) }}">{{ $client->name }}</a></td>
                        <td>
                            @if($client->orders->isNotEmpty())
                                {{ $client->orders_count }}
                            @else
                                0
                            @endif
                        </td>
                        <td>
                            @if($client->orders->isNotEmpty())
                                {{ $client->orders->sortBy('updated_at')->first()->updated_at->toDateString() }}
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $clients->appends(Request::except('page'))->render() !!}
        </div>
    </div>
@endsection
