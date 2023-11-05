<div>
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Create New Services</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create Services</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mx-auto">
                        <div class="service-wizard">
                            <ul id="progressbar">
                                @foreach ($stepContent as $index => $content)
                                <li class="{{ $currentStep == ($index + 1) ? 'active' : '' }}">
                                    <div class="multi-step-icon">
                                        <span><i class="fa-regular fa-circle-check"></i></span>
                                    </div>
                                    <div class="multi-step-info">
                                        <h6>{{ $content }}</h6>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="container p-2">
                            <form wire:submit.prevent="createService" enctype="multipart/form-data">
                                @csrf
                                @if ($currentStep === 1)
                                <div class="card add-service">
                                    <div class="row">
                                        <div class="sub-title flex justify-center">
                                            <h6>Service Information</h6>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="serviceTitle" class="label-control">Service Title</label>
                                                <input type="text" id="serviceTitle"
                                                    class="form-control rounded-lg border border-indigo-3"
                                                    placeholder="Enter Services Name" name="serviceTitle"
                                                    wire:model='serviceTitle' wire:keyup='generateSlug'>
                                                @error('serviceTitle')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="slug" class="label-control">Service Title Slug(Auto
                                                    Generated)</label>
                                                <input type="text" id="slug"
                                                    class="form-control rounded-lg border border-indigo-3" name="slug"
                                                    wire:model='slug' readonly>
                                                @error('slug')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="category" class="label-control">Category</label>
                                                <select class="form-control" id="category" name='category'
                                                    wire:model='category' wire:change="setSubCategories">
                                                    <option>Select category</option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="subcategory" class="label-control">Sub Category</label>
                                                <select class="form-control" id="subcategory" name='subcategory'
                                                    wire:model='subcategory'>
                                                    <option>Select category</option>
                                                    @foreach ($subCategories as $sub)
                                                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('subcategory')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="serviceType" class="label-control">Service Type</label>
                                                <select class="form-control" id="serviceType" name='serviceType'
                                                    wire:model='serviceType'>
                                                    <option>Select Service Type</option>
                                                    @foreach ($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('serviceType')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="price" class="label-control d-block">Price<span
                                                        class="brief-bio float-end">Set 0 for free</span></label>
                                                <input type="text" id="price"
                                                    class="form-control rounded-lg border border-indigo-3" name="price"
                                                    wire:model='price'>
                                                @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="discount" class="label-control d-block">Discount Price<span
                                                        class="brief-bio float-end">Set 0 for No Discount</span></label>
                                                <input type="text" id="discount"
                                                    class="form-control rounded-lg border border-indigo-3"
                                                    name="discount" wire:model='discount'>
                                                @error('discount')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="duration" class="label-control d-block">Duration</label>
                                                <input type="text" id="duration"
                                                    class="form-control rounded-lg border border-indigo-3"
                                                    name="duration" wire:model='duration'>
                                                @error('duration')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group mb-0" wire:ignore>
                                                <label for="description" class="label-control">Description</label>
                                                <textarea class="form-control rounded-lg border border-indigo-3"
                                                    id="description" name="description"
                                                    wire:model='description'></textarea>
                                                @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @elseif ($currentStep === 2)
                                <div class="card add-service">
                                    <div class="row">
                                        <div class="sub-title flex justify-center">
                                            <h6>Location</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="address" class="label-control">Address</label>
                                                <input type="text" id="address"
                                                    class="form-control rounded-lg border border-indigo-3"
                                                    placeholder="Enter Your Address" name="address"
                                                    wire:model='address'>
                                                @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city" class="label-control">City</label>
                                                <input type="text" id="city"
                                                    class="form-control rounded-lg border border-indigo-3"
                                                    placeholder="Enter City" name="city" wire:model='city'>
                                                @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country" class="label-control">Country</label>
                                                <select name="country" id="country" class="form-control"
                                                    wire:model='country'>
                                                    <option value="" selected> Select Your Country</option>
                                                    @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ Str::ucfirst($country->name)
                                                        }}</option>

                                                    @endforeach
                                                </select>
                                                @error('country')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state" class="label-control">State</label>
                                                <input type="text" id="state"
                                                    class="form-control rounded-lg border border-indigo-3"
                                                    placeholder="Enter Your State" name="state" wire:model='state'>
                                                @error('state')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="zipcode" class="label-control">zipcode</label>
                                                <input type="text" id="zipcode"
                                                    class="form-control rounded-lg border border-indigo-3"
                                                    placeholder="Enter Your Pincode" name="zipcode"
                                                    wire:model='zipcode'>
                                                @error('zipcode')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lat" class="label-control">Latitude</label>
                                                <input type="text" id="lat"
                                                    class="form-control rounded-lg border border-indigo-3"
                                                    placeholder="Enter Latitude Number" name="lat" wire:model='lat'>
                                                @error('lat')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lng" class="label-control">Longitude</label>
                                                <input type="text" id="lng"
                                                    class="form-control rounded-lg border border-indigo-3"
                                                    placeholder="Enter Longitude Number" name="lng" wire:model='lng'>
                                                @error('lng')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @elseif ($currentStep === 3)
                                <div class="card add-service">
                                    <div class="sub-title flex justify-center">
                                        <h6>Gallery</h6>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="file" class="form-control" name="image" wire:model='image'>
                                                @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 flex justify-center">
                                            <h6>Select Default Image:</h6>
                                            @if($image)
                                            <div class="img-preview">
                                                <img src="{{$image->temporaryurl()}}" alt="image">
                                            </div>
                                            @else
                                            <div class="img-preview">
                                                <img src="{{ asset('assets/imgs/upload-icon.svg') }}" alt="image">
                                            </div>
                                            @endif

                                        </div>
                                    </div>

                                    <div class="form-group">

                                        <input type="file" class="form-control" name="gallery[]" multiple
                                            wire:model='gallery'>
                                        @error('gallery.*')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>
                                    <div class="file-preview">
                                        <ul>
                                            <li>
                                                <h6>Select Service gallery:</h6>
                                            </li>
                                            @if($gallery)
                                            @foreach($gallery as $image)
                                            @if($image)
                                            <li>
                                                <div class="img-preview">
                                                    <img src="{{$image->temporaryurl()}}" alt="Service Image">
                                                </div>
                                            </li>
                                            @endif
                                            @endforeach
                                            @else
                                            <li>
                                                <div class="img-preview">
                                                    <img src="{{ asset('assets/imgs/service-01.jpg') }}"
                                                        alt="Service Image">

                                                </div>
                                            </li>
                                            @endif

                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <label for="video_link" class="label-control">Embed Youtube Video URL</label>
                                        <input type="text" id="video_link"
                                            class="form-control rounded-lg border border-indigo-300"
                                            placeholder="Ex: https//youtube.com" name="video_link"
                                            wire:model='video_link'>
                                        @error('video_link')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                @elseif ($currentStep === 4)
                                <div class="card add-service">
                                    <div class="sub-title flex justify-center">
                                        <h6>SEO</h6>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="meta_keyword" class="label-control">Meta Keywords
                                                    (English)</label>
                                                <input type="text"
                                                    class="form-control rounded-lg border border-indigo-3"
                                                    placeholder="Enter Your Address" id="meta_keyword"
                                                    name="meta_keyword" wire:model='meta_keyword'>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="meta_description" class="label-control">Meta Description
                                                    (English)</label>
                                                <textarea class="form-control" id="meta_description"
                                                    name="meta_description" wire:model='meta_description'></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="field-bottom-btns ">
                                    <div class="field-btns">
                                        @if ($currentStep > 1)
                                        <button class="btn btn-primary" wire:click="prevStep"><i
                                                class="fa-solid fa-arrow-left"></i>Prev</button>
                                        @endif
                                    </div>
                                    <div class="field-btns">
                                        @if ($currentStep < count($stepContent)) <button class="btn btn-primary"
                                            wire:click="nextStep">Next<i class="fa-solid fa-arrow-right"></i></button>
                                            @else

                                            <button class="btn bg-success" type="submit">Submit</button>
                                            @endif
                                    </div>
                                </div>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                            </form>
                        </div>

                    </div>
                </div>
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