<link href="<?php echo e(asset('public/assets/admin')); ?>/vendor/datatables/datatables.min.css" rel="stylesheet">
<style>
    #dataTables-example_paginate {
        display: none;
    }

    .stat-color-1 {
        color: green !important;
    }

    .stat-color-2 {
        color: yellow !important;
    }

    .stat-color-3 {
        color: red !important;
    }

    .edit-msg {
        color: #ffc107 !important;
    }

    /* table {
                counter-reset: rowNumber;
            }

            table tr {
                counter-increment: rowNumber;
            }

            table tr td:first-child::before {
                content: counter(rowNumber);
                min-width: 1em;
                margin-right: 0.5em;
            } */


    .card.no-border.aster-card {
        border: 0px;
        padding: 0;
        box-shadow: none;
    }


    .card.no-border.aster-card .card-body {
        padding: 30px 0;
        border-bottom: 0;
    }

    .card.no-border.aster-card label.form-label {
        font-style: normal;
        font-weight: 700;
        font-size: 12px;
        line-height: 20px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #2D3387;
    }

    .lead-button-block {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .lead-button-block span {
        font-style: normal;
        font-weight: 400;
        font-size: 16px;
        line-height: 26px;
        color: rgba(21, 20, 57, 0.4);
    }

    button.btn.btn-primary.mb-2.lead-update-btn {
        background-color: #2D3387;
        border-color: #2D3387;
        margin-left: 15px;
    }

    textarea.form-control {
        font-size: 17px;
        border: 1px solid #d2e4ff;
        color: #4f5d66;
        background-color: #fff !important;
        margin-bottom: 8px !important;
    }

    button#ad-edit {
        display: block;
        margin: auto !important;
        margin-right: 0 !important;
        background-color: #00AE96;
        border-color: #00AE96;
        color: #fff;
        padding: 4px 8px !important;
        transition: .25s;
    }

    button#ad-edit:hover {
        background-color: #2D3387;
        border-color: #2D3387;
        color: #fff;
        padding: 4px 8px !important;
        transition: .25s;
    }

    button#ad-edit:focus {
        background-color: #2D3387;
        border-color: #2D3387;
        color: #fff;
        padding: 4px 8px !important;
        transition: .25s;
    }

    .copy input {
        opacity: 0;
        width: auto;
        padding: 0;
        position: absolute;
        margin: 0;
        z-index: -33;
    }



    .view-card-block {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
    }


    .copy button {
        background-color: #6c757d;
        border: 0;
        color: #fff;
        border-radius: 5px;
        min-height: 38px;
        padding: 0 10px;
    }



    .can-toggle {
        position: relative;
    }


    .can-toggle input[type="checkbox"] {
        position: relative;
        width: 60px;
        height: 30px;
        -webkit-appearance: none;
        background: #e9ecef;
        outline: none;
        border-radius: 20px;
        box-shadow: inset 0 0 5px rgb(183 183 183 / 20%);
        transition: 0.25s;
    }

    .can-toggle input:checked[type="checkbox"] {
        background: #2D3387;
    }

    .can-toggle input[type="checkbox"]:before {
        content: '';
        position: absolute;
        width: 30px;
        height: 30px;
        border-radius: 20px;
        top: 0;
        left: 0;
        background: #ffffff;
        transform: scale(1.1);
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        transition: .25s;
    }

    .can-toggle input:checked[type="checkbox"]:before {
        left: 40px;
    }

    select#otp-verify {
        font-size: 17px;
        border: 1px solid #d2e4ff;
        min-height: 50px;
        color: #4f5d66;
        background-color: #fff !important;
        margin-bottom: 8px !important;
        border-radius: 8px;
        padding: 0 10px;
    }
</style>






