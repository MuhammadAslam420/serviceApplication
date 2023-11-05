<div>
    <div class="page-wrapper">
        <div class="content">
            <form enctype="multipart/form-data" wire:submit.prevent='updateSettings'>
                <div class="row">
                    <div class="col-lg-7 col-sm-12 m-auto">
                        <div class="content-page-header">
                            <h5 class="mb-2">Web Settings</h5>
                            <div class="form-group mb-0">
                                {{-- <p class="contentpage">You are editing "English" version</p> --}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>App Name</label>
                                    <input type="text" class="form-control rounded-lg border-lime-300" placeholder="Enter App Name" wire:model="app_name">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Logo</label>
                                    <input type="file" class="form-control"  wire:model="new_logo">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Logo</label>
                                    @if($new_logo)
                                    <img src="{{ $new_logo->temporaryurl() }}" width="120" alt="">
                                    @else
                                    <img src="{{ asset('assets/imgs') }}/{{ $logo }}" width="120" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Footer Logo</label>
                                    <input type="file" class="form-control"  wire:model="new_footer_logo">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Logo</label>
                                    @if($new_footer_logo)
                                    <img src="{{ $new_footer_logo->temporaryurl() }}" width="120" alt="">
                                    @else
                                    <img src="{{ asset('assets/imgs') }}/{{ $footer_logo }}" width="120" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Favicon</label>
                                    <input type="file" class="form-control"  wire:model="new_favicon">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Logo</label>
                                    @if($new_favicon)
                                    <img src="{{ $new_favicon->temporaryurl() }}" width="120" alt="">
                                    @else
                                    <img src="{{ asset('assets/imgs') }}/{{ $favicon }}" width="120" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Site Address</label>
                                    <input type="text" class="form-control rounded-lg border-lime-300" placeholder="Enter Address" wire:model="address">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" class="form-control rounded-lg border-lime-300" placeholder="Enter facebook url" wire:model="facebook">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" class="form-control rounded-lg border-lime-300" placeholder="Enter instagram url" wire:model="instagram">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>TikTok</label>
                                    <input type="text" class="form-control rounded-lg border-lime-300" placeholder="Enter tiktok url" wire:model="tiktok">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>SnapChat</label>
                                    <input type="text" class="form-control rounded-lg border-lime-300" placeholder="Enter snapchat url" wire:model="snapchat">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Whatsapp</label>
                                    <input type="text" class="form-control rounded-lg border-lime-300" placeholder="Enter whatsapp" wire:model="whatsapp">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control rounded-lg border-lime-300" placeholder="Enter email" wire:model="email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="text" class="form-control rounded-lg border-lime-300" placeholder="Enter mobile" wire:model="mobile">
                                </div>
                            </div>
                            <!-- Add similar fields for other database columns -->
                            <div class="col-lg-12">
                                <div class="btn-path">
                                    <a href="javascript:void(0);" class="btn btn-cancel me-3">Cancel</a>
                                    <button wire:click="updateSettings" class="btn btn-primary">Update Settings</button>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>