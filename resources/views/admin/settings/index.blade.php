<x-admin-app-layout>
    <x-slot name="head">
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
                                    <a class="nav-link active" id="verification-tab" data-bs-toggle="tab" href="#verification" role="tab" aria-controls="verification" aria-selected="false">Verification</a>
                                </li>

                            </ul>
                            <div class="tab-content" id="myTabContent">


                                <div class="tab-pane fade active show" id="verification" role="tabpanel" aria-labelledby="verification-tab">
                                    
                                    <form id="smtp-form">
                                        @csrf
                                        <input type="hidden" name="id" value="1" class="form-control">
                                        <div class="col-md-6">
                                            <p class="text-muted">Verification code to validate the user in website</p>
                                            <div class="mb-3">
                                                <label for="" class="form-label">Verification Code</label>
                                                <input type="text" name="code" value="{{$data['varification-code']}}" class="form-control">
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
    <x-slot name="footer">



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
                        url: "{{url('admin/setting/update')}}",
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

    </x-slot>
</x-app-layout>