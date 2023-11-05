<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>contact Messages</h5>
                <div class="list-btn">
                    <ul>
                        {{-- <li>
                            <a class="btn btn-primary text-center text-light"
                                href="{{ route('admin.add_subcategory') }}"><i class="fas fa-tag text-cyan-800"></i>Add
                                SubCategory</a>
                        </li>
                        <li>
                            <a class="btn btn-primary text-center text-light"
                                href="{{ route('admin.deleted_subcategories') }}"><i
                                    class="fas fa-trash text-pink-800"></i> Deleted SubCategories</a>
                        </li> --}}
                        <li>
                            <input type="search" name="search" id="search" wire:model.live='search'
                                placeholder="search name email or phone..."
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
                                    <th>Sender</th>
                                    <th>Email</th>
                                    <th>Contact</th>
                                    <th>Message</th>
                                    <th>Replied</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($messages as $message)
                                <tr>
                                    <td>{{ $message->id }}</td>

                                    <td>

                                        <span>{{ $message->name }}</span>

                                    </td>

                                    <td>
                                        <span>{{ $message->email }}</span>

                                    </td>
                                    <td>{{ $message->phone }}</td>
                                    <td>{!! $message->message !!}</td>
                                    <td>
                                        <span
                                            class="{{ isset($message) && isset($message->reply) && $message->reply === 'replied' ? 'badge bg-[#140922] text-white p-1 text-[22px] font-extrabold' : 'text-red-600' }}"
                                            style="text-transform: capitalize;">{{ isset($message) &&
                                            isset($message->reply) ? $message->reply : 'N/A' }}</span>
                                    </td>
                                    <td>

                                        {{ \Carbon\Carbon::parse($message->created_at)->isoFormat('MMM Do YYYY') }}
                                    </td>
                                    <td>
                                        @if($message->reply != 'replied')
                                        <button wire:click="openModal({{ $message->id }})"
                                            class="btn btn-sm bg-[#140922] hover:bg-blue-700 text-white font-bold rounded">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                        @endif
                                         <button class="btn btn-sm bg-red-700"
                                            wire:click='deleteMessage("{{ $message->id }}")'><i
                                                class="fas fa-trash"></i></button>
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
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>


        </div>

        @if($isOpenModal)
        <div class="fixed z-10 inset-0 overflow-y-auto ease-out justify-center">

            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">



                <div class="fixed inset-0 transition-opacity">

                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>

                </div>



                <!-- This element is to trick the browser into centering the modal contents. -->

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​



                <div class="inline-block align-middle bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                    role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                    <form wire:submit.prevent="replied">

                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">

                            <div class="">

                                <div class="mb-4">

                                    <label for="exampleFormControlInput1"
                                        class="block text-gray-700 text-sm font-bold mb-2">Reply Message:</label>

                                    <textarea type="text"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="exampleFormControlInput1" placeholder="Enter replyText"
                                        wire:model="replyText"></textarea>

                                    @error('replyText') <span class="text-red-500">{{ $message }}</span>@enderror

                                </div>


                            </div>

                        </div>



                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

                                <button type="submit"
                                    class="btn btn-success text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                                    Save

                                </button>

                            </span>

                            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">



                                <button wire:click="closedModal()" type="button"
                                    class="btn btn-danger text-base leading-6 font-medium text-white shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">

                                    Cancel

                                </button>

                            </span>

                    </form>

                </div>



            </div>

        </div>
        @endif
    </div>
    
</div>
