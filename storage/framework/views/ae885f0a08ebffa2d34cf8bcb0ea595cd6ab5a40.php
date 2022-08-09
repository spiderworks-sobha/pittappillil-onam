<?php $__env->startSection('content'); ?>

<tr>
    <td valign="middle" class="skyline skyline-2 bg_white">
        <table>
            <tbody>
                <tr>

            

                    <td>
                        <div class="thank-msg">
                            <h1>Aster Privilege Card Request</h1>
                        </div>

                        <p>You have received a privilege card request.Please check below link for more details.</p>

                        <table class="email-table">
                            <thead>

                                <tr>
                                    <td>Name: </td>
                                    <td> <?php echo e($data->name); ?></td>
                                </tr>
                                <tr>
                                    <td>Email: </td>
                                    <td> <?php echo e($data->email); ?></td>
                                </tr>
                                <tr>
                                    <td>Phone: </td>
                                    <td> <?php echo e($data->phone); ?></td>
                                </tr>

                                <?php if($data->locality): ?>
                                <tr>
                                    <td>Locality: </td>
                                    <td> <?php echo e($data->locality); ?></td>
                                </tr>
                                <?php endif; ?>
                            </thead>


                        </table>
                        <br>
                        <br>

                        <!--<p style="text-align:center"><a style="border: none;color: #27a4da;" href="<?php echo e(url('admin')); ?>">View Details</a></p>-->
                        <button class="email-btn"><a href="<?php echo e(url('admin')); ?>">View Details</a></button>


                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('email._layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/asterprivilege/public_html/resources/views/email/mainmail.blade.php ENDPATH**/ ?>