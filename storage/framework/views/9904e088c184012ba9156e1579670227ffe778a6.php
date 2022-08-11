<?php if (isset($component)) { $__componentOriginal749747b3cad97a84caef38f50f9a7f98dfdbd64e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AdminAppLayout::class, []); ?>
<?php $component->withName('admin-app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('head', null, []); ?> 
     <?php $__env->endSlot(); ?>
    <div class="wrapper">

        <?php echo $__env->make('admin.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div id="body" class="active">
            <!-- navbar navigation component -->
            <?php echo $__env->make('admin.drop_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- end of navbar navigation -->
            <div class="content">
                <div class="container">
                    <div class="page-title">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Claimed Winners</h3>
                    </div>

                    <div class="col-md-6 text-end">
                    </div>
                </div>
                    </div>
                    <div class="row">


                        <div class="col-md-12 col-lg-12">
                            <div class="card">

                                <?php echo $__env->make('admin.claimed_submissions._partials.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            </div>
                        </div>

                    </div>

                        <!-- basic modal -->
                    <?php echo $__env->make('admin.form_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>


        </div>
    </div>
     <?php $__env->slot('footer', null, []); ?> 
    <script>
        var my_columns = [
            {data: 'updated_at', name: 'updated_at'},
            {data: null, name: 'id'},
            {data: 'invoice', name: 'invoice'},
            {data: 'name', name: 'name'},
            {data: 'gift', name: 'gifts.name'},
            {data: 'date', name: 'updated_at'},
            {data: 'action_edit', name: 'action_edit'},
        ];
        var slno_i = 0;
        var order = [0, 'desc'];

    </script>
     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal749747b3cad97a84caef38f50f9a7f98dfdbd64e)): ?>
<?php $component = $__componentOriginal749747b3cad97a84caef38f50f9a7f98dfdbd64e; ?>
<?php unset($__componentOriginal749747b3cad97a84caef38f50f9a7f98dfdbd64e); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\pitta-onam\resources\views/admin/claimed_submissions/index.blade.php ENDPATH**/ ?>