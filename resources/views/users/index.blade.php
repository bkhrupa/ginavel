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
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <form method="POST" class="btn-group" action="{{ route('user.destroy', $user->id) }}">
                                    <a class="btn btn-default" title="Show" href="{{ route('user.show', $user->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-default" title="Edit" href="{{ route('user.edit', $user->id) }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" title="Delete" class="btn btn-danger" v-confirm-delete>
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $users->appends(Request::except('page'))->render() !!}
            </div>
        </div>
@endsection
