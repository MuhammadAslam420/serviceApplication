<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>All Deleted Categories</h5>
                <div class="list-btn">
                    <ul>
                        <li>
                            <a class="btn btn-primary text-center text-light" href="{{ route('admin.categories') }}"><i class="fas fa-tag text-cyan-800"></i>All Categories</a>
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
                                <th>Category</th>
                                <th>Deleted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>
                                        <div>
                                            <p>
                                                <img src="{{ asset('assets/imgs/category') }}/{{ $category->logo }}" width="120" height="120" class="img-thmubnail" alt="">
                                            </p>
                                            <p>Name : <span>{{ $category->name }}</span></p>
                                            <p>Slug  : <span>{{ $category->slug }}</span></p>
                                        </div>
                                    </td>
                                    <td>{{ $category->deleted_at }}</td>
                                    <td> <button class="btn btn-success" wire:click='makeLive({{ $category->id }})'>Make It Live</button></td>
                                </tr>
                            @empty
                            <tr>
                                <div>
                                    <img src="{{ asset('assets/imgs/no-record.jpeg') }}" alt="">
                                </div>
                            </tr>
                                
                            @endforelse
                        </tbody>
                    </table>
                    {{ $categories->links() }}
                   </div>
                </div>
            </div>


        </div>


    </div>