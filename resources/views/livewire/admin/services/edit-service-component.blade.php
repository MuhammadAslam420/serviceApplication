<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>Edit Service form</h5>
            </div>
            <div class="row">
                <div class="col-12">
                    <form wire:submit.prevent='updateService' enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class="label-control">Title</label>
                                    <input type="text" name="title" id="title"
                                        class="form-control rounded-lg border border-light" wire:model='title' wire:keyup='generateSlug'>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="slug" class="label-control">Slug(Auto Generated)</label>
                                    <input type="text" readonly name="slug" id="slug"
                                        class="form-control rounded-lg border border-light" wire:model='slug'>
                                    @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="price" class="label-control">Price</label>
                                    <input type="text" name="price" id="price"
                                        class="form-control rounded-lg border border-light" wire:model='price'>
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="discount" class="label-control">Discount</label>
                                    <input type="text" name="discount" id="discount"
                                        class="form-control rounded-lg border border-light" wire:model='discount'>
                                    @error('discount')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="position" class="label-control">Position</label>
                                    <input type="text" name="position" id="position"
                                        class="form-control rounded-lg border border-light" wire:model='position'>
                                    @error('position')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="duration" class="label-control">Duration(Minutes)</label>
                                    <input type="text" name="duration" id="duration"
                                        class="form-control rounded-lg border border-light" wire:model='duration'>
                                    @error('duration')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="category_id" class="label-control">Category</label>
                                    <select name="category_id" id="category_id" class="form-control"
                                        wire:model='category_id' wire:change="setSubCategories">
                                        @forelse ($categoires as $category)
                                        <option value="{{ $category->id }}">{{ Str::ucfirst($category->name )}}</option>
                                        @empty
                                        <option value="" selected>Opsno category found</option>
                                        @endforelse
                                    </select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="sub_category_id" class="label-control">SubCategory</label>
                                    <select name="sub_category_id" id="sub_category_id" class="form-control" wire:model='sub_category_id'>
                                        @foreach ($subCategories as $sub)
                                            <option value="{{ $sub->id }}"  {{ $sub_category_id === $sub->id ? 'selected' : '' }}>
                                                {{ Str::ucfirst($sub->name) }}
                                            </option>
                                        @endforeach
                                    </select>
                                    
                                    @error('sub_category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="service_type_id" class="label-control">Service Type</label>
                                    <select name="service_type_id" id="service_type_id" class="form-control"
                                        wire:model='service_type_id'>
                                        @forelse ($types as $type)
                                        <option value="{{ $type->id }}">{{ Str::ucfirst($type->name )}}</option>
                                        @empty
                                        <option value="" selected>Ops no types found</option>
                                        @endforelse
                                    </select>
                                    @error('service_type_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="user_id" class="label-control">Provider</label>
                                    <input type="text" readonly name="user_id" id="user_id"
                                        class="form-control rounded-lg border border-light" wire:model='user_id'>
                                    @error('user_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status" class="label-control">Status</label>
                                    <select name="status" id="status" class="form-control" wirre:model='status'>
                                        <option value="active">Active</option>
                                        <option value="inactive">InActive</option>
                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="approved" class="label-control">Approved</label>
                                    <select name="approved" id="approved" class="form-control" wirre:model='approved'>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                    </select>
                                    @error('approved')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="featured" class="label-control">Featured</label>
                                    <select name="featured" id="featured" class="form-control" wirre:model='featured'>
                                        <option value="vip">Vip</option>
                                        <option value="top">Top</option>
                                        <option value="featured">Featured</option>
                                        <option value="non-featured">Non-Featured / Normal</option>
                                    </select>
                                    @error('featured')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="type" class="label-control">Service Ad Type</label>
                                    <select name="type" id="type" class="form-control" wirre:model='type'>
                                        <option value="free">Free</option>
                                        <option value="paid">Paid</option>
                                    </select>
                                    @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="zipcode" class="label-control">Zipcode</label>
                                    <input type="text" name="zipcode" id="zipcode"
                                        class="form-control rounded-lg border border-light" wire:model='zipcode'>
                                    @error('zipcode')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="city" class="label-control">City</label>
                                    <input type="text" name="city" id="city"
                                        class="form-control rounded-lg border border-light" wire:model='city'>
                                    @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="state" class="label-control">State</label>
                                    <input type="text" name="state" id="state"
                                        class="form-control rounded-lg border border-light" wire:model='state'>
                                    @error('state')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="country_id" class="label-control">Country</label>
                                    <select name="country_id" id="country_id" class="form-control"
                                        wire:model='country_id'>
                                        @forelse ($countries as $country)
                                        <option value="{{ $country->id }}">{{ Str::ucfirst($country->name )}}</option>
                                        @empty
                                        <option value="" selected>Opsno category found</option>
                                        @endforelse
                                    </select>
                                    @error('country_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address" class="label-control">Address</label>
                                    <input type="text" name="address" id="address" class="form-control rounded-lg border border-light"
                                        wire:model='address'>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="featured" class="label-control">latitude</label>
                                    <input type="text" name="lat" id="lat" class="form-control rounded-lg border border-light" wire:model='lat'>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="lng" class="label-control">Longitude</label>
                                    <input type="text" name="lng" id="lng" class="form-control rounded-lg border border-light" wire:model='lng'>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="label-control">Default Service Image</label>
                                    <input type="file" name="new_image" id="new_image" class="form-control"
                                        wire:model='new_image'>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="card">
                                        @if($new_image)
                                        <img src="{{ $new_image->temporaryUrl() }}" class="img-thumbnail" alt="">
                                        @else
                                        <img src="{{ asset('assets/imgs/services/default') }}/{{ $image }}" class="img-thumbnail" alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_gallery" class="label-control">Service Gallery</label>
                                    <input type="file" multiple name="new_gallery[]" id="new_gallery" class="form-control"
                                        wire:model='new_gallery'>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="file-preview">
                                    <ul>
                                       
                                        @if($new_gallery)
                                        @foreach($new_gallery as $image)
                                        @if($image)
                                        <li>
                                            <div class="img-preview">
                                                <img src="{{$image->temporaryurl()}}" alt="Service Image">
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach
                                        @elseif($gallery)
                                        @php
                                            $images = explode(',',$gallery);
                                        @endphp
                                        @forelse($images as $image)
                                        @if($image)
                                        <li>
                                            <div class="img-preview">
                                                <img src="{{asset('assets/imgs/services/gallery')}}/{{ $image }}" alt="Service Image">
                                            </div>
                                        </li>
                                        @endif
                                        @empty
                                        <li>
                                            <div class="img-preview">
                                                <img src="{{asset('assets/imgs/no-record.jpeg')}}" alt="Service Image">
                                            </div>
                                        </li>

                                        @endforelse
                                        @else
                                        <li>
                                            <div class="img-preview">
                                                <img src="{{ asset('assets/imgs/no-record.jpeg') }}"
                                                    alt="Service Image">

                                            </div>
                                        </li>
                                        @endif

                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="video_link" class="label-control">Video Link</label>
                                   <input type="text" name="video_link" id="video_link" class="form-control rounded-lg border border-light" wire:model='video_link'>
                                    @error('video_link')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" wire:ignore>
                                    <label for="description" class="label-control">Description</label>
                                    <textarea class="form-control rounded-lg border border-indigo-3" id="description"
                                        name="description" wire:model='description'>{{ $description }}</textarea>
                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="flex justify-end">
                                    <button type="submit" class="btn btn-primary text-dark hover:text-light ">Update Service</button>

                                </div>
                            </div>

                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#description' ), {
            ckfinder: {
                options: {
                    skin: 'moono-lisa',
                    backgroundColor: 'rgb(0,0,0)'
                }
            }
        } )
        .then( editor => {
            editor.model.document.on('change:data', (e) => {
                @this.set('description', editor.getData());
            });
        })
        .catch( error => {
            console.error( error );
        });
    </script>
    @endpush