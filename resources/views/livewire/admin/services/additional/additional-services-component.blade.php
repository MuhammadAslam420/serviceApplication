<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>All Categories</h5>
                <div class="list-btn">
                    <ul>
                    
                        <li>
                           <input type="search" name="search" id="search" wire:model.live='search' placeholder="search Service here..." class="form-control rounded-lg border border-light">
                        </li>
                        <li>
                            <input type="search" name="searchAdd" id="searchAdd" wire:model.live='searchAdd' placeholder="search Additional Service..." class="form-control rounded-lg border border-light">
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
                                <th>Service</th>
                                <th>Additional Service</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($additional_services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                               
                                    <td>
                                        
                                        <span>{{ Str::limit($service->service->title,15,'...') }}</span>
                                        
                                    </td>
                                
                                <td> 
                                    <span>{{ $service->name }}</span>
                                    
                                </td>
                                <td>{{ Str::limit($service->description,20,'...') }}</td>
                                <td>{{ $service->price }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($service->created_at)->isoFormat('MMM Do YYYY') }}
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
                    {{ $additional_services->links() }}
                  </div>
                </div>
            </div>


        </div>


    </div>
</div>