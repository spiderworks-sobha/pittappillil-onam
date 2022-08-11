<?php if (isset($component)) { $__componentOriginaladf290bccd57f496936d9c59dfb92e6ffd4acdf7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DefaultLayout::class, []); ?>
<?php $component->withName('default-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('head', null, []); ?> 
        <style>
label.error {
    color: red;
    font-size: 10px;
    position: absolute; 
    bottom: -18px;
    left:0;
}
.form-check  { 
    position: relative;
}
.form-check label.error { 
    bottom: unset;
    top:23px;
}
 
        </style>
     <?php $__env->endSlot(); ?>
    
    
  <!-- Modal -->

 
 <div class="aster-header" id="navbar-example">
<div class="container">
<nav class="navbar navbar-expand-lg ">
  <div class="container-fluid p-0">
    <a class="navbar-brand" href="#"><img src="<?php echo e(asset('public/assets/web')); ?>/img/pittappillil-logo.png" alt="..."> </a>
</nav>
</div>
</div>


<section class="banner">
    <div class="container">
        <div class="row d-flex align-items-center flex-row-reverse justify-content-center">
           
            <div class="col-md-7" id="response-body">
                <div class="form-cntr">
                    <!-- <h2 >Become a Swasthyam Beneficiary. Enroll Now. </h2> -->
                    

                    <form id="InputFrm" role="form"  method="POST" action="<?php echo e(url('submissions/save')); ?>">
                                <?php echo csrf_field(); ?>

                        <div class=" form-cntr-main">

                            <div class="row g-3">



                        <div class="col-lg-12 col-md-12  col-12 "> 
                            <div class="form-group">
                            <svg  width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2499 5.16458C12.2499 7.24497 10.5819 8.91312 8.5 8.91312C6.41884 8.91312 4.75009 7.24497 4.75009 5.16458C4.75009 3.08418 6.41884 1.41675 8.5 1.41675C10.5819 1.41675 12.2499 3.08418 12.2499 5.16458ZM8.5 15.5834C5.42751 15.5834 2.83333 15.084 2.83333 13.1573C2.83333 11.23 5.44381 10.7483 8.5 10.7483C11.5732 10.7483 14.1667 11.2477 14.1667 13.1743C14.1667 15.1017 11.5562 15.5834 8.5 15.5834Z" fill="#130F26" fill-opacity="0.83"/>
                            </svg> 
                          <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        </div>


                        <div class="col-lg-6 col-md-12 col-12"> 
                            <div class="form-group phon-number-fld">

                                <div class="input-group  ">
                                 <img src="<?php echo e(asset('public/assets/web')); ?>/img/india.png" alt="..." class="img-fluid">
                                        
                                    <span class="input-group-text" id="basic-addon1">  +91</span>  
                                      <input type="tel" id="phone_number" name="phone_number" class="form-control"  placeholder="Phone Number" maxlength= "10">
                                  </div>
                                                           
                           
                        </div>                                  
                        
                     
                        </div>

                        <div class="col-lg-6 col-md-12 col-12"> 
                            <div class="form-group"> 
                                                                     
                                <select id="inputState" class="form-select" name="branch">
                                    <option value="">Branch</option>
                                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($branch->name); ?>"><?php echo e($branch->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>

                         
                        <div class="col-md-12 col-12"> 
                            <div class="form-group"> 
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.1834 1.82899C14.8291 1.46534 14.3047 1.32986 13.8157 1.47247L2.41399 4.78808C1.89812 4.9314 1.53247 5.34282 1.43397 5.86547C1.33334 6.3974 1.68482 7.07264 2.14401 7.355L5.70909 9.54615C6.07474 9.77076 6.54669 9.71443 6.84927 9.40925L10.9316 5.30146C11.1371 5.08755 11.4773 5.08755 11.6828 5.30146C11.8883 5.50824 11.8883 5.84337 11.6828 6.05728L7.59332 10.1658C7.29003 10.4702 7.23334 10.9444 7.45656 11.3123L9.63487 14.9132C9.88997 15.341 10.3293 15.5834 10.8112 15.5834C10.8679 15.5834 10.9316 15.5834 10.9883 15.5763C11.5411 15.505 11.9804 15.1271 12.1434 14.5923L15.5235 3.20514C15.6723 2.72028 15.5377 2.19263 15.1834 1.82899" fill="#130F26" fill-opacity="0.83"/>
                                    </svg>
                                    
                          <input type="text" id="invoice" name="invoice" class="form-control" placeholder="Invoice Number" >
                        </div>
                        </div>


                        <div id="errors-holder" style="display:none;" class="alert alert-danger alert-dismissible fade show">
                                            <strong>Error!</strong>
                                            <p id="errors"></p>
                                        </div>


                    </div>
                </div>



                        <div class="col-12">
                         

                            <button type="submit"  id="submit-btn" class="btn btn-primary" >
                                Apply Now  <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.0286 9.28977C17.0286 9.48302 16.9435 9.66083 16.7889 9.80776L11.6554 14.9412C11.4931 15.0881 11.3307 15.1499 11.1529 15.1499C10.7663 15.1499 10.4726 14.8717 10.4726 14.4851C10.4726 14.3073 10.5422 14.1217 10.6659 13.998L12.3899 12.2353L15.003 9.86183L13.1243 9.98557H3.35223C2.95022 9.98557 2.67188 9.69178 2.67188 9.28977C2.67188 8.88777 2.95022 8.60166 3.35223 8.60166H13.1243L14.9953 8.71764L12.3899 6.3442L10.6659 4.58924C10.5344 4.45781 10.4726 4.27999 10.4726 4.09445C10.4726 3.71562 10.7663 3.42957 11.1529 3.42957C11.3307 3.42957 11.5008 3.49915 11.6709 3.6615L16.7889 8.77179C16.9435 8.9264 17.0286 9.10421 17.0286 9.28977Z" fill="white"/>
                                    </svg>
                              </button>
                            
                        </div>
                      </form>


                </div>
                
            </div>

        </div>

 
</div>

</section>
  


         <?php $__env->slot('footer', null, []); ?> 
        <script src="<?php echo e(asset('public/assets/web')); ?>/js/validate.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
         $(document).ready(function() {
        $('#InputFrm').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    phone_number: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        digits: true,
                    },
                    branch: {
                        required: true,
                    },
                    invoice: {
                        required: true,
                        remote: {
                            url: "<?php echo e(url('check-invoice')); ?>",
                            type: 'POST',
                            async: false,
                            data: {
                                _token: function() {
                                    var token = "<?php echo e(csrf_token()); ?>";
                                    return token;
                                },
                                invoice: function() {
                                    return $("#invoice").val();
                                }
                            }
                        }
                    }
                },
                messages: {
                    name: {
                        required: "Please enter name",
                    },
                    phone_number: {
                        required: "Please enter phone number",
                    },
                    branch: {
                        required: "Please select a branch",
                    },
                    invoice: {
                        required: "Please enter invoice number",
                        remote: "This invoice is already claimed"
                    }
                },
                submitHandler:function(form)
                {
                    var submit_btn_text = $('#submit-btn').html();
                    $('#submit-btn').prop('disabled', true).html('Processing...');
                    var formurl = $('#InputFrm').attr('action');
                        $.ajax({
                            url: formurl ,
                            type: "POST", 
                            data: new FormData($('#InputFrm')[0]),
                            cache: false, 
                            processData: false,
                            contentType: false, 
                            success: function(data) {
                                $('#submit-btn').prop('disabled', false).html(submit_btn_text);
                                if (typeof data.errors != "undefined") {
                                    var errors = JSON.parse(JSON.stringify(data.errors))
                                    display_error(errors);
                                }
                                else
                                {
                                    $('#response-body').html(data);
                                }
                            },
                            error:function(xhr){
                                $('#submit-btn').prop('disabled', false).html(submit_btn_text);
                                var errors = $.parseJSON(xhr.responseText);
                                display_error(errors);
                            }
                        });
                }
            })
    });
    var display_error = function(errors){
            var html = "<ul>";
            $.each(errors, function (key, val) {
                html +='<li>'+val+'</li>';
            });
            html += '</ul>';
            $('#errors').html(html);
            $('#errors-holder').show();
        } 
        </script>




     <?php $__env->endSlot(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaladf290bccd57f496936d9c59dfb92e6ffd4acdf7)): ?>
<?php $component = $__componentOriginaladf290bccd57f496936d9c59dfb92e6ffd4acdf7; ?>
<?php unset($__componentOriginaladf290bccd57f496936d9c59dfb92e6ffd4acdf7); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\pitta-onam\resources\views/web/home.blade.php ENDPATH**/ ?>