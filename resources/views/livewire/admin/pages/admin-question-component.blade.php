<div>
    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>Home Header Menu All Pages</h5>
                <div class="list-btn">
                    <ul>
                        <li>
                            <input type="search" name="search" id="search" class="form-control border-light rounded-lg"
                                placeholder="search page name here..." wire:model.live='search'>
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
                                                <option value="asc">A -> Z</option>
                                                <option value="desc">Z -> A</option>
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
                                    <th>Question</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach ($questions as $question)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        <a href="javascript:void(0);" class="table-profileimage">
                                            <span>{{ $question->question }}</span>
                                        </a>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($question->created_at)->format('jS M Y') }}
                                    </td>
                                    <td>
                                        <button wire:click="openModel({{ $question->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-1 rounded">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-1 rounded"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($isOpen)

                       <x-question-modal />
        
                          @endif
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>