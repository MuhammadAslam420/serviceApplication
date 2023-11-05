<?php

namespace App\Aslam\RoleAndPermission;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissions
{
    use LivewireAlert;
    public function createRoleAndPermissions($data)
    {
        Role::create([
            'name' => $data['name'],
            'guard_name' => 'web',
        ]);
        $this->alert('success', 'Role Has been Created');
    }
    public function updateRoleAndPermissions($data)
    {
        Role::wher('id', $data['id'])->update([
            'name' => $data['name'],
        ]);
        $this->alert('success', 'Role Has been Updated');
    }
    public function deleteRoleAndPermissions($data)
    {
        Role::where('id', $data['id'])->delete();
        $this->alert('success','Role Has been Deleted');
    }
    public function createPermission($data){
        Permission::create([
             'name'=>$data['name'],
             'guard_name'=>'web'
        ]);
        $this->alert('success','Permission Has been Created');
    }
    public function updatePermission($data)
    {
        Permission::wher('id', $data['id'])->update([
            'name' => $data['name'],
        ]);
        $this->alert('success', 'Permission Has been Updated');
    }
    public function deletePermission($data)
    {
        Permission::where('id', $data['id'])->delete();
        $this->alert('success','Permission Has been Deleted');
    }
}
