<?php

namespace App\Livewire\Admin\Rolesandpermissions;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesComponent extends Component
{
    use LivewireAlert;
    use WithPagination;
    #[Layout('layouts.admin')]

    public $roleName;
    public $userType = 'ADM'; // Assuming 'ADM' is the user type
    public  $user_id;
    public $permissionName;
    public $assignAllPermissions = false; // New property for the checkbox
    public $rolas;
    public $users;
    public $permissions;
    #[Rule('required|string|min:3')]
    public $role;

    public $role_id;
    public $isOpenModal = 0;

    #[Rule('required|string|min:3')]
    public $editRoleName;

    public function removePermission($roleId, $permissionId)
{
    // Find the role by its ID
    $role = Role::find($roleId);

    if ($role) {
        // Find the permission by its ID
        $permission = Permission::find($permissionId);

        if ($permission) {
            // Remove the permission from the role
            $role->revokePermissionTo($permission);
            $this->alert('success', 'Permission removed from the role.');
        } else {
            $this->alert('warning', 'Permission not found.');
        }
    } else {
        $this->alert('warning', 'Role not found.');
    }
}


    public function openModal($id)
    {
        $this->role_id = $id;
        //dd($id);
        $this->mount();
        $this->isOpenModal = true;
    }
    public function mount()
    {
        $this->users = User::where('utype','ADM')->get();
        $this->rolas= Role::get();
        $this->permissions= Permission::get();
        if($this->role_id){
            $role = Role::Find($this->role_id);
            //dd($role);
            if($role)
            {
                $this->editRoleName =$role->name;
                //dd($this->editRoleName);
            }
        }
       
    }

    public function assignRole()
    {
        $user = User::find($this->user_id);

        $user->assignRole($this->roleName);

        if ($this->assignAllPermissions) {
            $user->syncPermissions(Permission::all());
        }

        $this->reset();
        $this->alert('success', 'Role and permissions have been assigned successfully!');
    }
    public function addRole()
    {
        try {
            // Validate the input data
            $this->validate([
                'role' => 'required|unique:roles,name',
            ]);
    
            // Start a database transaction
            DB::beginTransaction();
    
            // Create a new role
            $role = new Role();
            $role->name = $this->role;
            $role->save();
    
            if ($this->assignAllPermissions) {
                // Assign all available permissions to the role
                $role->syncPermissions(Permission::all());
            }
    
            // Commit the database transaction
            DB::commit();
    
            // Reset the form
            $this->reset();
            $this->alert('success', 'Role has been created successfully!');
            return redirect()->route('admin.roles_permission');
        } catch (\Exception $e) {
            // Handle any exceptions that occurred
            DB::rollback(); // Roll back the database transaction
            $this->alert('error', 'An error occurred while creating the role.');
        }
    }
    
    public function assignPermissionsToRole()
    {
        $role = Role::findByName($this->roleName);

        // Assign individual permissions
        $permissionNames = explode(',', $this->permissionName);
        foreach ($permissionNames as $permissionName) {
            $permission = Permission::firstOrCreate(['name' => $permissionName]);
            $role->givePermissionTo($permission);
        }

        if ($this->assignAllPermissions) {
            // Assign all permissions to the role
            $allPermissions = Permission::pluck('name');
            $role->syncPermissions($allPermissions);
        }

        $this->reset();
        $this->alert('success', 'Permissions assigned to the role successfully.');
    }
    public function editRole()
    {
       $role = Role::find($this->role_id);
       $role->name = $this->editRoleName;
       $role->save();
       $this->closeModal();
       $this->alert('success','Role Has benn edit'); 
    }

    public function closeModal()
    {
        $this->isOpenModal = false;
        $this->reset();
    }
    public function render()
    {
        $roles = Role::paginate(10);
        return view('livewire.admin.rolesandpermissions.roles-component',['roles'=>$roles]);
    }
}
