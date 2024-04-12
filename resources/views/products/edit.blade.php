@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb my-3">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                        placeholder="Name">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $product->detail }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control"
                        placeholder="Price">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <strong>Quantity:</strong>
                    <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control"
                        placeholder="Quantity">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Image 1:</strong><br>
                    @if ($product->image1)
                        <img id="imagePreview1" src="{{ asset($product->image1) }}" alt="Image 1"
                            style="width: 100px; height: 100px; object-fit: cover;"><br>
                    @else
                        <img id="imagePreview1" src="#" alt="Image 1 Preview"
                            style="display: none; width: 100px; height: 100px; object-fit: cover;"><br>
                    @endif
                    <input type="file" name="image1" class="form-control-file mt-2"
                        onchange="previewImage(this, 'imagePreview1')">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Image 2:</strong><br>
                    @if ($product->image2)
                        <img id="imagePreview2" src="{{ asset($product->image2) }}" alt="Image 2"
                            style="width: 100px; height: 100px; object-fit: cover;"><br>
                    @else
                        <img id="imagePreview2" src="#" alt="Image 2 Preview"
                            style="display: none; width: 100px; height: 100px; object-fit: cover;"><br>
                    @endif
                    <input type="file" name="image2" class="form-control-file mt-2"
                        onchange="previewImage(this, 'imagePreview2')">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <strong>Image 3:</strong><br>
                    @if ($product->image3)
                        <img id="imagePreview3" src="{{ asset($product->image3) }}" alt="Image 3"
                            style="width: 100px; height: 100px; object-fit: cover;"><br>
                    @else
                        <img id="imagePreview3" src="#" alt="Image 3 Preview"
                            style="display: none; width: 100px; height: 100px; object-fit: cover;"><br>
                    @endif
                    <input type="file" name="image3" class="form-control-file mt-2"
                        onchange="previewImage(this, 'imagePreview3')">
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

    <script>
        function previewImage(input, previewId) {
            var preview = document.getElementById(previewId); // Get the preview element
            var file = input.files[0]; // Get the selected file

            var reader = new FileReader(); // Initialize a new FileReader object

            reader.onload = function(e) {
                // Set the preview source to the FileReader result
                preview.src = e.target.result;
                preview.style.display = 'block'; // Display the preview image
            }

            // Read the selected file as a data URL and trigger the onload event
            reader.readAsDataURL(file);
        }
    </script>
@endsection
