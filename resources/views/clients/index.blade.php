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
                    <th>@sortablelink('id', 'Id')</th>
                    <th>@sortablelink('name')</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-link" href="{{ route('client.show', $client->id) }}">Show</a>
                                <a class="btn btn-link" href="{{ route('client.edit', $client->id) }}">Edit</a>
                                <form method="POST" style="display: inline;" action="{{ route('client.destroy', $client->id) }}">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="btn btn-link" v-confirm-delete>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {!! $clients->appends(Request::except('page'))->render() !!}
        </div>
    </div>
@endsection
