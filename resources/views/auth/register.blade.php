<x-base-layout>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 mx-auto">
                    <div class="login-wrap">
                        <div class="login-back">
                            <a href="/" class="flex"><img src="{{ asset('assets/imgs/undo-icon.svg') }}" class="me-2" alt="icon">Back To Home</a>
                        </div>
                        <div class="login-header">
                            <h3>User Signup</h3>
                        </div>
                        <x-validation-errors class="mb-4" />
                        <!-- Login Form -->
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                
                            <div>
                                <x-label for="name" value="{{ __('Full Name') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            </div>
                            <div>
                                <x-label for="username" value="{{ __('User Name') }}" />
                                <x-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                            </div>
                
                            <div class="mt-4">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            </div>
                            <div class="mt-4">
                                <x-label for="mobile" value="{{ __('Mobile') }}" />
                                <x-input id="mobile" class="block mt-1 w-full" type="text" name="mobile" :value="old('mobile')" required autocomplete="mobile" />
                            </div>
                            <div class="mt-4">
                                <x-label for="profile" value="{{ __('Profile Picture') }}" />
                                <x-input id="profile" class="block mt-1 w-full" type="file" name="profile"  />
                            </div>
                            
                
                            <div class="mt-4">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                            </div>
                
                            <div class="mt-4">
                                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                            </div>
                
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                                <div class="mt-4">
                                    <x-label for="terms">
                                        <div class="flex items-center">
                                            <x-checkbox name="terms" id="terms" required />
                
                                            <div class="ml-2">
                                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </x-label>
                                </div>
                            @endif
                
                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>
                
                                <x-button class="ml-4">
                                    {{ __('Register') }}
                                </x-button>
                            </div>
                        </form>
                        <div class="social-login">
                            <a href="#" class="btn btn-google flex justify-center"><img src="{{ asset('assets/imgs/google.svg') }}" class="me-2" alt="img">Log in with Google</a>
                            <a href="#" class="btn btn-google flex justify-center"><img src="{{ asset('assets/imgs/fb.svg') }}" class="me-2" alt="img">Log in with Facebook</a>
                        </div>
                        <!-- /Login Form -->
                                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-base-layout>			
			
		
		
