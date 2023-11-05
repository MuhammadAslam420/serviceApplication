<div class="filter-content">
    <h2>Sort By Categories</h2>
    <div class="filter-checkbox" >
        <select name="category_id" id="category_id" class="form-control" wire:model.live='category_id'>
            <option value="">Select Category</option>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
</div>