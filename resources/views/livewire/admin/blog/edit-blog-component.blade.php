<div>

    <div class="page-wrapper page-settings">
        <div class="content">
            <div class="content-page-header content-page-headersplit">
                <h5>Edit Blog</h5>
                <div class="list-btn">
                    <ul>
                        <li>
                            <a class="btn btn-sm text-center bg-black text-white" href="{{ route('admin.blogs') }}"><i
                                    class="fas fa-blog text-white"></i>All Blogs</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 ">
                    <form wire:submit.prevent='addBlog' enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title" class="label-control">Blog Title</label>
                                    <x-input type="text" name="title" id="title" class="form-control "
                                        wire:model='title'  />
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subtitle" class="label-control">Blog SubTitle</label>
                                    <x-input type="text" name="subtitle" id="subtitle" class="form-control"
                                        wire:model='subtitle' />
                                    @error('subtitle')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status" class="label-control">Blog Status</label>
                                    <select name="status" id="status" class="form-control" wire:model='status'>
                                        <option value="" selected>Select Status</option>
                                        <option value="drefted">Drafted</option>
                                        <option value="published">Published</option>
                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="new_image" class="label-control">Blog Image</label>
                                    <input type="file" name="new_image" id="new_image" class="form-control rounded-lg"
                                        wire:model='new_image'>
                                    @error('new_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="file-preview">
                                    <ul>

                                        @if($new_image)

                                        <li>
                                            <div class="img-preview">
                                                <img src="{{$new_image->temporaryurl()}}" alt="Service Image">
                                            </div>
                                        </li>
                                        @elseif ($image)
                                        <li>
                                            <div class="img-preview">
                                                <img src="{{asset('assets/imgs/blog')}}/{{ $image }}" alt="Service Image">
                                            </div>
                                        </li>
                                        @else
                                        <li>
                                            <div class="img-preview">
                                                <img src="{{ asset('assets/imgs/services/default/service-01.jpg') }}"
                                                    alt="Service Image">

                                            </div>
                                        </li>
                                        @endif

                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group" wire:ignore>
                                    <label for="description" class="label-control">Blog Detail Description</label>
                                    <textarea name="description" id="description" 
                                        class="form-control" wire:nodel='description'>{{ $description }}</textarea>

                                    @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="flex justify-end">
                                    <button type="submit" class="btn btn-sm bg-black text-white">Edit Blog</button>
                                </div>
                            </div>
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