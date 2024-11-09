@extends('main')

@section('title')
    Create Product
@endsection

@section('styles')
    <!-- You can add any specific styles here if needed -->
@endsection

@section('content')
    <div class="max-w-4xl mx-auto p-8">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">Create New Product</h1>
            <a href="{{ route('products.all') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                View All Products
            </a>
        </div>

        <div class="border-y-4 border-indigo-500 p-5 rounded-md shadow-lg">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Product ID -->
                <div class="mb-4">
                    <label for="product_id" class="block text-sm font-medium text-gray-700">Product ID</label>
                    <input
                        type="text"
                        name="product_id"
                        id="product_id"
                        value="{{ old('product_id') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter product ID"
                        required
                    >
                    @error('product_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter product name"
                        required
                    >
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea
                        name="description"
                        id="description"
                        rows="4"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter product description"
                    >{{ old('description') }}</textarea>
                    @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input
                        type="number"
                        name="price"
                        id="price"
                        value="{{ old('price') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter product price"
                        required
                    >
                    @error('price')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stock -->
                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                    <input
                        type="number"
                        name="stock"
                        id="stock"
                        value="{{ old('stock') }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter stock quantity"
                    >
                    @error('stock')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Image -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                    <input
                        type="file"
                        name="image"
                        id="image"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        onchange="previewImage(event)"
                    >
                    @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                    <!-- Image preview -->
                    <div id="imagePreviewContainer" class="mt-4" style="display: none;">
                        <strong>Image Preview:</strong><br>
                        <img id="imagePreview" src="" alt="Image Preview" class="w-32 h-32 object-cover mt-2">
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button
                        type="submit"
                        class="w-full py-2 px-4 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    >
                        Create Product
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const preview = document.getElementById('imagePreview');
                preview.src = reader.result;
                document.getElementById('imagePreviewContainer').style.display = 'block'; // Show the preview container
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
