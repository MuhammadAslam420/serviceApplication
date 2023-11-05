<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>All Categories</h5>
                <div class="list-btn">
                    <ul>
                        <li>
                            <a class="btn btn-primary text-center text-light" href="{{ route('admin.add_subcategory') }}"><i class="fas fa-tag text-cyan-800"></i>Add SubCategory</a>
                        </li>
                        <li>
                            <a class="btn btn-primary text-center text-light" href="{{ route('admin.deleted_subcategories') }}"><i class="fas fa-trash text-pink-800"></i> Deleted SubCategories</a>
                        </li>
                        <li>
                           <input type="search" name="search" id="search" wire:model.live='search' placeholder="search by name or slug..." class="form-control rounded-lg border border-light">
                        </li>
                        <li>
                            <select name="sort" id="sort" class="form-control" wire:model.live='sort'>
                                <option value="asc" selected>Default Sorting</option>
                                <option value="desc">New</option>
                            </select>
                        </li>
                        <li>
                            <select name="perPage" id="perPage" class="form-control" wire:model.live='perPage'>
                                <option value="5" selected>Default Page size</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                            </select>
                        </li>
                       
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 ">
                  <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>SubCategory</th>
                                <th>Slug</th>
                                <th>Category</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subcategories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                               
                                    <td>
                                        @if ($editedCategoryId === $category->id && $editfield === 'name')
                                        <input type="text" wire:model="editedValue"  />
                                        <button wire:click="updateName({{ $category->id }})" class="btn btn-primary text-dark">save</button>
                                        @else
                                        <span wire:click="startEdit({{ $category->id }},'name')">{{ $category->name }}</span>
                                        @endif
                                    </td>
                                
                                <td>  @if ($editedCategoryId === $category->id && $editfield === 'slug')
                                    <input type="text" wire:model="editedValue"  />
                                    <button wire:click="updateName({{ $category->id }})" class="btn btn-primary text-dark">save</button>
                                    @else
                                    <span wire:click="startEdit({{ $category->id }},'slug')">{{ $category->slug }}</span>
                                    @endif
                                </td>
                                <td>{{ $category->category->name }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($category->created_at)->isoFormat('MMM Do YYYY') }}
                                </td>
                                <td>
                                    <button class="btn bg-red-700" wire:click='deleteCategory("{{ $category->id }}")'><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                                
                            @empty
                                <tr>
                                    <div>
                                        <img src="{{ asset('assets/imgs/no-record.jpeg') }}" class="img-thumbnail" alt="">
                                    </div>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $subcategories->links() }}
                  </div>
                </div>
            </div>


        </div>


    </div>
</div>