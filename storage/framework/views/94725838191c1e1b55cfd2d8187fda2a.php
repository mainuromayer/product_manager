<?php $__env->startSection('title'); ?>
    Product List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto p-8">
        <h1 class="text-xl font-semibold text-gray-800 mb-6 text-center">Product List</h1>


        <div class="border-y-4 border-indigo-500 p-5 rounded-md shadow-lg">
            <!-- Search and Sort Form -->
            <form action="<?php echo e(route('products.all')); ?>" method="GET" class="mb-4">
                <input type="text" name="search" placeholder="Search products" class="px-4 py-2 border border-gray-300 rounded" value="<?php echo e(request('search')); ?>">
                <select name="sort" class="ml-2 px-4 py-2 border border-gray-300 rounded">
                    <option value="">Sort by</option>
                    <option value="name" <?php echo e(request('sort') == 'name' ? 'selected' : ''); ?>>Name</option>
                    <option value="price" <?php echo e(request('sort') == 'price' ? 'selected' : ''); ?>>Price</option>
                </select>
                <button type="submit" class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded">Search</button>
                <a href="<?php echo e(route('products.create')); ?>" class="inline-block float-right px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
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
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="text-center">
                        <td class="px-4 py-2 border"><?php echo e($product->product_id); ?></td>
                        <td class="px-4 py-2 border"><?php echo e($product->name); ?></td>
                        <td class="px-4 py-2 border">৳ <?php echo e(number_format($product->price, 2)); ?></td>
                        <td class="px-4 py-2 border">
                            <?php if($product->image): ?>
                                <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Product Image" class="w-32 h-32 object-cover mt-2">
                            <?php else: ?>
                                No Image
                            <?php endif; ?>
                        </td>

                        <td class="px-4 py-2 border">
                            <a href="<?php echo e(route('products.show', $product->id)); ?>" class="bg-blue-100 text-blue-900 text-bold px-3 py-2 rounded-lg m-1 text-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?php echo e(route('products.edit', $product->id)); ?>" class="bg-emerald-100 text-emerald-900 text-bold px-3 py-2 rounded-lg m-1 text-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('products.delete', $product->id)); ?>" method="POST" class="inline" onsubmit="return confirmDelete(event)">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="bg-rose-100 text-rose-900 text-bold px-3 py-2 rounded-lg m-1 text-sm">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php echo e($products->links()); ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP_Laravel_Vue\assignment-4\product_management\resources\views/layouts/index.blade.php ENDPATH**/ ?>