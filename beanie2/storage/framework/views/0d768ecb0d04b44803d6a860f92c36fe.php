<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-4">Manage Products</h1>

    <?php if(session('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('admin.products.create')); ?>"
        class="inline-block mb-4 text-white font-semibold py-2 px-4 rounded shadow"
        style="background-color: #2563EB;">
        + Add Product
    </a>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Price (RM)</th>
                <th class="py-2 px-4 border-b">Quantity</th>
                <th class="py-2 px-4 border-b">Image</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="py-2 px-4 border-b"><?php echo e($product->name); ?></td>
                    <td class="py-2 px-4 border-b">RM<?php echo e(number_format($product->price, 2)); ?></td>
                    <td class="py-2 px-4 border-b"><?php echo e($product->quantity); ?></td>
                    <td class="py-2 px-4 border-b">
                        <?php if($product->img): ?>
                            <img src="<?php echo e(asset('storage/' . $product->img)); ?>" alt="<?php echo e($product->name); ?>" class="h-16">
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                    <td class="py-2 px-4 border-b">
                        <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>"
                            class="bg-yellow-400 hover:bg-yellow-500 text-white py-1 px-3 rounded mr-2">Edit</a>

                        <!-- Increase Quantity Button -->
                        <form action="<?php echo e(route('admin.products.updateQuantity', $product->id)); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" name="action" value="increase"
                                class="inline-block mb-4 text-white font-semibold py-2 px-4 rounded shadow"
                                style="background-color:rgb(241, 11, 11);">
                                Increase Quantity
                            </button>
                        </form>

                        <!-- Decrease Quantity Button -->
                        <form action="<?php echo e(route('admin.products.updateQuantity', $product->id)); ?>" method="POST" class="inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <button type="submit" name="action" value="decrease"
                                class="inline-block mb-4 text-white font-semibold py-2 px-4 rounded shadow"
                                style="background-color:rgb(241, 11, 11);">
                                Decrease Quantity
                            </button>
                        </form>

                        <!-- Delete Product Button -->
                        <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST" class="inline"
                            onsubmit="return confirm('Are you sure you want to delete this product?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit"
                                class="inline-block mb-4 text-white font-semibold py-2 px-4 rounded shadow"
                                style="background-color:rgb(241, 11, 11);">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="py-2 px-4 text-center">No products found.</td> <!-- Adjust colspan to 5 -->
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\beanie2\resources\views/admin/products/index.blade.php ENDPATH**/ ?>