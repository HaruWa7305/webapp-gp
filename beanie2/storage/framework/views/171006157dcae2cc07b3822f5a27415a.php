<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Beanie</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md p-8 bg-white rounded-xl shadow-lg">
        <!-- Beanie Logo and Title -->
        <div class="text-center mb-6">
            <h1 class="text-4xl font-bold sitename mb-0">☕ Beanie<span>.</span></h1>
        </div>

        <?php if(session('status')): ?>
            <div class="mb-4 text-sm text-green-600">
                <?php echo e(session('status')); ?>

            </div>
        <?php endif; ?>

        <?php if($errors->any()): ?>
            <div class="mb-4 text-red-600 text-sm">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>- <?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('login')); ?>" class="space-y-4">
            <?php echo csrf_field(); ?>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required autofocus
                       class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-300">
            </div>

            <!-- Remember Me -->
            <div class="flex items-center">
                <input type="checkbox" name="remember" id="remember" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                <label for="remember" class="ml-2 block text-sm text-gray-700">Remember me</label>
            </div>

           <div class="flex items-center justify-between mt-6">
    <div class="flex flex-col text-sm space-y-1">
        <?php if(Route::has('password.request')): ?>
            <a href="<?php echo e(route('password.request')); ?>" class="text-blue-600 hover:underline">Forgot password?</a>
        <?php endif; ?>
        <a href="<?php echo e(route('register')); ?>" class="text-blue-600 hover:underline">Don't have an account? Register</a>
    </div>


    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
        Login
    </button>
</div>

        </form>
    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\beanie2\resources\views/auth/login.blade.php ENDPATH**/ ?>