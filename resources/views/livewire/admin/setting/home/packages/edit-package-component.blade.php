<div>
    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>Editing {{ $name }} Package</h5>
                <div class="list-btn">
                    <ul>

                        <li>
                            <a href="{{ route('admin.all_packages') }}" class="btn btn-sm bg-black"><i
                                    class="fas fa-gift text-white"></i></a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="card p-2">
                    <form wire:submit.prevent='updatePackage' >
                        <div class="form-group">
                            <x-label value="{{__('Title')  }}" />
                            <x-input type='text' name='name' wire:model='name' class="block mt-1 w-full" />
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group" wire:ignore>
                            <x-label value="{{__('Description')  }}" />
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" wire:model='description'>{{ $description }}</textarea>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <x-label value="{{__('Status')  }}" />
                            <select name="status" id="status" wire:model='status' class="form-control">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">InActive</option>
                            </select>
                            @error('status')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <x-label value="{{__('Price')  }}" />
                            <x-input type='text' name='price' wire:model='price' class="block mt-1 w-full" />
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <x-button class="ml-4">
                                {{ __('Update Package') }}
                            </x-button>
                        </div>
                    </form>
                </div>

            </div>


        </div>


    </div>
</div>
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
    .create( document.querySelector( '#description' ), {
        ckfinder: {
            options: {
                skin: 'moono-lisa',
                backgroundColor: 'rgb(0,0,0)'
            }
        }
    } )
    .then( editor => {
        editor.model.document.on('change:data', (e) => {
            @this.set('description', editor.getData());
        });
    })
    .catch( error => {
        console.error( error );
    });
</script>
@endpush