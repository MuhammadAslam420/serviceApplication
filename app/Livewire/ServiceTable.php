<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Country;
use App\Models\Service;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Components\Filters\Builders\Select;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class ServiceTable extends PowerGridComponent
{
    use WithExport;
    use LivewireAlert;

    public function setUp(): array
    {
         $this->showCheckBox();

        return [
            // Exportable::make('export')
            //     ->striped()
            //     ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()
                ->showSearchInput()
                ->showToggleColumns(),

            Footer::make()
                ->showPerPage(10)
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Service::query()->with(['cat', 'subcat', 'country', 'user','additionals','availabilties','serviceType'])->where('deleted_at', null);
    }

    public function relationSearch(): array
    {
        return [
            'country'=>[
                'name'
            ],
            'cat'=>[
                'name'
            ],
            'user'=>[
                'name'
            ],
            'subcat'=>[
                'name'
            ],
            'additionals'=>[
                'name'
            ],
            'availabilties'=>[
                'day'
            ],
            'serviceType'=>[
                'name'
            ]
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('image', function (Service $model) {
                // Assuming you have an 'image_url' attribute in your Service model
                $imageUrl = asset("assets/imgs/services/default/{$model->image}"); // Change this to the actual attribute name
                return "
            <div>

            <p>

            <img src='{$imageUrl}' alt='Service Image'  class='inline-block h-12 w-12 rounded-full ring-2 ring-white'>

            </p>
            <p><span>{$model->user->name}</span></p>
            <p><span>{$model->title}</span></p>
            </div>
            ";
            })
            ->addColumn('status', function (Service $model) {
                $status = $model->status;
                $statusClass = $status === 'active' ? 'badge badge-success' : 'badge badge-danger';
                return "<span class='$statusClass' style='text-transform: capitalize;'>$status</span>";
            })
            ->addColumn('featured')
            ->addColumn('approved', function (Service $model) {
                $approved = $model->approved;
                $approvedClass = $approved === 'yes' ? 'badge badge-success' : 'badge badge-danger';
                return "<span class='$approvedClass' style='text-transform: capitalize;'>$approved</span>";
            })
            ->addColumn('additionalservices', function (Service $model) {
                $serviceNames = [];
            
                foreach ($model->additionals as $add) {
                    $name = $add->name;
                    $serviceNames[] = "<span class='badge badge-success' style='text-transform: capitalize;font-size:13px;'>$name</span>";
                }
            
                return implode(', ', $serviceNames); // Use a comma (or any separator) to join the service names
            })
            ->addColumn('days', function (Service $model) {
                $serviceDays = [];
            
                foreach ($model->availabilties as $avail) {
                    $day = $avail->day;
                    $serviceDays[] = "<span class='badge badge-success' style='text-transform: capitalize;font-size:13px;'>$day</span>";
                }
            
                return implode(', ', $serviceDays); // Use a comma (or any separator) to join the service names
            })
            
            ->addColumn('Title')
            ->addColumn('slug')
            ->addColumn('price')
            ->addColumn('discount')
            ->addColumn('category_id', fn(Service $model) => $model->cat->name)
            ->addColumn('sub_category_id', fn(Service $model) => $model->subcat->name)
            ->addColumn('service_type_id',fn(Service $model)=>$model->serviceType->name)
            ->addColumn('position')
            ->addColumn('city')
            ->addColumn('country_id', fn(Service $model) => $model->country->name)
            ->addColumn('video_link')
            ->addColumn('address')
            ->addColumn('lat')
            ->addColumn('lng')
            ->addColumn('user_id', fn(Service $model) => $model->user->name)
            ->addColumn('created_at_formatted', fn(Service $model) => Carbon::parse($model->created_at)->isoFormat('MMM Do YYYY'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->searchable()
                ->sortable(),

            Column::make('Service', 'image'),
            Column::add()
                ->title('Title')
                ->field('title')
                ->editOnClick()->searchable()->sortable(),
            Column::make('Provider', 'user_id')->searchable()->sortable(),
            Column::add()
                ->title('Slug')
                ->field('slug')
                ->editOnClick()->searchable()->sortable(),
            Column::add()->title('Price')->field('price')->editOnClick()->searchable()->sortable(),
            Column::add()->title('Discount')->field('discount')->editOnClick()->searchable()->sortable(),
            Column::make('Status', 'status')->searchable()->sortable(),
            Column::make('Additional Services','additionalservices'),
            Column::make('Available days','days'),
            Column::make('Service Type','service_type_id'),
            Column::make('Category', 'category_id')->sortable(),
            Column::make('SubCategory', 'sub_category_id')->sortable(),
            Column::add()->title('Featured')->field('featured')->editOnClick()->searchable()->sortable(),
            Column::add()->title('position')->field('position')->editOnClick()->searchable()->sortable(),
            Column::make('City', 'city')->searchable()->sortable(),
            Column::make('Country', 'country_id')->sortable(),
            Column::make('Address', 'address')->searchable()->sortable(),
            Column::make('Latitude', 'lat')->searchable()->sortable(),
            Column::make('Langitude', 'lng')->searchable()->sortable(),
            Column::make('Youtube Link', 'video_link')->searchable()->sortable(),
            Column::make('Approved', 'approved')->searchable()->sortable(),
            Column::make('Created at', 'created_at_formatted', 'created_at')->searchable()
                ->sortable(),

            Column::action('Action'),
        ];
    }

    public function filters(): array
    {
        return [
            Filter::Select('category_id')
                ->dataSource(Category::all())
                ->optionValue('id')
                ->optionLabel('name'),
            Filter::Select('sub_category_id')
                ->dataSource(SubCategory::all())
                ->optionValue('id')
                ->optionLabel('name'),
            Filter::select('country_id')
                ->dataSource(Country::all())
                ->optionValue('id')
                ->optionLabel('name'),
            Filter::Select('position')
                ->optionValue('position')
                ->optionLabel('position')
                ->dataSource([
                    ['position' => '1'],
                    ['position' => '2'],
                    ['position' => '3'],
                    ['position' => '4'],
                    ['position' => '5'],
                    ['position' => '6'],
                    ['position' => '7'],
                    ['position' => '8'],
                    ['position' => '9'],
                    ['position' => '10'],
                    ['position' => '11'],
                    ['position' => '12'],
                ]),
            Filter::Select('featured')
                ->optionValue('featured')
                ->optionLabel('featured')
                ->dataSource([
                    ['featured' => 'top'],
                    ['featured' => 'vip'],
                    ['featured' => 'featured'],
                    ['featured' => 'non-featured'],
                ]),
            Filter::select('user_id')
                ->dataSource(User::where('utype', 'VEN')->get())
                ->optionValue('id')
                ->optionLabel('name'),
        ];
    }
    public function header(): array
    {
        return [
            Button::add('bulk-delete')
                ->slot('Bulk delete')
                ->class('btn btn-danger text-light rounded-lg')
                ->dispatch('bulkDelete', []),
        ];
    }
    #[\Livewire\Attributes\On('bulkDelete')]
    public function bulkDelete(): void
    {
        $services = Service::whereIn('id', $this->checkboxValues)->get();

        foreach ($services as $service) {
            $service->delete();
        }
        

        $this->alert('success', 'Services have been deleted');
        $this->reset();
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        //$this->js('alert('.$rowId.')');
        redirect()->route('admin.edit_service', ['id' => $rowId]);
    }
    #[\Livewire\Attributes\On('updateStatus')]
    public function updateStatus($id)
    {
        $service = Service::find($id);
        if ($service->status === 'active') {
            $service->status = 'inactive';
        } else {
            $service->status = 'active';
        }

        $service->save();
        $this->alert('success', 'Service status has been updated');
    }
    #[\Livewire\Attributes\On('updateApproved')]
    public function updateApproved($id)
    {
        $service = Service::find($id);
        if ($service->approved === 'yes') {
            $service->approved = 'no';
        } else {
            $service->approved = 'yes';
        }
        $service->save();
        $this->alert('success', 'Service Approval has been updated');
    }
    #[\Livewire\Attributes\On('deleteService')]
    public function deleteService($id)
    {
        $service = Service::find($id);
        $this->js('alert(' . $service->title . ')');
        $service->delete();
        $this->alert('success', 'Service has been deleted');
    }
    public function onUpdatedEditable(string | int $id, string $field, string $value): void
    {
        $service = Service::query()->find($id);

        // Check if the field being updated is 'title'
        if ($field === 'title') {
            $service->title = $value;
            // Update the 'slug' based on the new 'title'
            $slug = Str::slug($value, '-');
            $service->slug = $slug;
        } else {
            // For other fields, update as usual
            $service->$field = $value;
        }

        // Save the changes
        $service->save();
        $this->alert('success', 'Service hhas been updated');
    }

    public function actions(\App\Models\Service $row): array
    {

        return [

            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('btn btn-info dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id]),
            Button::add('updateStatus')
                ->slot('Update Status')
                ->id()
                ->class('btn btn-primary dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('updateStatus', ['id' => $row->id]),
            Button::add('updateApproved')
                ->slot('Update Approved')
                ->id()
                ->class('btn btn-primary dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('updateApproved', ['id' => $row->id]),
            Button::add('Delete')
                ->slot('delete')
                ->id()
                ->class('btn btn-danger dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('deleteService', ['id' => $row->id]),

        ];
    }

    /*
public function actionRules($row): array
{
return [
// Hide button edit for ID 1
Rule::button('edit')
->when(fn($row) => $row->id === 1)
->hide(),
];
}
 */
}
