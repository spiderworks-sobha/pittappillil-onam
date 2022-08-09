<x-app-layout>
    <x-slot name="head">
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
        </style>
    </x-slot>
    <div class="wrapper">

        @include('admin.nav')

        <div id="body" class="active">
            <!-- navbar navigation component -->
            @include('admin.drop_nav')

            <!-- end of navbar navigation -->
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Edit Application</h3>
                    </div>
                    <div class="row">

                        <div id="update-success" style="display:none;" class="alert alert-success alert-dismissible fade show">
                            <strong>Success!</strong> {{$data->name}} Application Updated successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">{{$data->name}}</div>
                                <div class="card-body">
                                    <h5 class="card-title">Advanced edit. <button class="btn btn-warning mb-2" style="margin-left: 5px; padding: 0.2px  5px; font-size: 13px;" id="ad-edit">Edit</button></h5>

                                    <form accept-charset="utf-8" id="application_update">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label class="col-sm-2">Status</label>
                                            <?php
                                            $status  = array(
                                                'Approved' => 1,
                                                'Pending' => 2,
                                                'Rejected' => 3
                                            );
                                            $options = '';
                                            ?>
                                            <div class="col-sm-10 select">
                                                <select name="status" class="form-select">
                                                    <option value="">Choose</option>

                                                    @foreach($status as $option => $item)
                                                    <option @if($data->status == $item) selected="selected" @endif class="stat-color-{{$item}}" value="{{$item}}">{{$option}}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="name">Name</label>
                                            <div class="col-sm-2">
                                                <input type="text" name="salutation" id="salutation" placeholder="Salutation" class="form-control" value="{{$data->salutation}}" readonly>
                                                <small class="form-text ">I'm readonly</small>
                                                <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{$data->name}}" edit readonly>
                                                <small class="form-text edit-msg">I'm readonly</small>
                                                <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="phone">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="number" id="phone" name="phone" placeholder="Phone " class="form-control" value="{{$data->phone}}" edit readonly>
                                                <small class="form-text edit-msg">I'm readonly</small>
                                                <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="whatsapp_no">WhatsApp Number</label>
                                            <div class="col-sm-10">
                                                <input type="number" id="whatsapp_no" name="whatsapp_no" placeholder="WhatsApp Number " class="form-control" value="{{$data->whatsapp_no}}" edit readonly>
                                                <small class="form-text edit-msg">I'm readonly</small>
                                                <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="email">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" placeholder="Email Address" class="form-control" value="{{$data->email}}" edit readonly>
                                                <small class="form-text edit-msg">I'm readonly</small>
                                                <!-- <small class="form-text">Example help text that remains unchanged.</small> -->
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="locality">Locality</label>
                                            <div class="col-sm-10">
                                                <textarea type="locality" name="locality" placeholder="Locality" id="locality" class="form-control " edit readonly>{!!$data->locality!!}</textarea>
                                                <small class="form-text edit-msg">I'm readonly</small>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="pincode">Pincode</label>
                                            <div class="col-sm-10">
                                                <input type="number" id="pincode" name="pincode" placeholder="Pincode" class="form-control" value="{{$data->pincode}} " edit readonly>
                                                <small class="form-text edit-msg">I'm readonly</small>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="card_number">Card Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="card_number" name="card_number" placeholder="Card Number" class="form-control " edit value="{{$data->card_number}}" readonly>
                                                <small class="form-text edit-msg">I'm readonly</small>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="dob"> Date of Birth</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="dob" name="dob" placeholder=" Date of Birth" class="form-control " edit value="{{$data->dob}}" readonly>
                                                <small class="form-text edit-msg">I'm readonly</small>
                                            </div>
                                        </div>

                                        <!-- <div class="mb-3 row">
                                            <label class="col-sm-2 form-label" for="password">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" placeholder="Pasword" class="form-control">
                                                <small class="form-text">Example help text that remains unchanged.</small>
                                            </div>
                                        </div> -->
                                        <div class="mb-3 row">
                                            <div class="col-sm-4 offset-sm-2">
                                                <a href="{{url('admin/applications')}}" class="btn btn-secondary mb-2"><i class="fas fa-times"></i> Cancel</a>
                                                <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-save"></i> Update</button>
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
    <x-slot name="footer">
        <script src="{{asset('public/assets/admin')}}/vendor/datatables/datatables.min.js"></script>
        <script src="{{asset('public/assets/admin')}}/js/initiate-datatables.js"></script>
        <script>
            $(document).ready(function() {

                $(document).on('click', 'button[type="submit"]', function(event) {
                    event.preventDefault();
                    var data = $("#application_update").serialize();
                    save_data(data);
                });

                function save_data(data) {
                    $.ajax({
                        type: 'POST',
                        url: "{{url('admin/application/update').'/'.$data->id}}",
                        data: data,
                        dataType: "json",
                        success: function(resp) {
                            if (JSON.stringify(resp.success)) {
                                // window.alert(JSON.stringify(resp.success));
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

                    if (confirm("Edit Advanced Datas!")) {
                        readonly = !readonly

                        $('input[edit]').attr('readonly', readonly);
                        $('textarea[edit]').attr('readonly', readonly);

                        // Extra
                        if (readonly) {
                            $('.edit-msg').text("I'm readonly");
                        } else {
                            $('.edit-msg').text("I'm not readonly");
                        }
                    }

                });


            });
        </script>
    </x-slot>
</x-app-layout>