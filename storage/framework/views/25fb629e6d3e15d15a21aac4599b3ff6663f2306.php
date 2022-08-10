<div class="content">
    <div class="container">
        <div class="page-title">
            <?php if($obj->id): ?>
                <h3 class="text-uppercase">Edit Gift <a href="<?php echo e(route($route.'.create')); ?>" class="btn btn-sm btn-light show-form-modal">Add new Gift</a></h3>
                
            <?php else: ?>
                <h3 class="text-uppercase">Add new Gift</h3>
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
                                    <label for="name">Name</label>
                                    <input type="input" class="form-control" id="name" name="name" value="<?php echo e($obj->name); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="probability">Probability</label>
                                    <input type="number" class="form-control" id="probability" name="probability" value="<?php echo e($obj->probability); ?>">
                                </div>
                                <div class="form-group">
                                    <label for="is_special_gift">Gift Type</label>
                                    <select class="form-select" id="is_special_gift" name="is_special_gift">
                                        <option value="0">Normal</option>
                                        <option value="1" <?php if($obj->is_special_gift == 1): ?> selected="selected" <?php endif; ?>>Special</option>
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
</div><?php /**PATH C:\xampp\htdocs\pitta-onam\resources\views/admin/gifts/_partials/form.blade.php ENDPATH**/ ?>