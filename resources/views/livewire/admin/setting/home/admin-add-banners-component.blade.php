<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>Create New Banner</h5>
                <div class="list-btn">
                    <ul>

                        <li>
                            <a href="{{ route('admin.home_banners') }}" class="btn btn-sm bg-black"><i
                                    class="fas fa-sliders-h text-white"></i></a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="card p-2">
                    <form wire:submit.prevent='addBanner' enctype="multipart/form-data">
                        <div class="form-group">
                            <x-label value="{{__('Title')  }}" />
                            <x-input type='text' name='title' wire:model='title' class="block mt-1 w-full" />
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <x-label value="{{__('Subtitle')  }}" />
                            <x-input type='text' name='subtitle' wire:model='subtitle' class="block mt-1 w-full" />
                            @error('subtitle')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <x-label value="{{__('Link')  }}" />
                            <x-input type='text' name='link' wire:model='link' class="block mt-1 w-full" />
                            @error('link')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <x-label value="{{__('Status')  }}" />
                            <select name="status" id="status" wire:model='status' class="form-control">
                                <option value="">Select Status</option>
                                <option value="active">Active</option>
                                <option value="inactive">InActive</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <x-label value="{{__('Image')  }}" />
                                    <x-input type='file' name='image' wire:model='image' class="block mt-1 w-full" />
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="file-preview">
                                        <ul>
    
                                            @if($image)
    
                                            <li>
                                                <div class="img-preview">
                                                    <img src="{{$image->temporaryurl()}}" alt="Service Image">
                                                </div>
                                            </li>
                                            @else
                                            <li>
                                                <div class="img-preview">
                                                    <img src="{{ asset('assets/imgs/services/default/service-01.jpg') }}"
                                                        alt="Service Image">
    
                                                </div>
                                            </li>
                                            @endif
    
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <x-button class="ml-4">
                                {{ __('Add Banner') }}
                            </x-button>
                        </div>
                    </form>
                </div>

            </div>


        </div>


    </div>
</div>