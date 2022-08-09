<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <!--<a href="/">-->
            <!--    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />-->
            <!--</a>-->
            <style>
                .custom-style{
 display: flex;
flex-direction: column;
                }
            </style>
        </x-slot>
  <div class="container" style="">
              
              
              <div class="container-width">
        <div class="row justify-content-center">
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="custom-style">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-2 custom-style">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-2 custom-style">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-2">
                <x-button class="btn-secondary">
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
         </div>
              </div>
              </div>
        </div>
    </x-auth-card>
</x-guest-layout>
