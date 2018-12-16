@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Client - {{ $name }}</div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">Name</div>
                <div class="col-md-6">{{ $name }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Email</div>
                <div class="col-md-6">{{ $email }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Phone</div>
                <div class="col-md-6">{{ $phone }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Noet</div>
                <div class="col-md-6">{{ $note }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Updated At</div>
                <div class="col-md-6">{{ $updated_at }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Created At</div>
                <div class="col-md-6">{{ $created_at }}</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <a class="btn btn-link" href="{{ route('client.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
