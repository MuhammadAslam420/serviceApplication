<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use Illuminate\Support\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class SettingComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $app_name;
    public $logo;
    public $footer_logo;
    public $new_logo;
    public $new_footer_logo;
    public $favicon;
    public $new_favicon;
    public $address;
    public $facebook;
    public $instagram;
    public $tiktok;
    public $snapchat;
    public $whatsapp;
    public $mobile;
    public $email;
    public function render()
    {
        $data = Setting::first(); // Replace 'YourModel' with the actual model name

        if ($data) {
            $this->app_name = $data->app_name;
            $this->logo = $data->logo;
            $this->footer_logo = $data->footer_logo;
            $this->favicon = $data->favicon;
            $this->address = $data->address;
            $this->facebook = $data->facebook;
            $this->instagram = $data->instagram;
            $this->tiktok = $data->tiktok;
            $this->snapchat = $data->snapchat;
            $this->whatsapp = $data->whatsapp;
            $this->mobile = $data->mobile;
            $this->email = $data->email;
        }
        return view('livewire.admin.setting.setting-component');
    }
    public function updateSettings()
    {
        if($this->new_logo){
            $image =Carbon::now()->timestamp.'.'.$this->new_logo->extension();
            $this->new_logo->storeAs('assets/imgs',$image);
        }else{
            $image=$this->logo;
        }
        if($this->new_footer_logo){
            $image_f =Carbon::now()->timestamp.'.'.$this->new_footer_logo->extension();
            $this->new_footer_logo->storeAs('assets/imgs',$image);
        }else{
            $image_f=$this->logo;
        }
        if($this->new_favicon){
            $image_i =Carbon::now()->timestamp.'.'.$this->new_favicon->extension();
            $this->new_favicon->storeAs('assets/imgs',$image);
        }else{
            $image_i=$this->logo;
        }
        Setting::updateOrCreate([], [
            'app_name' => $this->app_name,
            'logo' => $image,
            'footer_logo' => $image_f,
            'favicon' => $image_i,
            'address' => $this->address,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'tiktok' => $this->tiktok,
            'snapchat' => $this->snapchat,
            'whatsapp' => $this->whatsapp,
            'mobile' => $this->mobile,
            'email' => $this->email,
        ]);
        
        $this->alert('success', 'Settings updated successfully.');
    }
}
