<style>
    ul.mt-3.list-disc.list-inside.text-sm.text-red-600 {
        padding: 0px;
        padding-left: 20px;
        margin: 5px 0 !important;
    }
    
    .font-medium.text-red-600 {
        font-size: 12px;
    }
    
    ul.mt-3.list-disc.list-inside.text-sm.text-red-600 li {
        font-size: 12px;
    }
</style>


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
                <div class="d-flex justify-content-center form_container">
                    <form id="login-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group mb-3">
<!--
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
-->
                            <!-- <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label> -->
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" class="form-control input_user" placeholder="username">
                            <!--@error('email')-->
                            <!--<span class="invalid-feedback" role="alert">-->
                            <!--    <strong>{{ $message }}</strong>-->
                            <!--</span>-->
                            <!--@enderror-->
                        </div>
                        <div class="input-group mb-2">
<!--
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
-->
                            <!-- <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label> -->
                            <input id="password" type="password" class="form-control input_pass @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                         <div class="form-group">
                                        <x-auth-validation-errors class="mb-2" style="color:red;" :errors="$errors" />

                    </div>
                        <div class=" mt-3">
                            <button type="submit" name="button" class="btn login_btn">Login</button>
                        </div>

                    </form>
                </div>

                <div class="mt-2">
                    <!-- <div class="d-flex justify-content-center links">
                    Don't have an account? <a href="#" class="ml-2">Sign Up</a>
                </div> -->
                    <div class="d-flex justify-content-center links">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>