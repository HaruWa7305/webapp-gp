<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-4">Registered Users</h1>

    <?php if(session('message')): ?>
        <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>

    <table class="min-w-full bg-white border rounded shadow">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Registered</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="py-2 px-4 border-b"><?php echo e($user->id); ?></td>
                    <td class="py-2 px-4 border-b"><?php echo e($user->name); ?></td>
                    <td class="py-2 px-4 border-b"><?php echo e($user->email); ?></td>
                    <td class="py-2 px-4 border-b"><?php echo e($user->created_at->format('d M Y')); ?></td>
                    <td class="py-2 px-4 border-b">
                        <?php if(auth()->id() !== $user->id): ?>
                            <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this user?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit"
                                        class="bg-red-600 text-white px-3 py-1 rounded">
                                    Delete
                                </button>
                            </form>
                        <?php else: ?>
                            <span class="text-gray-400">You</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\beanie2\resources\views/admin/users/index.blade.php ENDPATH**/ ?>