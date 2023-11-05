<div>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Payment Methods</h2>
                    </div>
                    <div class="card-body">
                        <div class="row p-1">
                            
                            <div class="col-md-6">
                                <div class="card-title">Jazzcash Payment Module</div>
                                <form wire:submit.prevent='updateJazzcash' class=" border-2 p-2">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="jazzcash" class="label-control">Jazzcash</label>
                                            <input type="text" name="jazzcash" id="jazzcash" class="form-control border-dark rounded-lg" readonly wire:model='jazzcash'>
                                        </div>
                                        <div class="form-group">
                                            <label for="jazzcash_type" class="label-control">Jazzcash Payment Module</label>
                                            <select name="jazzcash_type" id="jazzcash_type" class="form-control" wire:model='jazzcash_type'>
                                                <option value=""selected>Select Module</option>
                                                <option value="test">Test</option>
                                                <option value="production">Production</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="jazzcash_api" class="label-control">Jazzcash Api</label>
                                            <input type="text" name="jazzcash_api" id="jazzcash_api" class="form-control border-dark rounded-lg" readonly wire:model='jazzcash_api'>
                                            @error('jazzcash_api')
                                            <span class="text-danger">{{ $messages }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jazzcash_merchant_id" class="label-control">Jazzcash Merchant Id</label>
                                            <input type="text" name="jazzcash_merchant_id" id="jazzcash_merchant_id" class="form-control border-dark rounded-lg" readonly wire:model='jazzcash_merchant_id'>
                                            @error('jazzcash_merchant_id')
                                            <span class="text-danger">{{ $messages }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jazzcash_hash" class="label-control">Jazzcash Hash</label>
                                            <input type="text" name="jazzcash_hash" id="jazzcash_hash" class="form-control border-dark rounded-lg" readonly wire:model='jazzcash_hash'>
                                            @error('jazzcash_hash')
                                            <span class="text-danger">{{ $messages }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jazzcash_password" class="label-control">Jazzcash Password</label>
                                            <input type="text" name="jazzcash_password" id="jazzcash_password" class="form-control border-dark rounded-lg" readonly wire:model='jazzcash_password'>
                                            @error('jazzcash_password')
                                            <span class="text-danger">{{ $messages }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="jazzcash_status" class="label-control">Jazzcash Payment Module</label>
                                            <select name="jazzcash_status" id="jazzcash_status" class="form-control" wire:model='jazzcash_status'>
                                                <option value=""selected>Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group flex justify-end">
                                            <button type="submit" class="btn btn-success ">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="card-title">EasyPaisa Payment Module</div>
                                <form wire:submit.prevent='updateEasypaisa' class=" border-2 p-2">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="easypaisa" class="label-control">Easypaisa</label>
                                            <input type="text" name="easypaisa" id="easypaisa" class="form-control border-dark rounded-lg" readonly wire:model='easypaisa'>
                                        </div>
                                        <div class="form-group">
                                            <label for="easypaisa_type" class="label-control">Easypaisa Payment Module</label>
                                            <select name="easypaisa_type" id="easypaisa_type" class="form-control" wire:model='easypaisa_type'>
                                                <option value=""selected>Select Module</option>
                                                <option value="test">Test</option>
                                                <option value="production">Production</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="easypaisa_api" class="label-control">Easypaisa Api</label>
                                            <input type="text" name="easypaisa_api" id="easypaisa_api" class="form-control border-dark rounded-lg" readonly wire:model='easypaisa_api'>
                                            @error('easypaisa_api')
                                            <span class="text-danger">{{ $messages }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="easypaisa_merchant_id" class="label-control">Easypaisa Merchant Id</label>
                                            <input type="text" name="easypaisa_merchant_id" id="easypaisa_merchant_id" class="form-control border-dark rounded-lg" readonly wire:model='easypaisa_merchant_id'>
                                            @error('easypaisa_merchant_id')
                                            <span class="text-danger">{{ $messages }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="easypaisa_hash" class="label-control">Easypaisa Hash</label>
                                            <input type="text" name="easypaisa_hash" id="easypaisa_hash" class="form-control border-dark rounded-lg" readonly wire:model='easypaisa_hash'>
                                            @error('easypaisa_hash')
                                            <span class="text-danger">{{ $messages }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="easypaisa_password" class="label-control">Easypaisa Password</label>
                                            <input type="text" name="easypaisa_password" id="easypaisa_password" class="form-control border-dark rounded-lg" readonly wire:model='easypaisa_password'>
                                            @error('easypaisa_password')
                                            <span class="text-danger">{{ $messages }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="easypaisa_status" class="label-control">Easypaisa Payment Module</label>
                                            <select name="easypaisa_status" id="easypaisa_status" class="form-control" wire:model='easypaisa_status'>
                                                <option value=""selected>Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group flex justify-end">
                                            <button type="submit" class="btn btn-success ">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="card-title">Strip Payment Module</div>
                                <form wire:submit.prevent='updateStripe' class=" border-2 p-2">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="easypaisa" class="label-control">Stripe</label>
                                            <input type="text" name="stripe" id="stripe" class="form-control border-dark rounded-lg" readonly wire:model='stripe'>
                                        </div>
                                        <div class="form-group">
                                            <label for="stripe_type" class="label-control">Stripe Payment Module</label>
                                            <select name="stripe_type" id="stripe_type" class="form-control" wire:model='stripe_type'>
                                                <option value=""selected>Select Module</option>
                                                <option value="test">Test</option>
                                                <option value="production">Production</option>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="stripe_secrete_key" class="label-control">Stripe Secrete Key</label>
                                            <input type="text" name="stripe_secrete_key" id="stripe_secrete_key" class="form-control border-dark rounded-lg" readonly wire:model='stripe_secrete_key'>
                                            @error('stripe_secrete_key')
                                            <span class="text-danger">{{ $messages }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="stripe_password" class="label-control">Stripe Password</label>
                                            <input type="text" name="stripe_password" id="stripe_password" class="form-control border-dark rounded-lg" readonly wire:model='stripe_password'>
                                            @error('stripe_password')
                                            <span class="text-danger">{{ $messages }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="stripe_status" class="label-control">Stripe Payment Module</label>
                                            <select name="stripe_status" id="stripe_status" class="form-control" wire:model='stripe_status'>
                                                <option value=""selected>Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group flex justify-end">
                                            <button type="submit" class="btn btn-success ">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="card-title">Cash On Spot Payment Module</div>
                                <form wire:submit.prevent='updateCos' class=" border-2 p-2">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="cos" class="label-control">Cos</label>
                                            <input type="text" name="cos" id="cos" class="form-control border-dark rounded-lg" readonly wire:model='cos'>
                                        </div>
                                        <div class="form-group">
                                            <label for="cos_type" class="label-control">Cos Payment Module</label>
                                            <select name="cos_type" id="cos_type" class="form-control" wire:model='cos_type'>
                                                <option value=""selected>Select Module</option>
                                                <option value="test">Test</option>
                                                <option value="production">Production</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="cos_status" class="label-control">Cos Payment Module</label>
                                            <select name="cos_status" id="cos_status" class="form-control" wire:model='cos_status'>
                                                <option value=""selected>Select Status</option>
                                                <option value="active">Active</option>
                                                <option value="inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group flex justify-end">
                                            <button type="submit" class="btn btn-success ">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>