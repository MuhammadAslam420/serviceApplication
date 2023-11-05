<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        <div class="col-span-6 sm:col-span-4">
            <!-- Profile Photo -->
            <x-label for="profile_photo" value="{{ __('Profile Photo') }}" />
            
            <x-input id="profile_photo" type="file" class="mt-1 block w-full" wire:model="photo" />
        
            @if ($photo)
                <img src="{{ $photo->temporaryUrl() }}" alt="Profile Photo Preview">
            @else
                <img src="{{ asset('assets/imgs') }}/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" class="rounded-full h-20 w-20 object-cover">
            @endif
        
            <x-input-error for="photo" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="{{ __('Name') }}" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>
        <!-- UserName -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="username" value="{{ __('User Name') }}" />
            <x-input id="username" type="text" class="mt-1 block w-full" wire:model="state.username" required autocomplete="username" />
            <x-input-error for="username" class="mt-2" />
        </div>
        <!--Mobile-->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="mobile" value="{{ __('Mobile') }}" />
            <x-input id="mobile" type="text" class="mt-1 block w-full" wire:model="state.mobile" required autocomplete="mobile" />
            <x-input-error for="mobile" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="{{ __('Email') }}" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
        <!--whatsapp -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="whatsapp" value="{{ __('Whatsapp') }}" />
            <x-input id="whatsapp" type="text" class="mt-1 block w-full" wire:model="state.whatsapp" autocomplete="whatsapp" />
            <x-input-error for="whatsapp" class="mt-2" />
        </div>
        <!-- insta -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="insta" value="{{ __('Instagram') }}" />
            <x-input id="insta" type="text" class="mt-1 block w-full" wire:model="state.insta" autocomplete="insta" />
            <x-input-error for="insta" class="mt-2" />
        </div>
        <!-- fb -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="fb" value="{{ __('FaceBook') }}" />
            <x-input id="fb" type="text" class="mt-1 block w-full" wire:model="state.fb" autocomplete="fb" />
            <x-input-error for="fb" class="mt-2" />
        </div>
        <!-- snapchat -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="snapchat" value="{{ __('SnapChat') }}" />
            <x-input id="snapchat" type="text" class="mt-1 block w-full" wire:model="state.snapchat" autocomplete="snapchat" />
            <x-input-error for="snapchat" class="mt-2" />
        </div>
        <!-- address -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="address" value="{{ __('Address') }}" />
            <x-input id="address" type="text" class="mt-1 block w-full" wire:model="state.address" autocomplete="address" />
            <x-input-error for="address" class="mt-2" />
        </div>
        <!-- city -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="city" value="{{ __('City') }}" />
            <x-input id="city" type="text" class="mt-1 block w-full" wire:model="state.city" autocomplete="city" />
            <x-input-error for="city" class="mt-2" />
        </div>
        <!-- country -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="country" value="{{ __('Country') }}" />
            <x-input id="country" type="text" class="mt-1 block w-full" wire:model="state.country" autocomplete="country" />
            <x-input-error for="country" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>
