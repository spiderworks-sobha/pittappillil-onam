<nav id="sidebar" class="">
    <div class="sidebar-header" style="background-color: #f4f6fa;">
        <img src="{{asset('public/assets')}}/img/logo.jpg" style="width: 20%;" alt="bootraper logo" class="app-logo">
    </div>
    <ul class="list-unstyled components text-secondary">
        <!--<li>-->
        <!--    <a href="{{route('admin.dashboard')}}"><i class="fas fa-home"></i> Dashboard</a>-->
        <!--</li>-->
        <!-- <li>
            <a href="forms.html"><i class="fas fa-file-alt"></i> Forms</a>
        </li> -->
        <li>
            <a href="{{route('admin.applications')}}"><i class="fas fa-table"></i> Applications</a>
        </li>
          <li style="display:block;">
            <a href="{{route('admin.discounts')}}"><i class="fas fa-table"></i>Discounts</a>
        </li>
        <li>
            <a href="{{route('admin.settings')}}"><i class="fas fa-cog"></i> Settings</a>
        </li>


        <!-- <li>
            <a href="#authmenu" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Authentication</a>
            <ul class="collapse list-unstyled" id="authmenu">
                <li>
                    <a href="login.html"><i class="fas fa-lock"></i> Login</a>
                </li>
                <li>
                    <a href="signup.html"><i class="fas fa-user-plus"></i> Signup</a>
                </li>
                <li>
                    <a href="forgot-password.html"><i class="fas fa-user-lock"></i> Forgot password</a>
                </li>
            </ul>
        </li> -->



    </ul>
</nav>