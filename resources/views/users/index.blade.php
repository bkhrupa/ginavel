@extends('layouts.app')

@section('content')
    @component('components.card', ['header' => 'Users'])

        <div class="btn-group">
            <a href="{{ route('user.create') }}" class="btn btn-default">New User</a>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>@sortablelink('name')</th>
                <th>@sortablelink('role')</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        <a title="Show" href="{{ route('user.show', $user->id) }}">
                            {{ $user->name }}
                        </a>
                    </td>
                    <td>{{ $user->role }}</td>
                    <td>@include('partials.btns-ed', ['model' => $user])</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $users->appends(Request::except('page'))->render() !!}

    @endcomponent
@endsection