<div class="content  ">
    <div class="container">
        <div class="page-title">
            <h3><svg data-dismiss="modal" aria-label="Close" width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.5001 43.0833C34.3157 43.0833 43.0834 34.3155 43.0834 23.5C43.0834 12.6844 34.3157 3.91663 23.5001 3.91663C12.6845 3.91663 3.91675 12.6844 3.91675 23.5C3.91675 34.3155 12.6845 43.0833 23.5001 43.0833Z" stroke="#1E0E62" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M23.5001 15.6666L15.6667 23.5L23.5001 31.3333" stroke="#2D3387" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M31.3334 23.5H15.6667" stroke="#2D3387" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>Back to <b>Discounts</b></h3>
        </div>
        <div class="row">

            <div id="update-success" style="display:none;" class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> New Application Created successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>

            <div class="col-lg-12">
                <div class="card no-border aster-card">
                    <div class="card-header">New </div>
                    <div class="card-body">
                        <!--                                      <button class="btn btn-warning mb-2" style="font-size: 13px;" id="ad-edit">Advanced Edit</button>
 -->
                        <form accept-charset="utf-8" id="application_save" class="row">
                            <?php echo csrf_field(); ?>
                            <div class="mb-2 col-lg-8 col-md-8 col-sm-12 col-12">
                                <label class=" form-label">Status</label>
                                <?php
                                $status = array(
                                    'New Application' => 0,
                                );
                                $options = '';
                                ?>
                                <div class="col-sm-12 select">
                                    <select id="status" name="status" class="form-select">


                                        <option value="0">New Application</option>


                                    </select>
                                </div>

                            </div>


                            <div class="mb-2 col-lg-4 col-md-4 col-sm-12 col-12">


                                <label class="col-sm-12 form-label" for="notes">OTP State </label>
                                <select id="otp-verify" name="otp_state">
                                    <option value="verified">Verified</option>
                                    <!--                                               <option edit value="pending">Pending</option>
 -->
                                </select>

                            </div>




                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="working_place">Working Place</label>
                                <div class="col-sm-12">
                                    <textarea type="text" id="working_place" name="working_place" class="form-control"></textarea>

                                </div>
                            </div>


                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="g_c_or_a">Gated community or Association</label>
                                <div class="col-sm-12">
                                    <textarea type="text" id="g_c_or_a" name="g_c_or_a" class="form-control"></textarea>

                                </div>
                            </div>

                            <div class="mb-2 col-lg-12 col-md-12 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="notes">Notes</label>
                                <div class="col-sm-12">
                                    <textarea type="text" id="notes" name="notes" class="form-control"></textarea>

                                </div>
                            </div>
                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12" id="state_select">
                                <label class="col-sm-12 form-label" for="working_place">States</label>
                                <div class="col-sm-12">
                                    <select class="js-states-basic-single form-control" id="state" name="state">
                                        <option value="">Choose State</option>
                                        <?php if(isset($states)): ?>
                                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($state->name); ?>"><?php echo e($state->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12" id="city_select">
                                <label class="col-sm-12 form-label" for="working_place">Districts</label>
                                <div class="col-sm-12">
                                    <select class="js-city-basic-single form-control" name="district_or_city" id="ajax_city">
                                        <option value="">Choose Districts</option>

                                        <?php if(isset($cities)): ?>
                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city->city); ?>"><?php echo e($city->city); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>



                            <div class="mb-2 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="row">
                                    <label class="col-lg-12 form-label" for="name">Name</label>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-4">
                                        <select name="salutation" id="salutation" placeholder="Salutation" class="form-control">
                                            <option value="Mr.">Mr.</option>
                                            <option value="Ms.">Ms.</option>
                                            <option value="Mrs.">Mrs.</option>
                                            <option value="Dr.">Dr.</option>

                                        </select>

                                        <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-8">
                                        <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                                        <!--                                                <small class="form-text edit-msg">I'm readonly</small>-->
                                        <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                    </div>
                                </div>
                            </div>



                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="phone">Phone</label>
                                <div class="col-sm-12">
                                    <input type="text" id="phone" name="phone" placeholder="Phone " class="form-control">
                                    <!--                                                <small class="form-text edit-msg">I'm readonly</small>-->
                                    <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                </div>
                            </div>


                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="whatsapp_no">WhatsApp Number</label>
                                <div class="col-sm-12">
                                    <input type="text" id="whatsapp_no" name="whatsapp_no" placeholder="WhatsApp Number " class="form-control">
                                    <!--                                                <small class="form-text edit-msg">I'm readonly</small>-->
                                    <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                </div>
                            </div>

                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="email">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" name="email" placeholder="Email Address" class="form-control">
                                    <!--                                                <small class="form-text edit-msg">I'm readonly</small>-->
                                    <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                </div>
                            </div>
                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="locality">Locality</label>
                                <div class="col-sm-12">
                                    <input type="text" id="locality" name="locality" placeholder="Locality" class="form-control">


                                </div>
                            </div>
                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="pincode">Pincode</label>
                                <div class="col-sm-12">
                                    <input type="text" id="pincode" name="pincode" placeholder="Pincode" class="form-control">
                                    <!--                                                <small class="form-text edit-msg">I'm readonly</small>-->
                                </div>
                            </div>
                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="card_number">Card Number</label>
                                <div class="col-sm-12">
                                    <input type="text" id="card_number" name="card_number" placeholder="Card Number" class="form-control " readonly>
                                    <!--                                                <small class="form-text edit-msg">I'm readonly</small>-->
                                </div>
                            </div>
                            <div class="mb-2 col-lg-12 col-md-12 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="dob"> Discount Offer</label>
                                <div class="col-sm-12">
                                    <!--                                                 <input type="text" id="card_name" name="card_name" placeholder="Card Name" class="form-control "  >
 --> <select name="card_name" id="" class="form-control">
                                        <?php if($dis_card_names && count($dis_card_names)>0): ?>
                                        <?php $__currentLoopData = $dis_card_names; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->discount_card_offer_name); ?>"><?php echo e($item->discount_card_offer_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>

                                    </select>
                                    <!--<small class="form-text edit-msg">I'm readonly</small>-->
                                </div>
                            </div>
                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <?php
                                $discount_initiated_by = array(
                                    'Algin Thomas' => 'Algin Thomas',
                                    'Alwin Johnson' => 'Alwin Johnson',
                                    'Femy Nirmal' => 'Femy Nirmal',
                                    'Ramasubramaniam' => 'Ramasubramaniam',
                                    'Rohit Saji Moses' => 'Rohit Saji Moses',
                                    'Rosh Mohan' => 'Rosh Mohan',
                                    'Saranya PV' => 'Saranya PV',
                                );
                                $options = '';
                                ?>
                                <label class="col-sm-12 form-label" for="dob">Discount Initiated By</label>

                                <select name="discount_initiated_by" id="discount_initiated_by" placeholder="Discount Initiated By" class="form-control">
                                    <option value="">Choose</option>

                                    <?php $__currentLoopData = $discount_initiated_by; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class="stat-color-<?php echo e($item); ?>" value="<?php echo e($item); ?>"><?php echo e($option); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="dob">Discount Recommended By</label>
                                <div class="col-sm-12">
                                    <input type="text" id="discount_recommended_by" name="discount_recommended_by" placeholder="Discount Recommended By" class="form-control ">
                                    <!--<small class="form-text edit-msg">I'm readonly</small>-->
                                </div>
                            </div>

                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="dob">UHID</label>
                                <div class="col-sm-12">
                                    <input type="text" id="uh_id" name="uh_id" placeholder="UHID" class="form-control ">
                                    <!--<small class="form-text edit-msg">I'm readonly</small>-->
                                </div>
                            </div>
                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="dob">IP No</label>
                                <div class="col-sm-12">
                                    <input type="text" id="ip_no" name="ip_no" placeholder="IP No" class="form-control ">
                                    <!--<small class="form-text edit-msg">I'm readonly</small>-->
                                </div>
                            </div>

                            <div class="mb-2 col-lg-12 col-md-12 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="dob"> Valid thru</label>
                                <div class="col-sm-12">
                                    <input type="text" id="vaid_date" name="vaid_date" placeholder="Valid Date" class="form-control ">
                                    <!--<small class="form-text edit-msg">I'm readonly</small>-->
                                </div>
                            </div>







                            <div class="">
                                <div class="col-sm-12">
                                    <div id="errors" style="display:none;" class="alert alert-danger alert-dismissible fade show">
                                        <strong>Error!</strong>
                                        <p id="error"></p>
                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> -->
                                    </div>
                                    <div class="lead-button-block">
                                        <!--<span>Saved leads can be edited later</span>-->
                                        <div>
                                            <a id="close" data-dismiss="modal" class="btn btn-secondary mb-2 lead-cancel-btn"><i class="fas fa-times"></i> Cancel</a>

                                            <button type="submit" class="btn btn-primary mb-2 lead-update-btn"><i class="fas fa-save"></i> Save</button>
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
</div>









