<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="wrapper">

        @include('admin.nav')

        <div id="body" class="active">
            <!-- navbar navigation component -->
            @include('admin.drop_nav')

            <!-- end of navbar navigation -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">Overview</div>
                            <h2 class="page-title">Dashboard</h2>
                        </div>
                    </div>
                    <div class="row">


                    </div>
                    <div class="row">


                    </div>
                    <div class="row">


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>