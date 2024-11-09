<?php $__env->startSection('title'); ?>
    Product Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto p-8">
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">Product Details</h1>
            <a href="<?php echo e(route('products.all')); ?>" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                View All Products
            </a>
        </div>

        <div class="border-y-4 border-indigo-500 p-5 rounded-md shadow-lg">
            <div class="mb-4">
                <strong>Product ID:</strong> <?php echo e($product->product_id); ?>

            </div>
            <div class="mb-4">
                <strong>Name:</strong> <?php echo e($product->name); ?>

            </div>
            <div class="mb-4">
                <strong>Description:</strong> <?php echo e($product->description); ?>

            </div>
            <div class="mb-4">
                <strong>Price:</strong> $<?php echo e(number_format($product->price, 2)); ?>

            </div>
            <div class="mb-4">
                <strong>Stock:</strong> <?php echo e($product->stock); ?>

            </div>
            <?php if($product->image): ?>
                <div class="mb-4">
                    <strong>Image:</strong>
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Product Image" class="w-32 h-32 object-cover mt-2">
                </div>
            <?php endif; ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP_Laravel_Vue\assignment-4\product_management\resources\views/layouts/show.blade.php ENDPATH**/ ?>