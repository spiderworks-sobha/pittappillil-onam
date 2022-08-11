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
                    <form id="login-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" class="form-control input_user" placeholder="username">
                        </div>
                        <div class="input-group mb-2">
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

                
            </div>
        </div>
    </div>
</x-guest-layout>