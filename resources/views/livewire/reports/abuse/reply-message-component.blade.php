<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>Reply</h5>
                <div class="list-btn">
                    <ul>
                        {{-- <li>
                            <a class="btn btn-primary text-dark" href="{{ route('admin.deleted_services') }}"><i
                                    class="fas fa-trash"></i> Deleted Services</a>
                        </li> --}}
                        {{-- <li>
                            <a class="btn-filters" href="localization.html"><i class="fe fe-settings"></i> </a>
                        </li>
                        <li>
                            <div class="filter-sorting">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);" class="filter-sets"><img
                                                src="assets/img/icons/filter1.svg" class="me-2" alt="img">Filter</a>
                                    </li>
                                    <li>
                                        <span><img src="assets/img/icons/sort.svg" class="me-2" alt="img"></span>
                                        <div class="review-sort">
                                            <select class="select">
                                                <option>A -> Z</option>
                                                <option>Z -> A</option>
                                            </select>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a class="btn btn-primary" href="add-service.html"><i class="fa fa-plus me-2"></i>Add
                                Services </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <form wire:submit.prevent='sendMail'>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject" class="label-control">Subject</label>
                                    <input type="text" name="subject" id="subject" class="form-control rounded-lg border-gray-300" wire:model='subject'>
                                    @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                        
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="to" class="label-control">To</label>
                                    <input type="text" name="to" id="to" class="form-control rounded-lg border-gray-300" readonly wire:model='to'>
                                    @error('to')
                                    <span class="text-danger">{{ $message }}</span>
                                        
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                             <div class="form-group">
                                <label for="message" class="labelcontrol">Message</label>
                                <textarea name="message" id="message" cols="30" rows="10" wire:model='message' class="form-control rounded-lg border-gray-600" placeholder="write your reply here..."></textarea>
                             </div>
                            </div>
                            <div class="col-md-12 flex justify-end">
                                <button type="submit" class="btn btn-sm bg-[#140922] text-indigo-600 hover:bg-orange-600 hover:text-green-500">Send <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>


    </div>
</div>