<script src="<?php echo e(asset('public/assets/admin')); ?>/vendor/datatables/datatables.min.js"></script>
<script src="<?php echo e(asset('public/assets/admin')); ?>/js/initiate-datatables.js"></script>
<script src="<?php echo e(asset('public/assets/web')); ?>/js/validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".js-states-basic-single").select2({
            dropdownParent: $("#state_select")
        });
        $(".js-city-basic-single").select2({
            dropdownParent: $("#city_select")
        });
    });
</script>
<script>
    // In your Javascript (external .js resource or <script> tag)

    $(document).ready(function() {
        $('#application_save').validate({
                rules: {
                    name: {
                        required: true,
                    },
                    phone: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                    },
                    whatsapp_no: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    uh_id: {
                        required: false,
                        minlength: 9,
                        maxlength: 9,
                    },
                    pincode: {
                        required: true,
                        minlength: 6,
                        maxlength: 6,
                        digits: true

                    },
                    locality: {
                        required: true,
                    },
                },
                messages: {
                    name: {
                        required: "Please enter name",
                    },
                    phone: {
                        required: "Please enter phone",
                    },
                    whatsapp_no: {
                        required: "Please enter WhatsApp number",
                    },
                    email: {
                        required: "Please enter email",
                        email: "Please enter a valid email address."
                    },
                    uh_id: {
                        required: "Please Enter UHID",
                    },
                    pincode: {
                        required: "Please enter pin code",
                    },
                    locality: {
                        required: "Please enter the locality",
                    },
                }
            }),
            $(document).on('click', 'button[type="submit"]', function(event) {
                event.preventDefault();
                if ($("#application_save").valid()) {
                    var data = $("#application_save").serialize();
                    new save_data(data);
                }
            });

        function save_data(data) {
            $.ajax({
                type: 'POST',
                url: "<?php echo e(url('admin/discount/save')); ?>",
                data: data,
                dataType: "json",
                success: function(resp) {
                    if (JSON.stringify(resp.success)) {
                        // window.alert(JSON.stringify(resp.success));
                        if (resp.fields != null) {
                            $('input[name="card_number"]').val(resp.fields['card_number']);
                            $('input[name="vaid_date"]').val(resp.fields['vaid_date']);

                        }
                        $("#update-success").css("display", "block");
                        $("html, body").animate({
                            scrollTop: 0
                        }, "slow");
                        setTimeout(function() {
                            $("#update-success").css("display", "none");
                        }, 5000);
                        window.location = "<?php echo e(url('admin/discounts/')); ?>";

                    }
                    if (JSON.stringify(resp.errors)) {
                        $("#errors").css("display", "block");
                        $("#error").html(JSON.stringify(resp.errors));
                        setTimeout(function() {
                            $("#errors").css("display", "none");
                        }, 5000);
                    }

                },
                error: function(resp, error) {
                    swal("NOT SAVED!", "Something blew up.", "error");
                }
            });
        }


        var readonly = true;
        $("#ad-edit").on('click', (e) => {

            // if (confirm("Edit Advanced Datas!")) {

            // }
            readonly = !readonly

            $('input[edit]').attr('readonly', readonly);
            $('textarea[edit]').attr('readonly', readonly);

            // Extra
            if (readonly) {
                $('.edit-msg').text("I'm readonly");
            } else {
                $('.edit-msg').text("I'm not readonly");
            }


        });



    });
