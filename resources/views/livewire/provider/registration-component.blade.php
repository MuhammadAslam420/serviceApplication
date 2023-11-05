<div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 mx-auto">
                    <div class="login-wrap">
                        <div class="login-back">
                            <a href="/"><i class="fa-solid fa-arrow-left me-2"></i> Back To Home</a>
                        </div>
                        <div class="login-header">
                            <div class="text-center">
                                <h3>Provider Signup</h3>
                            </div>
                        </div>
    
                        <!-- Signup Form -->
                        <form wire:submit.prevent='createNewProvider' enctype="multipart/form-data">
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Full Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your name" name="name" wire:model='name'>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">User Name</label>
                                        <input type="text" class="form-control" placeholder="Enter your username" name='username' wire:model='username'>
                                        @error('username')
                                        <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">E-mail</label>
                                <input type="email" class="form-control" placeholder="example@email.com" name='email' wire:model='email'>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                    
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-form-label">Phone Number</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            name="mobile" placeholder="923107896253" wire:model='mobile'>
                                            @error('mobile')
                                            <span class="text-danger">{{ $message }}</span>
                                                
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="col-form-label">Profile Picture</label>
                                    <div class="form-group">
                                        <input type="file" class="form-control"
                                            id="profile" name="profile" placeholder="923107896253" wire:model='profile'>
                                            @error('profile')
                                            <span class="text-danger">{{ $message }}</span>
                                                
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div wire:loading wire:target="profile" wire:key="profile"><i class="fa fa-spinner fa-spin mt-2 ml-2"></i> Uploading</div>
                                    @if($profile)
                                    <img src="{{ $profile->temporaryUrl() }}" width="120" alt="imge">
                                    @endif
                                  
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">City</label>
                                        <input type="text" class="form-control" placeholder="Enter your city" name="city" wire:model='city'>
    
                                        @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-form-label">Country</label>
                                        <input type="text" class="form-control" placeholder="Enter your country" name='country' wire:model='country'>
                                        @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                            
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="col-form-label">Address</label>
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                             name="address" placeholder="Address ...." name='address' wire:model='address'>
                                             @error('address')
                                             <span class="text-danger">{{ $message }}</span>
                                                 
                                             @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label d-block">Password<span class="brief-bio float-end">Must
                                        be 8 Characters at Least</span></label>
                                <div class="pass-group">
                                    <input type="password" class="form-control pass-input"
                                        placeholder="*************" name="password" wire:model='password'>
                                    <span class="toggle-password feather-eye"></span>
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                        
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn bg-indigo-600 hover:bg-teal-600 text-light">SignUp</button>
                        
                            <div class="social-login">
                                <a href="#" class="btn btn-google w-100"><img src="{{ asset('assets/imgs/google.svg') }}"
                                        class="me-2" alt="img">Log in with Google</a>
                                <a href="#" class="btn btn-google w-100"><img src="{{ asset('assets/imgs/fb.svg') }}"
                                        class="me-2" alt="img">Log in with Facebook</a>
                            </div>
                        </form>
                        <!-- /Signup Form -->
    
                    </div>
                </div>
            </div>
    
        </div>
    </div>
</div>
