<?php

namespace App\Aslam\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Admin
{
    use LivewireAlert;
    public function createAdmin($data)
    {
        $admin = new User([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'utype' => $data['utype'],
            'whatsapp' => $data['whatsapp'],
            'insta' => $data['insta'],
            'fb' => $data['fb'],
            'snapchat' => $data['snapchat'],
            'address' => $data['address'],
            'city' => $data['city'],
            'country' => $data['country'],
            'password' => Hash::make($data['password']), // Assuming you're storing a hashed password
            'profile_photo_path' => $data['profile_photo_path'],
            'online_status' => $data['online_status'],
            'admin_approved' => $data['admin_approved'],
        ]);
        $admin->save();
        $this->alert('success', 'Created successfully');
    }

    public function updateAdmin($userId, $data)
    {
        $admin = User::find($userId);

        if ($admin) {
            $admin->name = $data['name'];
            $admin->username = $data['username'];
            $admin->email = $data['email'];
            $admin->mobile = $data['mobile'];
            $admin->utype = $data['utype'];
            $admin->whatsapp = $data['whatsapp'];
            $admin->insta = $data['insta'];
            $admin->fb = $data['fb'];
            $admin->snapchat = $data['snapchat'];
            $admin->address = $data['address'];
            $admin->city = $data['city'];
            $admin->country = $data['country'];
            $admin->password = Hash::make($data['password']);
            $admin->profile_photo_path = $data['profile_photo_path'];
            $admin->online_status = $data['online_status'];
            $admin->admin_approved = $data['admin_approved'];
            $admin->save();
            $this->alert('success', 'Data updated');
        }
    }

    public function deleteAdmin($id)
    {
        // Find the Admin instance to delete by its ID
        $admin = User::find($id);

        if ($admin) {
            $admin->delete();
            $this->alert('success', 'User has been deleted');
        } else {
            $this->alert('warning', 'Please select correct user');
        }
    }

}
