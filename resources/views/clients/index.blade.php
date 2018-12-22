@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Clients</div>

        <div class="panel-body">
            <div class="btn-group">
                <a href="{{ route('client.create') }}" class="btn btn-default">New Client</a>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>@sortablelink('name')</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td><a href="{{ route('client.show', $client->id) }}">{{ $client->name }}</a></td>
                        <td>
                            @if($client->phone)
                                <span class="hidden-xs">{{ $client->phone }}</span>
                                <a href="tel:{{ $client->phone }}"><i class="fa fa-phone"></i></a>
                            @endif
                        </td>
                        <td>@include('partials.btns-ed', ['model' => $client])</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $clients->appends(Request::except('page'))->render() !!}
        </div>
    </div>
@endsection
