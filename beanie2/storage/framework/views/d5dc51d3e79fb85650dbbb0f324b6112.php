<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Status</title>

    <!-- Bootstrap CDN for styling (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Amatic SC', cursive;
            background: #fff8f0;
            color: #3e2f23;
        }

        .header {
            background-color: #3e2f23;
            padding: 15px 0;
        }

        .logo h1 {
            font-size: 2.5rem;
            color: white;
            margin: 0;
        }

        .logo span {
            color: #cba983;
        }

        .navmenu ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            align-items: center;
        }

        .navmenu ul li a {
            font-size: 1.2rem;
            font-weight: bold;
            color: white;
            margin-left: 1.5rem;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .navmenu ul li a:hover,
        .navmenu ul li a.active {
            color: #cba983;
        }

        .btn-getstarted {
            background: #cba983;
            color: white;
            padding: 8px 20px;
            border-radius: 30px;
            font-weight: bold;
            text-decoration: none;
        }

        .btn-getstarted:hover {
            background: #b48b63;
            color: white;
        }

        .mobile-nav-toggle {
            font-size: 2rem;
            color: white;
            cursor: pointer;
            display: none;
        }

        @media (max-width: 991.98px) {
            .navmenu {
                display: none;
                position: absolute;
                top: 65px;
                right: 20px;
                background-color: #3e2f23;
                border-radius: 10px;
                width: 180px;
                flex-direction: column;
                padding: 10px 0;
                z-index: 9999;
            }

            .navmenu ul {
                flex-direction: column;
                gap: 10px;
            }

            .navmenu ul li a {
                margin-left: 0;
                padding: 8px 20px;
                display: block;
            }

            .navmenu.show {
                display: flex;
            }

            .mobile-nav-toggle {
                display: block;
            }
        }

        section {
            padding: 4rem 0;
            text-align: center;
        }

        section h2 {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #3e2f23;
        }

        section p.lead {
            font-size: 1.3rem;
            margin-bottom: 3rem;
            color: #5a4a3e;
        }

        footer {
            background-color: #3e2f23;
            color: white;
            padding: 1.5rem 0;
            text-align: center;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <!-- Header/Navbar -->
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container d-flex align-items-center justify-content-between position-relative">
            <a href="#" class="logo d-flex align-items-center text-decoration-none">
                <h1 class="sitename mb-0">☕ Beanie<span>.</span></h1>
            </a>
            <nav id="navmenu" class="navmenu d-xl-flex align-items-center">
                <ul class="mb-0 d-flex align-items-center gap-3">
                    <li><a href="#hero" class="active">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#menu">Menu</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="<?php echo e(route('menus')); ?>">Order Now</a></li>
                    <li><a href="<?php echo e(route('orders.status')); ?>">Order Status</a></li>
                    <li class="d-xl-none">
                        <a href="<?php echo e(route('profile')); ?>" class="btn-getstarted" style="display: block; margin: 0.5rem 1rem;">
                            Profile
                        </a>
                    </li>
                </ul>
            </nav>
            <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
            <a href="<?php echo e(route('profile')); ?>" class="btn-getstarted d-none d-xl-inline-block">Profile</a>
        </div>
    </header>

    <div class="container mt-5">
        <h1 class="text-center">Order Status</h1>
        <?php if($orders->isEmpty()): ?>
            <p>You have no orders yet.</p>
        <?php else: ?>
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($order->id); ?></td>
                            <td><?php echo e($order->status); ?></td>
                            <td><?php echo e($order->created_at->format('d M Y')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <footer>
        <div class="container">
            &copy; 2025 Beanie Coffee Shop. All Rights Reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\beanie2\resources\views/orders/status.blade.php ENDPATH**/ ?>