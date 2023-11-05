<div>
    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>Blogs</h5>
                <div class="list-btn">
                    <ul>
                        <li>
                            <a href="{{ route('admin.add_blog') }}" class="btn btn-sm bg-black"><i class="fas fa-plus text-white"></i><span class="fas fa-blog text-white ml-1"></span></a>
                        </li>
                        <li>
                            <div class="filter-sorting">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);" class="filter-sets"><img
                                                src="{{ asset('assets/imgs/filter1.svg') }}" class="me-2"
                                                alt="img">Filter</a>
                                    </li>
                                    <li>
                                        <span><img src="{{ asset('assets/imgs/sort.svg') }}" class="me-2"
                                                alt="img"></span>
                                        <div class="review-sort">
                                            <select class="form-control border-none bg-white" wire:model.live='sorting' id='sorting'>
                                                <option value="default">Default Sorting</option>
                                                <option value="asc">New</option>
                                                <option value="desc">Old</option>
                                            </select>
                                        </div>
                                        <div class="review-sort mr-2">
                                            <select class="form-control border-none bg-white" id="perPage" wire:model.live='perPage'>
                                                <option value="6">Default 8 Records</option>
                                                <option value="10">10</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        {{-- <li>
                            <a class="btn btn-primary" href="add-payout.html"><i class="fa fa-plus me-2"></i>Add
                                Payout</a>
                        </li> --}}
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-12 ">
                    <div class="table-resposnive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>SubTitle</th>
                                    <th>Status</th>
                                    <th>Description</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="table-profileimage">
                                            <span>{{ Str::limit($blog->title,20,'...') }}</span>
                                        </a>
                                    </td>
                                    <td>{{ Str::limit($blog->subtitle,12,'...') }}</td>
                                    <td>
                                        @if($blog->status  === 'published')
                                        <span class="btn btn-sm bg-black text-white" style="text-transform: capitalize;" wire:click='updateStatus({{ $blog->id }},"drafted")'>{{ $blog->status }}</span>
                                        @else
                                        <span class="btn btn-sm bg-black text-white" style="text-transform: capitalize;" wire:click='updateStatus({{ $blog->id }},"published")'>{{ $blog->status }}</span>
                                        @endif
                                    </td>
                                    <td>{!! Str::limit($blog->description,20,'...') !!}</td>
                                    <td>{{ \Carbon\Carbon::parse($blog->created_at)->format('jS M Y') }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.edit_blog',['id'=>$blog->id]) }}" class="btn btn-sm bg-black hover:bg-green-600">
                                            <i class="fas fa-edit text-white"></i>
                                        </a>
                                        <button class="btn btn-sm bg-black hover:bg-pink-600" wire:click='blogDel({{ $blog->id }})'><i class="fas fa-trash text-white"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                     
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>