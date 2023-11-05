<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>All Categories</h5>
                <div class="list-btn">
                    <ul>
                        <li>
                            <input type="search" name="search" id="search" wire:model.live='search'
                                placeholder="search by comment or rating..."
                                class="form-control rounded-lg border border-light">
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
                                    <th>Comment</th>
                                    <th>Rating</th>
                                    <th>Customer</th>
                                    <th>Provider</th>
                                    <th>Service</th>
                                    <th>Comment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reviews as $review)
                                <tr>
                                    <td>{{ $review->id }}</td>
                                    <td>{!! Str::limit($review->comments, 50, '...') !!}</td>
                                    <td>{{ $review->rating }}</td>
                                    <td>{{ $review->user->name }}</td>
                                    <td>{{ $review->service->user->name }}</td>
                                    <td>{{ $review->service->title }}</td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($review->created_at)->isoFormat('MMM Do YYYY') }}
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
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>


        </div>


    </div>
</div>