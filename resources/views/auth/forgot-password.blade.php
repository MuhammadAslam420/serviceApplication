<x-base-layout>

    <div class="content">
        <div class="container">
            <div class="row">

                <!-- Password Recovery -->
                <div class="col-md-6 col-lg-6 mx-auto">
                    <div class="login-wrap">
                        <div class="login-back">
                            <a href="/"><img src="{{ asset('assets/imgs/undo-icon.svg') }}" class="me-2" alt="icon">Back
                                To Home</a>
                        </div>
                        <div class="login-header">
                            <h3>Password Recovery</h3>
                            <p>Enter your email and we will send you a link to reset your password.</p>
                        </div>

                        <x-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="block">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="username" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-button>
                                    {{ __('Email Password Reset Link') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Password Recovery -->

            </div>

        </div>
    </div>
</x-base-layout>