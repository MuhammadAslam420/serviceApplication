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
                            <h3>Password Confirmation</h3>
                            
                        </div>

                        <x-validation-errors class="mb-4" />

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div>
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="current-password" autofocus />
                            </div>

                            <div class="flex justify-end mt-4">
                                <x-button class="ml-4">
                                    {{ __('Confirm') }}
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