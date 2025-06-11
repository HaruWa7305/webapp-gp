<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-4">Orders</h1>

    <?php if($orders->isEmpty()): ?>
        <p class="text-gray-600">No orders found.</p>
    <?php else: ?>
        <table class="min-w-full bg-white border rounded shadow">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Order ID</th>
                    <th class="py-2 px-4 border-b">Customer</th>
                    <th class="py-2 px-4 border-b">Total Price (RM)</th>
                    <th class="py-2 px-4 border-b">Date</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="py-2 px-4 border-b"><?php echo e($order->id); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo e($order->user->name ?? 'Guest'); ?></td>
                        <td class="py-2 px-4 border-b">RM<?php echo e(number_format($order->total, 2)); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo e($order->created_at->format('d M Y')); ?></td>
                        <td class="py-2 px-4 border-b">
                            <form action="<?php echo e(route('admin.orders.updateStatus', $order->id)); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>
    <select name="status" class="form-select" onchange="this.form.submit()">
        <option value="pending" <?php echo e($order->status === 'pending' ? 'selected' : ''); ?>>Pending</option>
        <option value="completed" <?php echo e($order->status === 'completed' ? 'selected' : ''); ?>>Completed</option>
    </select>
</form>
                        </td>
                        <td class="py-2 px-4 border-b">
    <!-- Delete button, using a form with DELETE method -->
    <form action="<?php echo e(route('admin.orders.destroy', $order->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');" class="inline">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded">Delete</button> <!-- Delete button -->
    </form>
</td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\beanie2\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>