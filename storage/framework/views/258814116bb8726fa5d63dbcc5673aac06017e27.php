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
                        <h3>Settings</h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div id="update-success" style="display:none;" class="alert alert-success alert-dismissible fade show">
                                        <strong>Success!</strong> <span id="success-alert"></span>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="verification-tab" data-bs-toggle="tab" href="#verification" role="tab" aria-controls="verification" aria-selected="false">Verification</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">


                                <div class="tab-pane fade active show" id="verification" role="tabpanel" aria-labelledby="verification-tab">
                                    
                                    <form id="smtp-form">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="1" class="form-control">
                                        <div class="col-md-6">
                                            <p class="text-muted">Verification code to validate the user in website</p>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Verification Code</label>
                                                <input type="text" name="code" value="<?php echo e($data['varification-code']); ?>" class="form-control">
                                            </div>
                                            <div class="mb-3 text-end">
                                                <button class="btn btn-success" id="smtp-submit" type="submit"><i class="fas fa-check"></i> Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
     <?php $__env->slot('footer', null, []); ?> 



        <script>
            $(document).ready(function() {

                $(document).on('click', 'button[id="smtp-submit"]', function(event) {
                    event.preventDefault();
                    var data = $("#smtp-form").serialize();
                    var msg ="Verification code updated successfully.";
                    save_data(data,msg);
                });


                function save_data(data,msg) {
                    var code = $("#code").val();

                    $.ajax({
                        type: 'POST',
                        url: "<?php echo e(url('admin/setting/update')); ?>",
                        data: data,
                        dataType: "json",
                        success: function(resp) {
                            if (JSON.stringify(resp.success)) {
                                $("#success-alert").text(msg);
                                $("#update-success").css("display", "block");
                                $("html, body").animate({
                                    scrollTop: 0
                                }, "slow");
                                setTimeout(function() {
                                    $("#update-success").css("display", "none");
                                }, 5000);
                            }
                            if (JSON.stringify(resp.errors)) {
                                window.alert(JSON.stringify(resp.errors));

                            }

                        },
                        error: function(resp, error) {
                            swal("NOT SAVED!", "Something blew up.", "error");
                        }
                    });
                }

            });
        </script>

     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal749747b3cad97a84caef38f50f9a7f98dfdbd64e)): ?>
<?php $component = $__componentOriginal749747b3cad97a84caef38f50f9a7f98dfdbd64e; ?>
<?php unset($__componentOriginal749747b3cad97a84caef38f50f9a7f98dfdbd64e); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\pitta-onam\resources\views/admin/settings/index.blade.php ENDPATH**/ ?>