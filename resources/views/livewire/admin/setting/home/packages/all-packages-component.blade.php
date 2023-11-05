<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>All Packages</h5>
                <div class="list-btn">
                    <ul>
                    
                        <li>
                            <a href="{{ route('admin.add_package') }}" class="btn btn-sm bg-black"><span class="fas fa-plus text-white"></span> <i class="fas fa-gift text-white"></i></a>
                        </li>
                        
                        <li>
                            <select name="status" id="status" class="form-control" wire:model.live='status'>
                                <option value="0">InActive</option>
                                <option value="1" selected>Default Sorting Active</option>
                                
                            </select>
                        </li>
                        <li>
                            <select name="sort" id="sort" class="form-control" wire:model.live='sort'>
                                <option value="asc" selected>Default Sorting Old</option>
                                <option value="desc">New</option>
                            </select>
                        </li>
                        <li>
                            <select name="perPage" id="perPage" class="form-control" wire:model.live='perPage'>
                                <option value="5" selected>Default Page size 5 Items</option>
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
                                <th>Package</th>
                                <th>Descriptione</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($packages as $package)
                            <tr>
                                <td>{{ $package->id }}</td>
                               
                                    <td>
                                        
                                        <div>
                                            <p><span>{{ Str::limit($package->name,30,'...') }}</span></p>
                                        </div>
                                        
                                    </td>
                                
                                <td> 
                                    <span>{!! $package->description !!}</span>
                                    
                                </td>
                                <td>{{ $package->price }}</td>
                                <td>
                                    @if($package->status == 1)
                                    <span class="btn btn-sm bg-black text-white" wire:click='updateStatus({{ $package->id }},0)' style='text-transform:capitalize;'>Active</span>
                                    @else
                                    <span class="btn btn-sm bg-black text-white" wire:click='updateStatus({{ $package->id }},1)' style='text-transform:capitalize;'>InActive</span>
                                    @endif
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($package->created_at)->isoFormat('MMM Do YYYY') }}
                                </td>
                                <td>
                                    <div>
                                        <a  href="{{ route('admin.edit_package',['id'=>$package->id]) }}" class="btn btn-sm bg-black text-white"><i class="fas fa-edit text-white"></i></a>
                                        <a  class="btn btn-sm bg-black"><i class="fas fa-trash text-white"></i></a>
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
                    {{ $packages->links() }}
                  </div>
                </div>
            </div>


        </div>


    </div>
</div>