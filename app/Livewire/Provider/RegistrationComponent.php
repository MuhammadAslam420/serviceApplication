<?php

namespace App\Livewire\Provider;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegistrationComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.base')]
    #[Rule('required|string|max:255')]
    public $name;
    #[Rule('required|string|max:255|unique:users|regex:/^[^\s]+$/', message: 'Username should be unique and not contain any space')]
    public $username;
    #[Rule('required|string|max:255|unique:users')]
    public $email;
    #[Rule('required|string|max:255|unique:users')]
    public $mobile;
    #[Rule('required|string|min:8')]
    public $password;
    #[Rule('required|mimes:jpg,png,jpeg|max:2048',message: 'image size not greater than 2mbs and should be in jpg,jpeg, or png format')]
    public $profile;
    #[Rule('required|string|max:255')]
    public $city;
    #[Rule('required|string|max:255')]
    public $country;
    #[Rule('required|string|max:255')]
    public $address;

    public function createNewProvider()
    {
        $this->validate();
        try {
            $user = new User();
            $user->name = $this->name;
            $user->username = $this->username;
            $user->email = $this->email;
            $user->mobile = $this->mobile;
            $user->utype = 'VEN';
            $user->password = Hash::make($this->password);
            $user->city = $this->city;
            $user->country = $this->country;
            $user->address = $this->address;
            if ($this->profile) {
                $image = 'profile-photos/' . Carbon::now()->timestamp . '.' . $this->profile->extension();
                $this->profile->storeAs('assets/imgs', $image);
                $user->profile_photo_path = $image;
            }

            $user->save();
            $this->alert('success', 'Your provider profile has been created successfully');
            return redirect()->route('login');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
    public function render()
    {
        return view('livewire.provider.registration-component');
    }
}
