@extends('main')

@section('title')
    Product List
@endsection

@section('content')
    <div class="max-w-4xl mx-auto p-8">
        <h1 class="text-xl font-semibold text-gray-800 mb-6 text-center">Product List</h1>


        <div class="border-y-4 border-indigo-500 p-5 rounded-md shadow-lg">
            <!-- Search and Sort Form -->
            <form action="{{ route('products.all') }}" method="GET" class="mb-4">
                <input type="text" name="search" placeholder="Search products" class="px-4 py-2 border border-gray-300 rounded" value="{{ request('search') }}">
                <select name="sort" class="ml-2 px-4 py-2 border border-gray-300 rounded">
                    <option value="">Sort by</option>
                    <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Name</option>
                    <option value="price" {{ request('sort') == 'price' ? 'selected' : '' }}>Price</option>
                </select>
                <button type="submit" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded">Search</button>
                <a href="{{ route('products.create') }}" class="inline-block float-right px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Create New Product
                </a>
            </form>

            <!-- Product Table -->
            <table class="min-w-full border border-gray-200">
                <thead>
                <tr>
                    <th class="px-4 py-2 border">Product ID</th>
                    <th class="px-4 py-2 border">Name</th>
                    <th class="px-4 py-2 border">Price</th>
                    <th class="px-4 py-2 border">Image</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr class="text-center">
                        <td class="px-4 py-2 border">{{ $product->product_id }}</td>
                        <td class="px-4 py-2 border">{{ $product->name }}</td>
                        <td class="px-4 py-2 border">৳ {{ number_format($product->price, 2) }}</td>
                        <td class="px-4 py-2 border">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-32 h-32 object-cover mt-2">
                            @else
                                No Image
                            @endif
                        </td>

                        <td class="px-4 py-2 border">
                            <a href="{{ route('products.show', $product->id) }}" class="bg-blue-100 text-blue-900 text-bold px-3 py-2 rounded-lg m-1 text-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('products.edit', $product->id) }}" class="bg-emerald-100 text-emerald-900 text-bold px-3 py-2 rounded-lg m-1 text-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('products.delete', $product->id) }}" method="POST" class="inline" onsubmit="return confirmDelete(event)">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-rose-100 text-rose-900 text-bold px-3 py-2 rounded-lg m-1 text-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        {{ $products->links() }}
    </div>

    <!-- Add Font Awesome Script -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        function confirmDelete(event) {
            if (!confirm('Are you sure you want to delete this product?')) {
                event.preventDefault();
            }
        }
    </script>
@endsection
