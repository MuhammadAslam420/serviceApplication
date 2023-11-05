<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>All Categories</h5>
                <div class="list-btn">
                    <ul>
                        <li>
                            <a class="btn btn-primary text-center text-light" href="{{ route('admin.add_category') }}"><i class="fas fa-plus text-cyan-800"></i> AddCategory</a>
                        </li>
                        <li>
                            <a class="btn btn-primary text-center text-light" href="{{ route('admin.deleted_categories') }}"><i class="fas fa-trash text-pink-300"></i>Deleted Categories</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <livewire:category-table />
                 

                </div>
            </div>


        </div>


    </div>