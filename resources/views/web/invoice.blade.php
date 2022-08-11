<x-guest-layout>
    <div class="container h-100" style="">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card" style="margin-top:150px ;">
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="{{asset('public/assets/img/logo.jpg')}}" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <div class="d-flex justify-content-center">
                    <form id="InputFrm" method="POST" action="{{ route('invoice.search') }}">
                        @csrf
                        <p>Enter your invoice number to know the price you have won.</p>
                        <div class="input-group mb-3">
                            <input id="invoice" type="text" class="form-control w-100" name="invoice" class="form-control" placeholder="Invoice Number">
                        </div>
                        <div id="errors-holder" style="display:none;" class="alert alert-danger alert-dismissible fade show">
                                            <strong>Error!</strong>
                                            <p id="errors"></p>
                                        </div>
                        <div class=" mt-3">
                            <button type="submit" id="submit-btn" name="button" class="btn login_btn">Search</button>
                        </div>
                    </form>
                </div>
                <div class="d-flex justify-content-center" id="response-body">

                </div>

                
            </div>
        </div>
    </div>
    <x-slot name="footer">
        <script src="{{asset('public/assets/web')}}/js/validate.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
         $(document).ready(function() {
        $('#InputFrm').validate({
                rules: {
                    invoice: {
                        required: true,
                    }
                },
                messages: {
                    invoice: {
                        required: "Please enter invoice number",
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

    </x-slot>
</x-guest-layout>