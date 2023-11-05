<?php

namespace App\Livewire\Admin\Rolesandpermissions;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $role_id;
    // public $permissions;
    public $allowAllModules;
    public $checkboxValues = [];
    public function mount($id)
    {
        $this->role_id = $id;
    }
    public function updatedAllowAllModules()
    {
        $role = Role::find($this->role_id);

        $selectedPermissionIds = array_keys(array_filter($this->checkboxValues));

        if (count($selectedPermissionIds) > 0) {
            $permissions = Permission::whereIn('id', $selectedPermissionIds)->pluck('name')->toArray();
            $role->syncPermissions($permissions);
            $this->alert('success', 'Assigned selected permissions to the role');
        } else {
            $this->alert('warning', 'No permissions selected.');
        }
    }
    public function bulkAssignPermissions()
    {
        $this->updatedAllowAllModules(); // Call the method to handle the bulk assignment
    }

    public function render()
    {

        $permissions = Permission::all();
        $role = Role::find($this->role_id);

        return view('livewire.admin.rolesandpermissions.roles-permissions-component', [
            'permissions' => $permissions, 'role' => $role,
        ]);
    }
}
