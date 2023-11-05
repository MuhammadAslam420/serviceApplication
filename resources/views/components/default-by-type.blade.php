<div class="filter-content">
    <h2>Sort By Service Type</h2>
    <div class="filter-checkbox" >
        <select name="service_type_id" id="service_type_id" class="form-control" wire:model.live='service_type_id'>
            <option value="">Select Service Type</option>
            @foreach($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
</div>