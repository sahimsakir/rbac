@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb my-3">
            <div class="pull-left">
                <h2>Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $product->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                {{ $product->price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                {{ $product->quantity }}
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group d-flex flex-column justify-center align-items-center">
                <strong class="text-center">Image 1:</strong>
                @if ($product->image1)
                    <img src="{{ asset($product->image1) }}" alt="Image 1" style="max-width: 100px; max-height: 100px;">
                @else
                    <p>No Image</p>
                @endif
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group d-flex flex-column justify-center align-items-center">
                <strong class="text-center">Image 2:</strong>
                @if ($product->image2)
                    <img src="{{ asset($product->image2) }}" alt="Image 2" style="max-width: 100px; max-height: 100px;">
                @else
                    <p>No Image</p>
                @endif
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group d-flex flex-column justify-center align-items-center">
                <strong class="text-center">Image 3:</strong>
                @if ($product->image3)
                    <img src="{{ asset($product->image3) }}" alt="Image 3" style="max-width: 100px; max-height: 100px;">
                @else
                    <p>No Image</p>
                @endif
            </div>
        </div>
    </div>
@endsection
