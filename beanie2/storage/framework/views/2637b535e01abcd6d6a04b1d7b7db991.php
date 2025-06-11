<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Unsuccessful</title>

    <!-- Bootstrap CDN for styling (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(route('menus')); ?>">MyShop</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('menus')); ?>">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('cart')); ?>">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container text-center py-5">
        <h1 class="text-danger">Payment Failed</h1>
        <p>Something went wrong during your payment process.</p>
        <a href="<?php echo e(route('menus')); ?>" class="btn btn-primary mt-3">Return to Menu</a>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\beanie2\resources\views/unsuccessful.blade.php ENDPATH**/ ?>