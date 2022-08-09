<x-app-layout>
    <x-slot name="head">

        <style>
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
                                    <a class="nav-link active" id="email-tab" data-bs-toggle="tab" href="#email" role="tab" aria-controls="email" aria-selected="false">SMTP</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="email-extra-tab" data-bs-toggle="tab" href="#email-extra" role="tab" aria-controls="email-extra" aria-selected="false"> E-MAIL</a>
                                </li>
                                <!-- <li class="nav-item">-->
                                <!--    <a class="nav-link" id="whatsapp-tab" data-bs-toggle="tab" href="#whatsapp" role="tab" aria-controls="whatsapp" aria-selected="false"> WhatsApp</a>-->
                                <!--</li>-->

                            </ul>
                            <div class="tab-content" id="myTabContent">


                                <div class="tab-pane fade active show" id="email" role="tabpanel" aria-labelledby="email-tab">
                                    
                                    <form id="smtp-form">
                                        @csrf
                                        <input type="hidden" name="id" value="1" class="form-control">
                                        <input type="hidden" id="code" name="code" value="smtp-settings" class="form-control">


                                        <div class="col-md-6">
                                            <p class="text-muted">Email SMTP settings, notifications and others related to email.</p>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Protocol</label>
                                                <select name="protocol" class="form-select">
                                                    <option value="">Select Protocol</option>
                                                    <option value="SMTP" @if($smtp->protocol == "SMTP") selected = "selected" @endif>SMTP</option>
                                                    <!-- <option value="">Sendmail</option> -->
                                                    <!-- <option value="">PHP Mailer</option> -->
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">SMTP Host</label>
                                                <input type="text" name="host" value="{{$smtp->host}}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">SMTP Username</label>
                                                <input type="text" name="username" class="form-control" value="{{$smtp->username}}">
                                            </div>
                                            <div class=" mb-3">
                                                <label for="" class="form-label">SMTP Security</label>
                                                <select name="smtp_security" class="form-select">
                                                    <option value="">Select SMTP Security</option>
                                                    <option value="tls" @if($smtp->smtp_security == "tls") selected = "selected" @endif>TLS</option>
                                                    <option value="ssl" @if($smtp->smtp_security == "ssl") selected = "selected" @endif>SSL</option>
                                                    <option value="" @if($smtp->smtp_security == "") selected = "selected" @endif>None</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">SMTP Port</label>
                                                <input type="text" name="port" value="{{$smtp->port}}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">SMTP Password</label>
                                                <input type="text" name="password" class="form-control" value="{{$smtp->password}}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" @if($smtp->name != null)value="{{$smtp->name}}" @else
                                                value="Admin"@endif>
                                            </div>
                                            <div class="mb-3 text-end">
                                                <button class="btn btn-success" id="smtp-submit" type="submit"><i class="fas fa-check"></i> Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="email-extra" role="tabpanel" aria-labelledby="email-extra-tab">
                                    <form id="mail-form">
                                         @csrf
                                        <input type="hidden" name="id" value="2" class="form-control">
                                        <input type="hidden" id="code" name="code" value="mail-settings" class="form-control">
                                     <div class="col-md-6">
                                        <p class="text-muted">Extra Email Settings .</p>
                                      
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email To</label>
                                             <input type="text" name="email_to" class="form-control" value="{{$email->email_to}}">

                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Email Cc</label>
                                          <textarea name="email_cc" class="form-control" >{{$email->email_cc}}</textarea>
                                        </div>
                                     
                                        <div class="mb-3 text-end">
                                            <button class="btn btn-success" id="mail-submit" type="submit"><i class="fas fa-check"></i> Save</button>
                                        </div>
                                    </div> 
                                    </form>
                                </div>
                                <!--<div class="tab-pane fade" id="whatsapp" role="tabpanel" aria-labelledby="whatsapp-tab">-->
                                    
                                <!--</div>-->

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <x-slot name="footer">



        <script>
            $(document).ready(function() {

                $(document).on('click', 'button[id="smtp-submit"]', function(event) {
                    event.preventDefault();
                    var data = $("#smtp-form").serialize();
                    var msg ="SMTP Updated successfully.";
                    save_data(data,msg);
                });
                
                 $(document).on('click', 'button[id="mail-submit"]', function(event) {
                     
                    event.preventDefault();
                    var data = $("#mail-form").serialize();
                    var msg ="Mail Updated successfully.";

                    save_data(data,msg);
                });

                function save_data(data,msg) {
                    var code = $("#code").val();

                    $.ajax({
                        type: 'POST',
                        url: "{{url('admin/setting/update')}}",
                        data: data,
                        dataType: "json",
                        success: function(resp) {
                            if (JSON.stringify(resp.success)) {
                                // window.alert(JSON.stringify(resp.success));
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


                // var readonly = true;
                // $("#ad-edit").on('click', (e) => {

                //     if (confirm("Edit Advanced Datas!")) {
                //         readonly = !readonly

                //         $('input[edit]').attr('readonly', readonly);
                //         $('textarea[edit]').attr('readonly', readonly);

                //         // Extra
                //         if (readonly) {
                //             $('.edit-msg').text("I'm readonly");
                //         } else {
                //             $('.edit-msg').text("I'm not readonly");
                //         }
                //     }

                // });


            });
        </script>

    </x-slot>
</x-app-layout>