<link href="{{asset('public/assets/admin')}}/vendor/datatables/datatables.min.css" rel="stylesheet">
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






<div class="content">
    <div class="container">
        <div class="page-title">
            <h3><svg data-dismiss="modal" aria-label="Close" width="47" height="47" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.5001 43.0833C34.3157 43.0833 43.0834 34.3155 43.0834 23.5C43.0834 12.6844 34.3157 3.91663 23.5001 3.91663C12.6845 3.91663 3.91675 12.6844 3.91675 23.5C3.91675 34.3155 12.6845 43.0833 23.5001 43.0833Z" stroke="#1E0E62" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M23.5001 15.6666L15.6667 23.5L23.5001 31.3333" stroke="#2D3387" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M31.3334 23.5H15.6667" stroke="#2D3387" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>Back to <b>Application</b></h3>
        </div>
        <div class="row">

            <div id="update-success" style="display:none;" class="alert alert-success alert-dismissible fade show">
                <strong>Success!</strong> {{$data->name}} Application Updated successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
            <div class="col-lg-12">
                <div class="card no-border aster-card">
                    <div class="card-header">{{$data->name}}</div>
                    <div class="card-body">
                        <button class="btn btn-warning mb-2" style="font-size: 13px;" id="ad-edit">Advanced Edit</button>

                        <form accept-charset="utf-8" id="application_update" class="row">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}" />
                            <div class="mb-2 col-lg-8 col-md-8 col-sm-12 col-12">
                                <label class=" form-label">Status</label>
                                <?php
                                $status  = array(
                                    'Approved' => 1,
                                    'Pending' => 2,
                                    'Rejected' => 3,
                                    'Incomplete' => 4,
                                    'New Application' => 0
                                );
                                $options = '';
                                ?>
                                <div class="col-sm-12 select">
                                    <select id="status" name="status" class="form-select">
                                        <option value="">Choose</option>

                                        @foreach($status as $option => $item)
                                        <option @if($data->status == $item) selected="selected" @endif class="stat-color-{{$item}}" value="{{$item}}">{{$option}}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>


                            <div class="mb-2 col-lg-4 col-md-4 col-sm-12 col-12">

                                <!--  <div class="can-toggle demo-rebrand-2">-->
                                <!--       <label class="col-sm-12 form-label" for="notes">OTP Verified </label>-->
                                <!--<div class="">-->
                                <!--  <input edit disabled checked type="checkbox" />-->
                                <!--</div>-->
                                <!--  </div>-->

                                <label class="col-sm-12 form-label" for="notes">OTP State </label>
                                <select id="otp-verify" name="otp_state">
                                    <option edit value="verified" @if($data->otp_state == "verified") selected="selected" @endif>Verified</option>
                                    <option edit value="pending" @if($data->otp_state == "pending") selected="selected" @endif>Pending</option>
                                </select>

                            </div>




                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="working_place">Working Place</label>
                                <div class="col-sm-12">
                                    <textarea type="text" id="working_place" name="working_place" class="form-control">{!!$data->working_place!!}</textarea>

                                </div>
                            </div>


                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="g_c_or_a">Gated community or Association</label>
                                <div class="col-sm-12">
                                    <textarea type="text" id="g_c_or_a" name="g_c_or_a" class="form-control">{!!$data->g_c_or_a!!}</textarea>

                                </div>
                            </div>

                            <div class="mb-2 col-lg-12 col-md-12 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="notes">Notes</label>
                                <div class="col-sm-12">
                                    <textarea type="text" id="notes" name="notes" class="form-control">{!!$data->notes!!}</textarea>

                                </div>
                            </div>
                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12" id="state_select">
                                <label class="col-sm-12 form-label" for="working_place">States</label>
                                <div class="col-sm-12">
                                    <select class="js-states-basic-single form-control" name="state" id="state">
                                        <option value="">Choose State</option>

                                        @if(isset($states))
                                        @foreach($states as $state)
                                        <option value="{{$state->name}}" @if($state->name == $data->state)
                                            selected="selected" @endif>{{$state->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12" id="city_select">
                                <label class="col-sm-12 form-label" for="working_place">Districts</label>
                                <div class="col-sm-12">
                                    <select class="js-city-basic-single form-control" name="district_or_city" id="ajax_city">
                                        <option value="">Choose Districts</option>

                                        @if(isset($cities))
                                        @foreach($cities as $city)
                                        <option value="{{$city->city}}" @if($city->city == $data->district_or_city)
                                            selected="selected" @endif>{{$city->city}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>



                            <div class="mb-2 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="row">
                                    <label class="col-lg-12 form-label" for="name">Name</label>
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-4">
                                        <select name="salutation" id="salutation" placeholder="Salutation" class="form-control">
                                            <option value="Mr." @if($data->salutation == "Mr.") selected = selected @else edit @endif>Mr.</option>
                                            <option value="Ms." @if($data->salutation == "Ms.") selected = selected @else edit @endif>Ms.</option>
                                            <option value="Mrs." @if($data->salutation == "Mrs.") selected = selected @else edit @endif>Mrs.</option>
                                            <option value="Dr." @if($data->salutation == "Dr.") selected = selected @else edit @endif>Dr.</option>

                                        </select>
                                        <!-- <input type="text" name="salutation" id="salutation" placeholder="Salutation" class="form-control" value="{{$data->salutation}}" edit readonly> -->

                                        <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-8">
                                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{$data->name}}" edit readonly>
                                        <!--                                                <small class="form-text edit-msg">I'm readonly</small>-->
                                        <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                    </div>
                                </div>
                            </div>



                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="phone">Phone</label>
                                <div class="col-sm-12">
                                    <input type="text" id="phone" name="phone" placeholder="Phone " class="form-control" value="{{$data->phone}}" edit readonly>
                                    <!--                                                <small class="form-text edit-msg">I'm readonly</small>-->
                                    <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                </div>
                            </div>


                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="whatsapp_no">WhatsApp Number</label>
                                <div class="col-sm-12">
                                    <input type="text" id="whatsapp_no" name="whatsapp_no" placeholder="WhatsApp Number " class="form-control" value="{{$data->whatsapp_no}}" edit readonly>
                                    <!--                                                <small class="form-text edit-msg">I'm readonly</small>-->
                                    <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                </div>
                            </div>

                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="email">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" name="email" placeholder="Email Address" class="form-control" value="{{$data->email}}" edit readonly>
                                    <!--                                                <small class="form-text edit-msg">I'm readonly</small>-->
                                    <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                </div>
                            </div>
                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="locality">Locality</label>
                                <div class="col-sm-12">
                                    <input type="text" id="locality" name="locality" placeholder="Locality" class="form-control" value="{{$data->locality}} " edit readonly>

                                    <!--<textarea type="locality" name="locality" placeholder="Locality" id="locality" class="form-control " edit readonly>{!!$data->locality!!}</textarea>-->
                                    <!--                                                <small class="form-text edit-msg">I'm readonly</small>-->
                                </div>
                            </div>
                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="pincode">Pincode</label>
                                <div class="col-sm-12">
                                    <input type="text" id="pincode" name="pincode" placeholder="Pincode" class="form-control" value="{{$data->pincode}}" edit readonly>
                                    <!--                                                <small class="form-text edit-msg">I'm readonly</small>-->
                                </div>
                            </div>
                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="card_number">Card Number</label>
                                <div class="col-sm-12">
                                    <input type="text" id="card_number" name="card_number" placeholder="Card Number" class="form-control " value="{{$data->card_number}}" readonly>
                                    <!--                                                <small class="form-text edit-msg">I'm readonly</small>-->
                                </div>
                            </div>
                            <div class="mb-2 col-lg-12 col-md-12 col-sm-12 col-12">
                                <!--<label class="col-sm-12 form-label" for="dob"> Date of Birth</label>-->
                                <!--<div class="col-sm-12">-->
                                <!--    <input type="text" id="dob" name="dob" placeholder=" Date of Birth" class="form-control " edit value="{{$data->dob}}" readonly>-->
                                <!--    <small class="form-text edit-msg">I'm readonly</small>-->
                                <!--</div>-->
                            </div>

                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="dob">UHID</label>
                                <div class="col-sm-12">
                                    <input type="text" id="uh_id" name="uh_id" placeholder="UHID" class="form-control " edit value="{{$data->uh_id}}" readonly>
                                    <!--<small class="form-text edit-msg">I'm readonly</small>-->
                                </div>
                            </div>
                            <div class="mb-2 col-lg-6 col-md-6 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="dob">IP No</label>
                                <div class="col-sm-12">
                                    <input type="text" id="ip_no" name="ip_no" placeholder="IP No" class="form-control " edit value="{{$data->ip_no}}" readonly>
                                    <!--<small class="form-text edit-msg">I'm readonly</small>-->
                                </div>
                            </div>

                            <div class="mb-2 col-lg-12 col-md-12 col-sm-12 col-12">
                                <label class="col-sm-12 form-label" for="dob"> Valid thru</label>
                                <div class="col-sm-12">
                                    <input type="text" id="vaid_date" name="vaid_date" placeholder="Valid Date" class="form-control " edit value="{{$data->vaid_date}}" readonly>
                                    <!--<small class="form-text edit-msg">I'm readonly</small>-->
                                </div>
                            </div>


                            <div class="mb-2 row" align="center">
                                <div class="mb-2 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="view-card-block">
                                        @if($data->card_path != null && $data->rand_img_key != null) <label><a href="{{url('dl/'.$data->rand_img_key)}}" target="_blank"><span class="btn btn-outline-secondary">View Card</span></a></label>@endif

                                        @if($data->rand_img_key != null) <div class="copy">
                                            <input type="text" value="{{url('dl/'.$data->rand_img_key)}}">
                                            <button id="copy-btn" type="button">Copy Card Link</button>
                                        </div>
                                        @endif
                                    </div>

                                </div>
                            </div>




                            <div class="">
                                <div class="col-sm-12">

                                    <div class="lead-button-block">
                                        <!--<span>Saved leads can be edited later</span>-->
                                        <div>
                                            <a id="close" data-dismiss="modal" class="btn btn-secondary mb-2 lead-cancel-btn"><i class="fas fa-times"></i> Cancel</a>

                                            <button type="submit" class="btn btn-primary mb-2 lead-update-btn"><i class="fas fa-save"></i> Update</button>
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





<script>
    (function() {
        var copyButton = document.querySelector('.copy button');
        var copyInput = document.querySelector('.copy input');
        copyButton.addEventListener('click', function(e) {
            e.preventDefault();
            var text = copyInput.select();
            document.execCommand('copy');
        });

        copyInput.addEventListener('click', function() {
            this.select();
        });
    })();
</script>


<script>
    $('#copy-btn').on('click', () => {
        $('#copy-btn').text('Copied')
    })
</script>



<script src="{{asset('public/assets/admin')}}/vendor/datatables/datatables.min.js"></script>
<script src="{{asset('public/assets/admin')}}/js/initiate-datatables.js"></script>
<script src="{{asset('public/assets/web')}}/js/validate.js"></script>
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
        $('#application_update').validate({
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
                    check: {
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
                    check: {
                        required: "Please agree to the terms and conditions",
                    },
                }
            }),
            $(document).on('click', 'button[type="submit"]', function(event) {
                event.preventDefault();
                if ($("#application_update").valid()) {
                    var data = $("#application_update").serialize();
                    save_data(data);
                }
            });

        function save_data(data) {
            $.ajax({
                type: 'POST',
                url: "{{url('admin/application/update')}}",
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

                    }
                    if (JSON.stringify(resp.errors)) {
                        window.alert(JSON.stringify(resp.errors));
                        // $("#update-success").css("display", "block");
                        // setTimeout(function() {
                        //     $("#update-success").css("display", "none");
                        // }, 5000);
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
                url: "{{url('admin/application/city-filter/')}}",
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
    $("#status option:contains('New Application')").attr("disabled", "disabled")

    $("#status option:contains('Incomplete')").attr("disabled", "disabled")
</script>