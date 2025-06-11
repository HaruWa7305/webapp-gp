<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-4">Admin Dashboard</h1>

    <a href="<?php echo e(route('admin.contact_forms.index')); ?>" class="btn btn-primary mb-4">View Feedback</a>

    <!-- Other dashboard content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\beanie2\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>