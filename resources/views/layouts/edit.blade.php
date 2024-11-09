@extends('main')

@section('title')
    Edit Product
@endsection

@section('content')
    <div class="max-w-4xl mx-auto p-8">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">Product Edit Page</h1>
            <a href="{{ route('products.all') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                View All Products
            </a>
        </div>

        <div class="border-y-4 border-indigo-500 p-5 rounded-md shadow-lg">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Product ID -->
                <div class="mb-4">
                    <label for="product_id" class="block text-sm font-medium text-gray-700">Product ID</label>
                    <input type="text" name="product_id" id="product_id" value="{{ old('product_id', $product->product_id) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- Stock -->
                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- Image (Optional) -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" onchange="previewImage(event)">
                    <p class="text-sm text-gray-500 mt-1">Leave blank to keep current image.</p>
                    <!-- Image preview container -->
                    @if ($product->image)
                        <div class="mt-4">
                            <strong>Current Image:</strong><br>
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Current Product Image" class="w-32 h-32 object-cover mt-2">
                        </div>
                    @endif


                    <!-- Image preview container -->
                    <div class="mt-4" id="imagePreviewContainer" style="display: none;">
                        <strong>Image Preview:</strong><br>
                        <img id="imagePreview" src="" alt="Image Preview" class="w-32 h-32 object-cover mt-2">
                    </div>
                </div>

                <button type="submit" class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Update Product
                </button>
            </form>
        </div>

    </div>

@endsection

@section('scripts')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('imagePreview');
                preview.src = reader.result;
                document.getElementById('imagePreviewContainer').style.display = 'block'; // Show preview container
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
