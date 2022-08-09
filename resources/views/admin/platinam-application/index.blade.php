<x-app-layout>
    <x-slot name="head">
        <!-- <link href="{{asset('public/assets/admin')}}/vendor/datatables/datatables.min.css" rel="stylesheet"> -->

        

<link href="{{asset('public/assets/admin')}}/css/jquery.dataTables.min.css" rel="stylesheet">

        <style>
            #dataTables-example_paginate {
                display: none;
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
        
        <style>
            body.modal-open {
                overflow: hidden;
            }

            #sidebar {
                background: #fff !important;
                border-radius: 0.375rem  !important;
                background-color: #fff  !important;
                box-shadow: 0 3px 20px #0000000b  !important;
            }
            
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
            
            
            
            table.dataTable tbody td img, table.dataTable tbody td a{
                text-align: center;
                margin: 0px auto;
                display: block;
            }
            
         table.dataTable tbody td a{
                cursor: pointer;
            }
            
            
        div#applications_wrapper {
            padding: 30px;
        }

           table#applications {
                width: 100% !important;
            }
            div#applications_length {
                margin-bottom: 20px;
            }
            table.dataTable.no-footer {
                border-bottom: 1px solid #111;
                border-top: 1px solid #dee2e6;
            }
            
            div#applications_paginate {
                margin-top: 30px;
            }
            a.paginate_button.current {
               
                color: #fff !important;
                border-radius: 5px !important;
            }
            
            .modal-dialog {
                max-width: 1000px !important;
                margin: auto;
                margin-right: 0;
            }
            button.close {
                float: right;
                display: block;
            }
            .modal {
                background: rgba(255, 255, 255, 0.4);
                backdrop-filter: blur(5px);
            }
            .modal-content {
                bottom: 0px;
                border-color: transparent;
                border-top-right-radius: 0;
                border-bottom-right-radius: 0;
                border-top-left-radius: 15px;
                border-bottom-left-radius: 15px;
                box-shadow: 0px 4px 16px 18px rgb(237 238 238 / 33%);
            }

            
            tr.odd {
                background-color: #f7fbff !important;
                --bs-table-accent-bg: #f7fbff !important;
                border-bottom: 1px solid #dce3e9;
            }
            
            table.dataTable tbody th, table.dataTable tbody td {
                padding: 15px 10px;
                color: rgba(21, 20, 57, 0.8);
            }

            
            .card-header:first-child {
                border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
                background-color: #d2e4ff;
                border-color: #d2e4ff;
            }

            .page-title h3 {
                color: #2D3387;
            }
            .page-title svg{
                margin-right: 10px;
                cursor: pointer;
            }
            
    .status-faild {
        width: 20px !important;
    }
            .status-success {
                width: 20px !important;
            }
            button#ex-btn {
                display: none;
                transition:.25;
            }
                        
            button#ex-btn.export-btn {
                display: block!important;
                margin: auto !important;
                margin-right: 0 !important;
               background: rgb(2,0,36);
                background: linear-gradient(90deg, rgba(18,221,41,0.3925945378151261) 0%, rgba(89,224,81,0.8183648459383753) 49%, rgba(8,201,6,0.9099614845938375) 100%);
                border-color:  #79e76254;
                color: #fff;
                padding: 4px 8px !important;
                transition: .25s;
                border: 0;
                bottom: 45px;
                left: 30px;
                border-radius: 4px;
                position: absolute;
                transition:.25;
            }
            button#ex-btn svg {
                margin-right: 10px;
            }
                        
            
               @media (max-width: 991px) {
                   div#applications_wrapper {
                    overflow: scroll;
                }
                   
            }
            
            
            @media (max-width: 520px) {
                
                .lead-button-block {
                    display: flex;
                    align-items: baseline;
                    justify-content: space-between;
                    flex-direction: column;
                    row-gap: 15px;
                }
            }
            
            
            @media (max-width: 576px){
                .container, .container-sm {
                    max-width: 680px;
                 }
            }
                            
                            
            
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
                        <h3>Platinam Applications</h3>
                    </div>
                    <div class="row">


                        <div class="col-md-12 col-lg-12">
                            <div class="card">
                                <!-- <div class="card-header">sub title</div> -->

                                @include('admin.platinam-application.view.table')
                                
                                <button title="Export To Excel" id="ex-btn" class="" style="font-size: 13px;" id="ad-edit"><a href="{{url('admin/platinam-application/export/')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 48 48" width="24px" height="24px"><path fill="#169154" d="M29,6H15.744C14.781,6,14,6.781,14,7.744v7.259h15V6z"/><path fill="#18482a" d="M14,33.054v7.202C14,41.219,14.781,42,15.743,42H29v-8.946H14z"/><path fill="#0c8045" d="M14 15.003H29V24.005000000000003H14z"/><path fill="#17472a" d="M14 24.005H29V33.055H14z"/><g><path fill="#29c27f" d="M42.256,6H29v9.003h15V7.744C44,6.781,43.219,6,42.256,6z"/><path fill="#27663f" d="M29,33.054V42h13.257C43.219,42,44,41.219,44,40.257v-7.202H29z"/><path fill="#19ac65" d="M29 15.003H44V24.005000000000003H29z"/><path fill="#129652" d="M29 24.005H44V33.055H29z"/></g><path fill="#0c7238" d="M22.319,34H5.681C4.753,34,4,33.247,4,32.319V15.681C4,14.753,4.753,14,5.681,14h16.638 C23.247,14,24,14.753,24,15.681v16.638C24,33.247,23.247,34,22.319,34z"/><path fill="#fff" d="M9.807 19L12.193 19 14.129 22.754 16.175 19 18.404 19 15.333 24 18.474 29 16.123 29 14.013 25.07 11.912 29 9.526 29 12.719 23.982z"/></svg>Export</a>
                                    
                                 
                                    
                                    
                                    </button>

                            </div>
                        </div>

                    </div>

                    
        
                    
                        <!-- basic modal -->
                    <div class="modal fade" id="applicationEdit" tabindex="-1" role="dialog" aria-labelledby="applicationEdit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">

                                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                                    <!--    <span aria-hidden="true">&times;</span>-->
                                    <!--</button>-->

                                    
                                    <div class="row">
                                        <div class="col-md-12" id="edit_section_data">
                                          
                                        </div>
                                    </div>  
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    
                </div>
            </div>


        </div>
    </div>
    <x-slot name="footer">
        <!-- <script src="{{asset('public/assets/admin')}}/vendor/datatables/datatables.min.js"></script>
        <script src="{{asset('public/assets/admin')}}/js/initiate-datatables.js"></script> -->

        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
         <script>
            $(document).ready(function() {

                $(document).on('click', '#edit', function(event) {
                    event.preventDefault();
                    var edit_id = $(this).attr('edit-id');
                    // window.alert(edit_id);
                    popup_edit_data(edit_id);
                });

                function popup_edit_data(edit_id) {
                    var id = edit_id;

                    $.ajax({
                        type: 'GET',
                        url: "{{url('admin/platinam-application/edit')}}/"+id,
                        success: function(data) {
                                                

                            $('#edit_section_data').html(data);
                        }
                    });
                }

            });
        </script> 
        <script>
         $(document).ready(function(){
                             $(document).on('click', '#send', function(event) {
                                                     var application_id = $(this).attr('application-id');

                                                                     Swal.fire({
                                      title: ' Send card ?',
                                      showDenyButton: false,
                                      showCancelButton: true,
                                      confirmButtonText: 'Send',
                                      denyButtonText: `Don't save`,
                                    }).then((result) => {
                                      /* Read more about isConfirmed, isDenied below */
                                      if (result.isConfirmed) {
                                         $.ajax({
                                                    type: 'POST',
                                                    url: "{{url('send')}}",
                                                    data: {
                                                             _token:function() {
                                                                      var token =  $('input[name="_token"]').attr('value');
                                                                             return token;
                                                                          },
                                                             id: application_id
                                                    },
                                                    dataType: "json",
                                                    success: function(resp) {
                                                        if (resp.success == true) {
                                                            Swal.fire({
                                                                      text: 'Card Sent Successfully!',
                                                                      imageUrl: resp.img,
                                                                      imageWidth: "300px",
                                                                    //   imageHeight: 0,
                                                                      imageAlt: 'Custom image',
                                                                    });
                                                            // window.alert(resp));
                                                         
                                                        }
                                                        if (JSON.stringify(resp.errors)) {
                                                            window.alert(JSON.stringify(resp.errors));
                                                         
                                                        }
                            
                                                    },
                                                    error: function(resp, error) {
                                                         Swal.fire("NOT SENT!", "Something blew up.", "error");
                                                    }
                                                });
                                        
                                        
                                      } else if (result.isDenied) {
                                        Swal.fire('Changes are not saved', '', 'info')
                                      }
                                    })
                             });

         });       
        </script>
        <script>
            $(document).ready(function() {
                var table = $('#applications').DataTable({
                    ajax: "{{url('admin/platinam-applications')}}",
                    serverSide: true,
                    processing: true,
                    aaSorting: [
                        [0, "desc"]
                    ],
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                         {
                            data: 'updated_at',
                            name: 'updated_at'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        },
                        {
                            data: 'send',
                            name: 'send'
                        },
                    ]
                });
                
                
 $("#applicationEdit").on("hidden.bs.modal", function () {
                                  table.ajax.reload();
});
     
 
 
            });
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        

       
    <script>
    
    
    var ex = $('#ex-btn');
    setTimeout(function() {
        ex.addClass('export-btn');
    }, 1000);
            
    
    
    
    </script>
    
    
    

    </x-slot>
</x-app-layout>