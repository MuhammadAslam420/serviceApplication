<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>Edit Category {{ $name }}</h5>
                <div class="list-btn">
                    <ul>
                        <li>
                            <a class="btn btn-primary text-center text-light" href="{{ route('admin.categories') }}"><i class="fas fa-tag text-cyan-800"></i>All Categories</a>
                        </li>
                       
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 ">
                    <form wire:submit.prevent='addCategory' enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="label-control">Category</label>
                                    <input type="text" name="name" id="name" class="form-control rounded-lg" wire:model='name' wire:keyup='slugGenerate'>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug" class="label-control">Category Slug(Auto Generate)</label>
                                    <input type="text" readonly name="slug" id="slug" class="form-control rounded-lg" wire:model='slug'>
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_logo" class="label-control">Category Logo</label>
                                    <input type="file" name="new_logo" id="new_logo" class="form-control rounded-lg" wire:model='new_logo'>
                                   
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="file-preview">
                                    <ul>
                                       
                                        @if($new_logo)
                                   
                                        <li>
                                            <div class="img-preview">
                                                <img src="{{$new_logo->temporaryurl()}}" alt="Service Image">
                                            </div>
                                        </li>
                                        @else
                                        <li>
                                            <div class="img-preview">
                                                <img src="{{ asset('assets/imgs/category') }}/{{ $logo }}"
                                                    alt="Service Image">

                                            </div>
                                        </li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_overlay" class="label-control">Category Overlay</label>
                                    <input type="file" name="new_overlay" id="new_overlay" class="form-control rounded-lg" wire:model='new_overlay'>
                                 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="file-preview">
                                    <ul>
                                       
                                        @if($new_overlay)
                                   
                                        <li>
                                            <div class="img-preview">
                                                <img src="{{$new_overlay->temporaryurl()}}" alt="Service Image">
                                            </div>
                                        </li>
                                        @else
                                        <li>
                                            <div class="img-preview">
                                                <img src="{{ asset('assets/imgs/services/default') }}/{{ $overlay }}"
                                                    alt="Service Image">

                                            </div>
                                        </li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="label-control">Category Status</label>
                                    <select name="status" id="status" class="form-control" wire:model='status'>
                                        <option value="" selected >Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="flex justify-end">
                                    <button type="submit" class="btn btn-primary text-dark">Save</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>


        </div>


    </div>