<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Pittappillil</title>

    <link rel="shortcut icon" href="<?php echo e(asset('public/assets/img/fav.ico')); ?>"/>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- css -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="<?php echo e(asset('assets/admin')); ?>/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin')); ?>/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin')); ?>/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin')); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin')); ?>/css/master.css" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin')); ?>/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin')); ?>/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/admin')); ?>/vendor/jquery-confirm/jquery-confirm.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('assets/admin/css/style.css')); ?>" rel="stylesheet">
    <?php echo e($head??''); ?>

    <style>
        #sidebar {
            background: #fff !important;
        }

        .status-success {
            /* background-image: url('<?php echo e(asset("public/assets/img/success.png")); ?>'); */
            width: 20%;
        }

        .status-faild {
            /* background-image: url('<?php echo e(asset("public/assets/img/faild.png")); ?>'); */
            width: 20%;

        }
        .error{
            color: red;
        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">


        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <?php echo e($header??''); ?>

            </div>
        </header>

        <!-- Page Content -->
        <main>
            <?php echo e($slot); ?>

        </main>
    </div>
    <!-- Scripts -->
    <script src="<?php echo e(asset('assets/admin')); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo e(asset('assets/admin')); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('assets/admin')); ?>/vendor/chartsjs/Chart.min.js"></script>
    <script src="<?php echo e(asset('assets/admin')); ?>/js/dashboard-charts.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?php echo e(asset('assets/admin')); ?>/vendor/jquery-confirm/jquery-confirm.min.js"></script>
    <script src="<?php echo e(asset('assets/admin')); ?>/vendor/jquery-validation/jquery.validate.min.js"></script>
    <?php echo e($footer??''); ?>

    <script src="<?php echo e(asset('assets/admin')); ?>/js/script.js"></script>
    <script>

        $(function(){
            $(document).on('click', '.show-form-modal', function(event){
                event.preventDefault();
                var that = $(this);
                $('#form-modal-body').html('<p>Loading...</p>');
                $('#form-modal').modal('show');
                var url = that.attr('href');
                $.get(url, function(response){
                    $('#form-modal-body').html(response);
                    validate();
                })
            })

            $(document).on('click', '#close-modal', function(){
                $('#form-modal').modal('hide');
                dt();
            })
        })
        if($('#datatable').length)
        {
            initDt(); 
        }

        var display_error = function(errors){
            var html = "<ul>";
            $.each(errors, function (key, val) {
                html +='<li>'+val+'</li>';
            });
            html += '</ul>';
            $('#errors').html(html);
            $('#errors-holder').show();
        }
        function initDt()
            {
                var $table = $('#datatable');
                var ajaxUrl = $table.data('datatable-ajax-url');
                var dt_table = $table.DataTable({
                    orderCellsTop: true,
                    fixedHeader: true,
                    "processing": true,
                    "serverSide": true,
                    responsive: true,
                    ajax: {
                        url: ajaxUrl,
                        data: function(d) {
                            var advanced_search = {};
                            $('.datatable-advanced-search').each(function(i, obj) {
                                advanced_search[$(this).attr('name')] = $(this).val();
                            });
                            d.data = advanced_search;
                        }
                    },
                    columns: my_columns,
                    "stateSave": true,
                    'aoColumnDefs': [
                        { 'bSortable': false, 'sClass': "text-center table-width-10", 'aTargets': ['nosort'] },
                        { "bSearchable": false, "aTargets": [ 'nosearch' ] },
                        { "bVisible": false, 'sClass': "d-none", "aTargets": ['nodisplay'] }
                    ],
                    errMode: 'throw',
                    "order": [order],
                    "language": {
                        "search": "",
                        'searchPlaceholder': 'Search...'
                    },
                    initComplete: function(settings, json) {
                        $(this).trigger('initComplete', [this]);
                        $(window).trigger('resize');
                        this.api().columns().every( function () {

                        });
                    },
                    fnRowCallback : function(nRow, aData, iDisplayIndex, iDisplayIndexFull){
                        updateDtSlno(this, slno_i);
                    }
                });

            }

            function updateDtSlno(dt, slno_i) {
                if (typeof dt != "undefined") {
                    if(typeof slno_i == 'undefined')
                        slno_i = 0;
                    table_rows = dt.fnGetNodes();
                    var oSettings = dt.fnSettings();
                    $.each(table_rows, function(index){
                        $("td:eq(" + slno_i + ")", this).html(oSettings._iDisplayStart+index+1);
                    });
                }
            }

            function dt(){
                if($('#form-modal').length)
                    $('#form-modal').modal('hide');
                if($('#datatable').length)
                {
                    $('#datatable').DataTable().clear().destroy();
                    initDt();
                }
            }
    </script>
</body>

</html><?php /**PATH D:\Xampp\htdocs\pittappillil-onam\resources\views/layouts/admin/app.blade.php ENDPATH**/ ?>