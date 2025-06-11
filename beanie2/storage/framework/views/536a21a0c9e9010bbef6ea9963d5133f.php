<?php $__env->startSection('content'); ?>
    <h1 class="text-2xl font-bold mb-4">Contact Form Submissions</h1>

    <?php if($contactForms->isEmpty()): ?>
        <p class="text-gray-600">No submissions yet.</p>
    <?php else: ?>
        <table class="min-w-full bg-white border rounded shadow">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Message</th>
                    <th class="py-2 px-4 border-b">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $contactForms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contactForm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="py-2 px-4 border-b"><?php echo e($contactForm->name); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo e($contactForm->email); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo e($contactForm->message); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo e($contactForm->created_at->format('d M Y')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\beanie2\resources\views/admin/contact_forms/index.blade.php ENDPATH**/ ?>