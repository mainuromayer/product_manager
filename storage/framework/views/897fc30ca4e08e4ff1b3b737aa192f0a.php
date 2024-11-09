<?php $__env->startSection('title'); ?>
    Edit Product
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto p-8">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">Product Edit Page</h1>
            <a href="<?php echo e(route('products.all')); ?>" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                View All Products
            </a>
        </div>

        <div class="border-y-4 border-indigo-500 p-5 rounded-md shadow-lg">
            <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- Product ID -->
                <div class="mb-4">
                    <label for="product_id" class="block text-sm font-medium text-gray-700">Product ID</label>
                    <input type="text" name="product_id" id="product_id" value="<?php echo e(old('product_id', $product->product_id)); ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                    <input type="text" name="name" id="name" value="<?php echo e(old('name', $product->name)); ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm"><?php echo e(old('description', $product->description)); ?></textarea>
                </div>

                <!-- Price -->
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" id="price" value="<?php echo e(old('price', $product->price)); ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- Stock -->
                <div class="mb-4">
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" name="stock" id="stock" value="<?php echo e(old('stock', $product->stock)); ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm">
                </div>

                <!-- Image (Optional) -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Product Image</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm" onchange="previewImage(event)">
                    <p class="text-sm text-gray-500 mt-1">Leave blank to keep current image.</p>
                    <!-- Image preview container -->
                    <?php if($product->image): ?>
                        <div class="mt-4">
                            <strong>Current Image:</strong><br>
                            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Current Product Image" class="w-32 h-32 object-cover mt-2">
                        </div>
                    <?php endif; ?>


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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP_Laravel_Vue\assignment-4\product_management\resources\views/layouts/edit.blade.php ENDPATH**/ ?>