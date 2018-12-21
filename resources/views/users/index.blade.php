@extends('layouts.app')

@section('content')
        <div class="panel panel-default">
            <div class="panel-heading">Users</div>

            <div class="panel-body">
                <div class="btn-group">
                    <a href="{{ route('user.create') }}" class="btn btn-default">New User</a>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>@sortablelink('id')</th>
                        <th>@sortablelink('name')</th>
                        <th>Email</th>
                        <th>@sortablelink('role')</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>
                                <a title="Show" href="{{ route('user.show', $user->id) }}">
                                    {{ $user->name }}
                                </a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>@include('partials.btns-ed', ['model' => $user])</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $users->appends(Request::except('page'))->render() !!}
            </div>
        </div>
@endsection
