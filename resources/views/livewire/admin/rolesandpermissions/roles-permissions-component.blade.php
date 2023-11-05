<div>
    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>Permission</h5>
            </div>

            <div class="role-wrap">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Role Name: <span style='text-transform:capitalize;'>{{ $role->name }}</span></h6>
                    </div>
                    <div class="col-md-6">
                       <button class="btn bg-indigo-700 text-white hover:text-orange-600" wire:click='bulkAssignPermissions'>Bulk Assign</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 ">
                    <div class="table-resposnive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Modules</th>
                                    <th>Check</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td class="mod-name" style="text-transform: capitalize;">{{ $permission->name }}</td>
                                    <td>
                                        <label class="checkboxs mb-0">
                                            <input type="checkbox" wire:model="checkboxValues.{{ $permission->id }}" value="{{ $permission->id }}">
                                            <span><i></i></span>
                                        </label>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        
                    </div>

                    <div class="btn-path text-center mt-4">
                        <a href="javascript:void(0);" class="btn btn-cancel me-3">Back</a>
                        <button type="submit" class="btn btn-primary ">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Role -->
    <div class="modal fade" id="add-role" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                    <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fe fe-x"></i>
                    </button>
                </div>
                <form action="roles-permissions.html">
                    <div class="modal-body py-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Role Name <span class="manitory">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Role Name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pt-0">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Add Role -->

    <!-- Edit Role -->
    <div class="modal fade" id="edit-role" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                    <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fe fe-x"></i>
                    </button>
                </div>
                <form action="roles-permissions.html">
                    <div class="modal-body py-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label>Role Name <span class="manitory">*</span></label>
                                    <input type="text" class="form-control" placeholder="Enter Role Name" value="Admin">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pt-0">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Edit Role -->

    <!-- Delete -->
    <div class="modal fade" id="delete-item" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Roles Permission</h5>
                    <button type="button" class="btn-close close-modal" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fe fe-x"></i>
                    </button>
                </div>
                <form action="roles-permissions.html">
                    <div class="modal-body py-0">
                        <div class="del-modal">
                            <p>Are you sure want to Delete?</p>
                        </div>
                    </div>
                    <div class="modal-footer pt-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>