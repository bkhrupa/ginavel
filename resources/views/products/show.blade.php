@extends('layouts.app')


@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">{{ $name }}</div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-4">Name</div>
                <div class="col-md-6">{{ $name }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Price</div>
                <div class="col-md-6">{{ $price }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Description</div>
                <div class="col-md-6">{{ $description }}</div>
            </div>
            <div class="row">
                <div class="col-md-4">Status</div>
                <div class="col-md-6">{{ App\Models\Product::$statuses[$status] }}</div>
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
                    <a class="btn btn-link" href="{{ route('product.index') }}">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
