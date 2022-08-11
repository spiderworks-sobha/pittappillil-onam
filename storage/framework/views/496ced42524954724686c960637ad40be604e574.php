<div class="content">
    <div class="container">
        <div class="page-title">
            <h3 class="text-uppercase">Update Claim Status</h3>
        </div>
        <div class="row">

            <div id="success-holder" style="display:none;" class="alert alert-success alert-dismissible fade show">
                
            </div>

            <div class="col-lg-12">
                <div class="card no-border aster-card">
                    <div class="card-body">
                                <div class="form-group">
                                    <label for="invoice">Name: </label>
                                    <b><?php echo e($obj->name); ?></b>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="invoice">Invoice: </label>
                                    <b><?php echo e($obj->invoice); ?></b>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="invoice">Phone Number: </label>
                                    <b><?php echo e($obj->phone_number); ?></b>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="invoice">Branch: </label>
                                    <b><?php echo e($obj->branch); ?></b>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="invoice">Gift: </label>
                                    <b><?php echo e($obj->gift->name); ?></b>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="invoice">Submitted On: </label>
                                    <b><?php echo e(date('d M, Y h:i A', strtotime($obj->created_at))); ?></b>
                                </div>
                                <hr/>
                                <div class="form-group">
                                    <label for="invoice">Claimed On: </label>
                                    <b><?php echo e(date('d M, Y h:i A', strtotime($obj->claimed_on))); ?></b>
                                </div>
                                <hr/>
                                <?php if($obj->note): ?>
                                <div class="form-group">
                                    <label for="invoice">Note: </label>
                                    <b><?php echo nl2br($obj->note); ?></b>
                                </div>
                                <hr/>
                                <?php endif; ?>
                                <div class="">
                                    <div class="col-sm-12">
                                        <div class="lead-button-block">
                                            <div>
                                                <a id="close-modal" data-dismiss="modal" class="btn btn-secondary mb-2 lead-cancel-btn"><i class="fas fa-times"></i> Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\pitta-onam\resources\views/admin/claimed_submissions/_partials/form.blade.php ENDPATH**/ ?>