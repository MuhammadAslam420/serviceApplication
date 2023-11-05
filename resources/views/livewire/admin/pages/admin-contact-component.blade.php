<div>
    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>Contact Page Image and Map</h5>
            
            </div>

            <div class="row">
                <div class="col-12 ">
                    <form wire:submit.prevent='updateContact' enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="map" class="label-control">Map<b class="text-danger">*</b></label>
                                    <input type="text" name="map" id="map" placeholder="Enter map" class="form-control border border-light rounded-lg" wire:model='map'>
                                    @error('map')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="main" class="label-control">Contact Image</label>
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