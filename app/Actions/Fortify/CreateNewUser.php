<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Livewire\WithFileUploads;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    use WithFileUploads;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:users', 'regex:/^[^\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'string', 'max:255','unique:users'],
            'profile' => ['nullable','mimes:jpg,png,jpeg','max:2048'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        if (isset($input['profile']) && $input['profile']) {
            $file = $input['profile'];
            $image = 'profile-photos/'.Carbon::now()->timestamp . '.' . $file->extension();
            $file->storeAs('assets/imgs', $image);
        }
        

        return User::create([
            'name' => $input['name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'mobile' => $input['mobile'],
            'password' => Hash::make($input['password']),
            'profile_photo_path'=>$image,
        ]);
    }
}