</script>



<script>
    $(document).ready(function() {


        $("option[edit]").attr("disabled", "disabled")


        $("#ad-edit").on('click', (e) => {


            // Extra
            // if ($("option[edit]").attr("disabled") == "disabled") {
            //     $("option[edit]").removeAttribute("disabled")
            // }else{
            //   $("option[edit]").attr("disabled","disabled")

            // }
            if ($("option[edit]").attr("disabled") == "disabled") {
                $("option[edit]").attr("disabled", false)
            } else {
                $("option[edit]").attr("disabled", true)

            }


        });

        $("#state").on('change', function() {
            var state = $("select#state option").filter(":selected").val()

            $.ajax({
                type: 'GET',
                url: "<?php echo e(url('admin/discount/city-filter/')); ?>",
                data: {
                    state: state
                },
                success: function(resp) {
                    $("select#ajax_city").html(resp);

                },
                error: function(resp, error) {
                    swal("NOT SAVED!", "Something blew up.", "error");
                }
            });


        });

    });
</script>



<script>
    // $("#status option:contains('New Application')").attr("disabled", "disabled")

    // $("#status option:contains('Incomplete')").attr("disabled", "disabled")
</script><?php /**PATH /home/asterprivilege/public_html/resources/views/admin/discounts/create.blade.php ENDPATH**/ ?>