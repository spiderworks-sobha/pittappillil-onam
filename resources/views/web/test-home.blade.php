<x-app-layout>
    <x-slot name="head">
        <link href="{{asset('public/assets/web')}}/css/custom.css" rel="stylesheet">
        <style>
            #dataTables-example_paginate {
                display: none;
            }
        </style>
    </x-slot>
    <div class="container forget-password">
        <div class="row">
            <div class="col-md-12 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <img src="{{asset('public/assets')}}/img/logo.jpg" style="width: 20%;" alt="car-key" border="0">
                            <h2 class="text-center">Application Form</h2>
                            <!-- <p>It was Lorem Ipsum passages.</p> -->
                            <form id="application-form" role="form" autocomplete="off">
                                @csrf

                                <div class="form-group">
                                    <div class="input-group" style="padding-top:5px;">
                                        <div class="col-md3"><select name="salutation" class="form-control valid">
                                                <option value="Mr.">Mr.</option>
                                                <option value="Ms.">Ms.</option>
                                                <option value="Mrs.">Mrs.</option>
                                                <option value="Mrs.">Sir.</option>
                                            </select>
                                        </div>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="name" name="name" placeholder="Name" class="form-control" type="text">
                                    </div>
                                    <div class="input-group" style="padding-top:5px;">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="phone" name="phone" placeholder="Phone" class="form-control" type="tel">
                                    </div>
                                    <div class="input-group" style="padding-top:5px;">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="whatsapp_no" name="whatsapp_no" placeholder="WhatsApp Number" class="form-control" type="tel">
                                    </div>
                                    <div class="input-group" style="padding-top:5px;">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="email" name="email" placeholder="Email" class="form-control" type="email">
                                    </div>
                                    <!-- <div class="input-group" style="padding-top:5px;">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="dob" name="dob" placeholder="Date" class="form-control" type="date">
                                    </div> -->
                                    <div class="input-group" style="padding-top:5px;">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="locality" type="text" name="locality" placeholder="Locality" class="form-control">
                                    </div>
                                    <div class="input-group" style="padding-top:5px;">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input type="number" id="pincode" name="pincode" placeholder="Pincode" class="form-control">
                                    </div>
                                    <div class="input-group" style="padding-top:5px;">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                        <input id="check" style="width: 10px;margin: 5px;" name="check" type="checkbox">
                                        <label for="check">I Agree</label>
                                    </div>
                                </div>
                                <div class="form-group " style="padding-top:10px;">
                                    <input id="application-btn" class=" btn btn-lg btn-primary btn-block btnForget" value="Save Application" type="button"> </input>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="footer">
        <script src="{{asset('public/assets/web')}}/js/validate.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function() {
                $('#application-form').validate({
                        rules: {
                            name: {
                                required: true,
                            },
                            phone: {
                                required: true,
                                minlength: 10,
                                maxlength: 12,
                            },
                            whatsapp_no: {
                                required: true,
                                minlength: 10,
                                maxlength: 12,
                            },
                            email: {
                                required: true,
                                email: true
                            },
                            dob: {
                                required: true,
                            },
                            pincode: {
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
                            dob: {
                                required: "Please select date of birth",
                            },
                            pincode: {
                                required: "Please enter pin code",
                            },
                            check: {
                                required: "Please enter pin code",
                            },
                        }
                    }),
                    $('#application-btn').on("click", function(e) {
                        e.preventDefault();

                        var img = "{{asset('public/assets')}}/img/logo.jpg";
                        if ($("#application-form").valid()) {
                            var data = $("#application-form").serialize();
                            Swal.fire({
                                title: 'Do you want to save these details?',
                                html: '<div class="card" style="text-align: left;">' +
                                    '<div class="card-header"><img src="' + img + '" style="width: 20%;margin-bottom: 0px;margin-left: 40%;" alt="car-key" border="0"></div> ' +
                                    '<div class="card-body">' +
                                    '<h5 class="card-title">Name:' + $("#name").val() + ' </h5>' +
                                    '<p class="card-text">Email:' + $("#email").val() + '</p>' +
                                    '<p class="card-text">Phone:' + $("#phone").val() + '</p>' +
                                    '<p class="card-text">WhatsApp:' + $("#whatsapp_no").val() + '</p>' +
                                    '<p class="card-text">locality:' + $("#locality").val() + '</p>' +
                                    '<p class="card-text">pin:' + $("#pincode").val() + '</p></div>' + '   <div class="card-footer"> <p class="card-text">Card No (00-00-00-00-00-00) </p> </div></div>',
                                showDenyButton: false,
                                showCancelButton: true,
                                confirmButtonText: 'Save',
                                denyButtonText: `Don't save`,
                            }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */

                                if (result.isConfirmed) {
                                    $('#application-btn').prop('disabled', true).val('Saving...');

                                    $.ajax({
                                        type: 'POST',
                                        url: "{{url('application/save')}}",
                                        data: data,
                                        success: function(data) {

                                            if (JSON.stringify(data.success)) {
                                                Swal.fire('Saved!', '', 'success')
                                                $('#application-btn').prop('disabled', false).val('Save Application');

                                                $('input[type=text]').val('');
                                                $('input[type=tel]').val('');
                                                $('input[type=date]').val('');
                                                $('input[type=email]').val('');
                                                $('input[type=number]').val('');
                                                // $('textarea').val('');
                                            }
                                            if (JSON.stringify(data.errors)) {
                                                $('#application-btn').prop('disabled', false).val('Save Application');
                                                var oops = data.errors;
                                                Swal.fire(oops[0], '', 'info')
                                            }




                                        },
                                        error: function(data) {
                                            swal("NOT SAVED!", "Something blew up.", "error");
                                        }
                                    });
                                } else if (result.isDenied) {
                                    Swal.fire('Changes are not saved', '', 'info')
                                }

                            });
                        }

                    });
            });
        </script>
    </x-slot>
</x-app-layout>