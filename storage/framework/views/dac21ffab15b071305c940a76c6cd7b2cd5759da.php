<div class="content">
    <div class="container">
        <div class="page-title">
            <?php if($obj->id): ?>
                <h3 class="text-uppercase">Edit Invoice <a href="<?php echo e(route($route.'.create')); ?>" class="btn btn-sm btn-light show-form-modal">Add new Invoice</a></h3>
                
            <?php else: ?>
                <h3 class="text-uppercase">Add new Invoice</h3>
            <?php endif; ?>
        </div>
        <div class="row">

            <div id="success-holder" style="display:none;" class="alert alert-success alert-dismissible fade show">
                
            </div>

            <div class="col-lg-12">
                <div class="card no-border aster-card">
                    <div class="card-body">
                            <?php if($obj->id): ?>
                                <form method="POST" action="<?php echo e(route($route.'.update')); ?>" class="p-t-15" id="InputFrm" data-validate=true>
                            <?php else: ?>
                                <form method="POST" action="<?php echo e(route($route.'.store')); ?>" class="p-t-15" id="InputFrm" data-validate=true>
                            <?php endif; ?>
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" <?php if($obj->id): ?> value="<?php echo e(encrypt($obj->id)); ?>" <?php endif; ?> id="inputId">

                                <div class="form-group">
                                    <label for="invoice">Invoice</label>
                                    <input type="input" class="form-control" id="invoice" name="invoice" value="<?php echo e($obj->invoice); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="gifts_id">Gift</label>
                                    <select class="form-select" id="gifts_id" name="gifts_id">
                                        <option value=""> -- Select Gift --</option>
                                        <?php $__currentLoopData = $gifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($gift->id); ?>" <?php if($gift->id == $obj->gifts_id): ?> selected="selected" <?php endif; ?>><?php echo e($gift->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="">
                                    <div class="col-sm-12">
                                        <div id="errors-holder" style="display:none;" class="alert alert-danger alert-dismissible fade show">
                                            <strong>Error!</strong>
                                            <p id="errors"></p>
                                        </div>
                                        <div class="lead-button-block">
                                            <div>
                                                <a id="close-modal" data-dismiss="modal" class="btn btn-secondary mb-2 lead-cancel-btn"><i class="fas fa-times"></i> Cancel</a>
                                                <button type="submit" class="btn btn-primary mb-2 lead-update-btn" id="submit-btn"><i class="fas fa-save"></i> Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\pitta-onam\resources\views/admin/special_invoices/_partials/form.blade.php ENDPATH**/ ?>