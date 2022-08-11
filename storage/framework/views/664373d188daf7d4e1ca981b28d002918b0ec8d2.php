<nav id="sidebar" class="">
    <div class="sidebar-header" style="background-color: #f4f6fa;">
        <img src="<?php echo e(asset('public/assets')); ?>/img/logo.jpg" style="width: 20%;" alt="bootraper logo" class="app-logo">
    </div>
    <ul class="list-unstyled components text-secondary">

        <li>
            <a href="<?php echo e(route('admin.gifts.index')); ?>"><i class="fas fa-gift"></i> Gifts</a>
        </li>
        <li>
            <a href="<?php echo e(route('admin.special-invoices.index')); ?>"><i class="fas fa-donate"></i> Special Invoices</a>
        </li>
        <li>
            <a href="<?php echo e(route('admin.submissions.index')); ?>"><i class="fas fa-trophy"></i> Winners</a>
        </li>
        <li>
            <a href="<?php echo e(route('admin.claimed-submissions.index')); ?>"><i class="fas fa-medal"></i> Claims</a>
        </li>

    </ul>
</nav><?php /**PATH C:\xampp\htdocs\pitta-onam\resources\views/admin/nav.blade.php ENDPATH**/ ?>