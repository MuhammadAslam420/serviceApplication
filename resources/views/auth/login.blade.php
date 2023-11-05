<x-base-layout>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 mx-auto">
                    <div class="login-wrap">
                        <div class="login-header">
                            <h3>Login</h3>
                            <p>We'll send a confirmation code to your email.</p>
                        </div>
                        <x-validation-errors class="mb-4" />
                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div>
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="username" />
                            </div>
    
                            <div class="mt-4">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                    autocomplete="current-password" />
                            </div>
    
                            <div class="block mt-4">
                                <label for="remember_me" class="flex items-center">
                                    <x-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>
    
                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                                @endif
    
                                <x-button class="ml-4">
                                    {{ __('Log in') }}
                                </x-button>
                            </div>
                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">Or, Login with your email</span>
                            </div>
                            <div class="social-login">
                                <a href="#" class="btn btn-google flex justify-center"><img src="{{ asset('assets/imgs/google.svg') }}" class="me-2"
                                        alt="img">Login with Google</a>
                                <a href="#" class="btn btn-google flex justify-center"><img src="{{ asset('assets/imgs/fb.svg') }}" class="me-2"
                                        alt="img">Login with Facebook</a>
                            </div>
                            <p class="no-acc">Don't have an account ? <a href="{{ route('sign-up') }}">Register</a></p>
                        </form>
                        <!-- /Login Form -->
    
                    </div>
                </div>
            </div>
    
        </div>
    </div>
</x-base-layout>

