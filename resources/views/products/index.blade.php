@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb my-3">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                    <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Image 1</th>
            <th>Image 2</th>
            <th>Image 3</th>
            <th>Price</th>
            <th>Quantity</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $product->name }}</td>
                <td>
                    @if ($product->image1)
                        <img src="{{ asset($product->image1) }}" alt="Image 1"
                            style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    @if ($product->image2)
                        <img src="{{ asset($product->image2) }}" alt="Image 2"
                            style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                        No Image
                    @endif
                </td>
                <td>
                    @if ($product->image3)
                        <img src="{{ asset($product->image3) }}" alt="Image 3"
                            style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show', $product->id) }}">Show</a>
                        @can('product-edit')
                            <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                        @endcan

                        @csrf
                        @method('DELETE')
                        @can('product-delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $products->links() !!}
@endsection
