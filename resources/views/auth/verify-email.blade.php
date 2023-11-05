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
                        <div class="mt-4 flex items-center justify-between">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf

                                <div>
                                    <x-button type="submit">
                                        {{ __('Resend Verification Email') }}
                                    </x-button>
                                </div>
                            </form>

                            <div>
                                <a href="{{ route('profile.show') }}"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Edit Profile') }}</a>

                                <form method="POST" action="{{ route('logout') }}" class="inline">
                                    @csrf

                                    <button type="submit"
                                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ml-2">
                                        {{ __('Log Out') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Password Recovery -->

            </div>

        </div>
    </div>
</x-base-layout>