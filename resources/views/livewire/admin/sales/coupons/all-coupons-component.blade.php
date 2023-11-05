<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            @if($isOpen)
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            @if($coupon)
                            Update Coupon
                            @else
                            Create New Coupon
                            @endif
                        </h2>
                        <button class="btn btn-sm justify-end" wire:click='closeModal'><i class="fas fa-close text-red-700"></i></button>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent='updateCoupon'>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="code" class="label-conrtol">Coupon Code</label>
                                        <input type="text" name="code" id="code" class="form-control rounded-lg border-gray-200" wire:model='code'>
                                        @error('code')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="discount_amount" class="label-conrtol">Discount Amount</label>
                                        <input type="text" name="discount_amount" id="discount_amount" class="form-control rounded-lg border-gray-200" wire:model='discount_amount'>
                                        @error('discount_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="type" class="label-conrtol">Coupon Discount type</label>
                                        <select name="type" id="type" wire:model='type' class="form-control">
                                            <option value="" >Select Discount Type</option>
                                            <option value="fixed">Fixed</option>
                                            <option value="percentage">Percentage</option>
                                        </select>
                                       @error('type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="discount_amount" class="label-conrtol">Discount Amount</label>
                                        <select name="is_active" id="is_active" wire:model='is_active' class="form-control">
                                            <option value="" >Select Status</option>
                                            <option value="0">InActive</option>
                                            <option value="1">Active</option>
                                        </select>                                        
                                        @error('is_active')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 justify-end">
                                    <button type="submit" class="btn btn-sm bg-black text-white hover:bg-black">Update Coupon</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
           
            @else
            <div class="content-page-header content-page-headersplit">
                <h5>All Coupons</h5>
                <div class="list-btn">
                    <ul>
                        <li>
                            <a class="btn btn-sm bg-[#140922] text-white hover:bg-green-800"
                                href="#" wire:click='openModal'><i class="fas fa-gift text-white mr-2"></i>Create Coupon</a>
                        </li>
                       
                        <li>
                            <input type="search" name="search" id="search" wire:model.live='search'
                                placeholder="search Coupon Genrator"
                                class="form-control rounded-lg border-gray-300">
                        </li>
                        <li>
                            <input type="search" name="searchCode" id="searchCode" wire:model.live='searchCode'
                                placeholder="search coupon code"
                                class="form-control rounded-lg border-gray-300">
                        </li>
                        <li>
                            <select name="sorting" id="sorting" class="form-control " wire:model.live='sorting'>
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
                                    <th>Coupon Genrator</th>
                                    <th>Code</th>
                                    <th>CouponBy</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Discount</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($coupons as $coupon)
                                <tr>
                                    <td>{{ $coupon->id }}</td>

                                    <td>
                                       
                                        <span >{{ $coupon->user->name}}</span>
                                       
                                    </td>

                                    <td> 
                                        <span >{{ $coupon->code}}</span>
                                        
                                    </td>
                                    <td>{{ $coupon->utype }}</td>
                                    <td>
                                        @if($coupon->type === 'percentage')
                                        <span class="btn btn-sm bg-slate-700 text-white" style='text-transform:capitalize;'>{{ $coupon->type}}</span>
                                        @else
                                        <span class="btn btn-sm bg-green-500 text-white" style='text-transform:capitalize;'>{{ $coupon->type}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($coupon->is_active != 1)
                                        <span class="btn btn-sm bg-red-600 text-white" wire:click='updateStatus({{ $coupon->id }},1)'>InActive</span>
                                        @else
                                        <span class="btn btn-sm text-white bg-black" wire:click='updateStatus({{ $coupon->id }},0)'>Active</span>
                                        @endif
                                    </td>
                                    <td>{{ $coupon->discount_amount }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($coupon->created_at)->isoFormat('MMM Do YYYY') }}
                                    </td>
                                    <td>
                                        @if($coupon->utype == Auth::user()->utype && $coupon->user_id == Auth::user()->id)
                                        <a href="{{ route('admin.coupon_detail',['id'=>$coupon->id]) }}" class="btn btn-sm bg-[#140922] hover:bg-green-600 "><i class="fas fa-eye text-white"></i></a>

                                        <button class="btn btn-sm bg-[#140922] hover:bg-yellow-600" wire:click='openModal({{ $coupon->id }})'><i class="fas fa-edit text-white"></i></button>
                                        <button class="btn btn-sm bg-[#140922] hover:bg-pink-600" wire:click='deleteCoupon({{ $coupon->id }})'><i class="fas fa-trash text-white"></i></button>
                                        @else
                                        <a href="{{ route('admin.coupon_detail',['id'=>$coupon->id]) }}" class="btn btn-sm bg-[#140922] hover:bg-green-600 text-white flex justify-evenly"><i class="fas fa-eye text-white"></i> Detail Info</a>
                                        @endif
                                        
                                        
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <div>
                                        <img src="{{ asset('assets/imgs/no-record.jpeg') }}" class="img-thumbnail"
                                            alt="">
                                    </div>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $coupons->links() }}
                    </div>
                </div>
            </div>
            @endif
        </div>


    </div>
</div>