<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>All Categories</h5>
                <div class="list-btn">
                    <ul>
                        <li>
                            <a class="btn btn-primary text-center text-light" href="{{ route('admin.services') }}"><i class="fas fa-tag text-cyan-800"></i>All Active Services</a>
                        </li>
                        <li>
                           <input type="search" name="search" id="search" wire:model.live='search' placeholder="search  y name or slug..." class="form-control rounded-lg border border-light">
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
                                <th>Provider</th>
                                <th>SubCategory</th>
                                <th>Deleted At</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>
                                    <div>
                                        <p><img src="{{ asset('assets/imgs/services/default') }}/{{ $service->image }}" width="120" class="img-thumbnail" alt="{{ $service->slug }}"></p>
                                        <p><span>{{ $service->title }}</span></p>
                                    </div>
                                </td>
                                <td>{{ Str::ucfirst($service->user->name) }}</td>
                                <td>{{ Str::ucfirst($service->subcat->name) }}</td>
                                <td>{{ \Carbon\Carbon::parse($service->deleted_at)->isoFormat('MMM Do YYYY') }}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($service->created_at)->isoFormat('MMM Do YYYY') }}
                                </td>
                                <td>
                                    <button class="btn bg-red-700" wire:click='makeLive({{ $service->id }})'><i class="far fa-calendar-check"></i> Live</button>
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
                    {{ $services->links() }}
                  </div>
                </div>
            </div>


        </div>


    </div>