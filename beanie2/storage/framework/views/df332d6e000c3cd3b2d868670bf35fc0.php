<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
</head>
<body style="display: flex; min-height: 100vh; background-color: #FAF3E0; color: #3E2723;">

    
    <?php echo $__env->make('admin.partials.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <main style="flex: 1; padding: 2rem; background-color: white; margin: 1rem; border-radius: 0.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\beanie2\resources\views/admin/layouts/admin.blade.php ENDPATH**/ ?>