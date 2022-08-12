<nav id="sidebar" class="">
    <div class="sidebar-header" style="background-color: #f4f6fa;">
    <img width="150px" src="{{asset('public/assets/web')}}/img/pittappillil-logo.png" class="brand_logo" alt="Logo">
    </div>
    <ul class="list-unstyled components text-secondary">

        <li>
            <a href="{{route('admin.gifts.index')}}"><i class="fas fa-gift"></i> Gifts</a>
        </li>
        <li>
            <a href="{{route('admin.special-invoices.index')}}"><i class="fas fa-donate"></i> Special Invoices</a>
        </li>
        <li>
            <a href="{{route('admin.submissions.index')}}"><i class="fas fa-trophy"></i> Winners</a>
        </li>
        <li>
            <a href="{{route('admin.claimed-submissions.index')}}"><i class="fas fa-medal"></i> Claims</a>
        </li>
        <li>
            <a href="{{route('admin.settings')}}"><i class="fas fa-cogs"></i> Settings</a>
        </li>
        
    </ul>
</nav>