<nav id="sidebar" class="">
    <div class="sidebar-header" style="background-color: #f4f6fa;">
        <img src="{{asset('public/assets')}}/img/logo.jpg" style="width: 20%;" alt="bootraper logo" class="app-logo">
    </div>
    <ul class="list-unstyled components text-secondary">

        <li>
            <a href="{{route('admin.gifts.index')}}"><i class="fas fa-table"></i> Gifts</a>
        </li>
        <li>
            <a href="{{route('admin.special-invoices.index')}}"><i class="fas fa-table"></i> Special Invoices</a>
        </li>
        {{--<li>
            <a href="{{route('admin.settings')}}"><i class="fas fa-cog"></i> Settings</a>
        </li>--}}

    </ul>
</nav>