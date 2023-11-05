<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>All Banners</h5>
                <div class="list-btn">
                    <ul>
                    
                        <li>
                            <a href="{{ route('admin.home_add_banners') }}" class="btn btn-sm bg-black"><span class="fas fa-plus text-white"></span> <i class="fas fa-sliders-h text-white"></i></a>
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
                                <th>Banner</th>
                                <th>SubTitle</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($banners as $banner)
                            <tr>
                                <td>{{ $banner->id }}</td>
                               
                                    <td>
                                        
                                        <div>
                                            <img src="{{ asset('assets/imgs') }}/{{ $banner->image }}" class="w-12 h-12" alt="{{ $banner->id }}">
                                            <p><span>{{ Str::limit($banner->title,30,'...') }}</span></p>
                                        </div>
                                        
                                    </td>
                                
                                <td> 
                                    <span>{{ Str::limit($banner->subtitle,30,'...') }}</span>
                                    
                                </td>
                                <td>{{ Str::limit($banner->link,40,'....') }}</td>
                                <td>
                                    @if($banner->status === 'active')
                                    <span class="btn btn-sm bg-black text-white" wire:click='updateStatus({{ $banner->id }},"inactive")' style='text-transform:capitalize;'>{{ $banner->status }}</span>
                                    @else
                                    <span class="btn btn-sm bg-black text-white" wire:click='updateStatus({{ $banner->id }},"active")' style='text-transform:capitalize;'>{{ $banner->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($banner->created_at)->isoFormat('MMM Do YYYY') }}
                                </td>
                                <td>
                                    <div>
                                        <a href="{{ route('admin.home_edit_banners',['id'=>$banner->id]) }}" class="btn btn-sm bg-black text-white"><i class="fas fa-edit text-white"></i></a>
                                        <a href="#" wire:click='deleteBan({{ $banner->id }})' class="btn btn-sm bg-black"><i class="fas fa-trash text-white"></i></a>
                                    </div>
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
                    {{ $banners->links() }}
                  </div>
                </div>
            </div>


        </div>


    </div>
</div>