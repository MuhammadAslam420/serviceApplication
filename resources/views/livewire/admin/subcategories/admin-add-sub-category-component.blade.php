<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>All Categories</h5>
                <div class="list-btn">
                    <ul>
                        <li>
                            <a class="btn btn-primary text-center text-light" href="{{ route('admin.sub_categories') }}"><i class="fas fa-tag text-cyan-800"></i>All SubCategories</a>
                        </li>
                       
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 ">
                    <form wire:submit.prevent='addSubCategory'>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="label-control">SubCategory</label>
                                    <input type="text" name="name" id="name" class="form-control rounded-lg" wire:model='name' wire:keyup='slugGenerate'>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug" class="label-control">SubCategory Slug(Auto Generate)</label>
                                    <input type="text" readonly name="slug" id="slug" class="form-control rounded-lg" wire:model='slug'>
                                    @error('slug')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                         
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="category_id" class="label-control">Category</label>
                                    <select name="category_id" id="category_id" class="form-control" wire:model='category_id'>
                                        <option value="" selected >Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
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