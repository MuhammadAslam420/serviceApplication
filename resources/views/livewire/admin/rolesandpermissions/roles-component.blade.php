<div>
    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>Roles & Permission</h5>
                <div class="list-btn">
                    <ul>
                        <li>
                            <a class="btn btn-primary hover:text-orange-300 " href="#" data-bs-toggle="modal" data-bs-target="#edit-role">
                                <i class="fas fa-edit"></i> Assign Role
                            </a>
                            <a class="btn btn-primary hover:text-orange-300" href="#" data-bs-toggle="modal" data-bs-target="#add-role"><i
                                    class="fa fa-plus me-2"></i>Add Role</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 ">
                    <div class="table-resposnive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                    <th>Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td style="text-transform:capitalize;">{{ $role->name }}</td>
                                    <td style="text-transform:capitalize;">
                                        @php
                                        $count = 0; // Initialize a counter
                                        @endphp

                                        @foreach($role->permissions as $permission)
                                        @if ($count < 4) 
                                        @if(auth()->user()->can('delete') || auth()->user()->utype === 'ADM')
                                            <span class="badge bg-pink-400 text-dark font-semibold mt-1 cursor-pointer"
                                                style="font-size: 15px;"
                                                wire:click='removePermission({{ $role->id }}, {{ $permission->id }})'>
                                                {{ $permission->name }}
                                            </span>
                                            @else
                                            <span class="badge bg-pink-400 text-dark font-semibold mt-1"
                                                style="font-size: 15px;">
                                                {{ $permission->name }}
                                            </span>
                                            @endif
                                            @php
                                            $count++; // Increment the counter
                                            @endphp
                                            @else
                                            <br> <!-- Start a new line after 8 permissions -->
                                            @php
                                            $count = 0; // Reset the counter
                                            @endphp
                                            @endif
                                            @endforeach
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($role->created_at)->isoFormat("MMM Do YYYY") }}</td>
                                    <td>
                                        <div class="table-action d-flex">
                                            <button wire:click="openModal({{ $role->id }})"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded"><i
                                                    class="fa fa-plus me-2"></i>Edit Role</button>
                                            <a href="{{ route('admin.permissions_roles',['id'=>$role->id]) }}">
                                                <i class="fas fa-shield"></i>Assign Permissions
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-role" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content bg-indigo-500">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assin Role</h5>
                    <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-x"></i>
                    </button>
                </div>
                <form wire:submit.prevent='assignRole'>
                    <div class="modal-body py-0">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Role Name <span class="manitory">*</span></label>
                                    <select name="roleName" id="roleName" class="form-control" wire:model='roleName'>
                                        <option value="">Select Role</option>
                                        @foreach ($rolas ?? [] as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Select User <span class="manitory">*</span></label>
                                    <select name="user_id" id="user_id" class="form-control" wire:model='user_id'>
                                        <option value="">Select User</option>
                                        @foreach ($users ?? [] as $user)
                                        <option value="{{ $user->id }}">{{ $user->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">

                                    <label>Assign All Permissions</label>
                                    <input wire:model="assignAllPermissions" type="checkbox" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pt-0">
                        <button type="submit" class="btn btn-primary text-green-700 font-semibold">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /assign Role -->
    <div class="modal fade" id="add-role" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content bg-indigo-500">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                    <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-x"></i>
                    </button>
                </div>
                <form wire:submit.prevent='addRole'>
                    <div class="modal-body py-0">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Role Name <span class="manitory">*</span></label>
                                    <input type="text" name="role" id="role" class="form-control rounded-lg border-light" wire:model='role'>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Assign All Permissions <span class="text-orange-600">Optional</span></label>
                                    <input wire:model="assignAllPermissions" type="checkbox" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pt-0">
                        <button type="submit" class="btn btn-primary text-green-700 font-semibold">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Role -->
    @if($isOpenModal)
   <x-edit-role />
    @endif
</div>