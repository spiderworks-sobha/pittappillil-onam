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
                <div class="row">
                    <div class="col-md-6">
                        <h3>Submissions</h3>
                    </div>

                    <div class="col-md-6 text-end">
                    </div>
                </div>
                    </div>
                    <div class="row">


                        <div class="col-md-12 col-lg-12">
                            <div class="card">

                                @include('admin.submissions._partials.table')

                            </div>
                        </div>

                    </div>

                        <!-- basic modal -->
                    @include('admin.form_modal')
                </div>
            </div>


        </div>
    </div>
    <x-slot name="footer">
    <script>
        var my_columns = [
            {data: 'updated_at', name: 'updated_at'},
            {data: null, name: 'id'},
            {data: 'invoice', name: 'invoice'},
            {data: 'name', name: 'name'},
            {data: 'gift', name: 'gifts.name'},
            {data: 'date', name: 'updated_at'},
            {data: 'action_edit', name: 'action_edit'},
        ];
        var slno_i = 0;
        var order = [0, 'desc'];

        $(function(){
            $(document).on('click', '#claim_status', function(){
                if ($(this).is(':checked'))
                    $('#submit-btn').prop('disabled', false);
                else
                    $('#submit-btn').prop('disabled', true); 
            })
        })

        $(document).on('click', '#submit-btn', function(){
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
                                $('#submit-btn').prop('disabled', true).html(submit_btn_text);
                                if (typeof data.errors != "undefined") {
                                    var errors = JSON.parse(JSON.stringify(data.errors))
                                    display_error(errors);
                                }
                                else
                                {
                                    $('#form-modal').modal('hide');
                                    $.alert(data.success);
                                    dt();
                                }
                            },
                            error:function(xhr){
                                $('#submit-btn').prop('disabled', true).html(submit_btn_text);
                                var errors = $.parseJSON(xhr.responseText);
                                display_error(errors);
                            }
                        });
        })
    </script>
    </x-slot>
</x-app-layout>
