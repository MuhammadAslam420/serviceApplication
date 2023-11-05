<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>All Bookings</h5>
                <div class="list-btn">
                    <ul>
                        <li>
                            <a class="btn btn-primary text-light" href="{{ route('admin.bookings') }}"><i class="fas fa-check"></i> All Active Bookings</a>
                        </li>
                       
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <livewire:booking-delete-table />
                </div>
            </div>


        </div>


    </div>