<div>
    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>About Page Images and Experience</h5>
            
            </div>

            <div class="row">
                <div class="col-12 ">
                    <form wire:submit.prevent='updateAbout' enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="experience" class="label-control">Experience<b class="text-danger">*</b></label>
                                    <input type="text" name="experience" id="experience" placeholder="Enter experience like 12, 16 or 24 ..." class="form-control border border-light rounded-lg" wire:model='experience'>
                                    @error('experience')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="main" class="label-control">About To Main Image</label>
                                    <input type="file" name="image1" id="image1" class="form-control" wire:model='image1'>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if($image1)
                                    <img src="{{ $image1->temporaryurl() }}" alt="" width="120">
                                    @else
                                    <img src="{{ asset('assets/imgs') }}/{{ $image }}" alt="" width="120">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="main1" class="label-control">About Why Choose Image</label>
                                    <input type="file" name="new_image" id="new_image" class="form-control" wire:model='new_image'>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    @if($new_image)
                                    <img src="{{ $new_image->temporaryurl() }}" alt="" width="120">
                                    @else
                                    <img src="{{ asset('assets/imgs') }}/{{ $image2 }}" alt="" width="120">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 flex justify-end">
                                <button type="submit" class="btn btn-primary text-white ">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>