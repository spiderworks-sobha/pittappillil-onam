<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Aster') }}</title>
    <link rel="shortcut icon" href="{{asset('public/assets/img/fav.ico')}}"/>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- css -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="{{asset('public/assets/admin')}}/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="{{asset('public/assets/admin')}}/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="{{asset('public/assets/admin')}}/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="{{asset('public/assets/admin')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public/assets/admin')}}/css/master.css" rel="stylesheet">
    <link href="{{asset('public/assets/admin')}}/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
    {{ $head??'' }}
    <style>
        #sidebar {
            background: #fff !important;
        }

        .status-success {
            /* background-image: url('{{asset("public/assets/img/success.png")}}'); */
            width: 20%;
        }

        .status-faild {
            /* background-image: url('{{asset("public/assets/img/faild.png")}}'); */
            width: 20%;

        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">


        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header??'' }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <!-- Scripts -->
    <script src="{{asset('public/assets/admin')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('public/assets/admin')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public/assets/admin')}}/vendor/chartsjs/Chart.min.js"></script>
    <script src="{{asset('public/assets/admin')}}/js/dashboard-charts.js"></script>
    {{ $footer??'' }}
    <script src="{{asset('public/assets/admin')}}/js/script.js"></script>

</body>

</html>