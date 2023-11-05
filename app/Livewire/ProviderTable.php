<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class ProviderTable extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        //$this->showCheckBox();

        return [
            // Exportable::make('export')
            //     ->striped()
            //     ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput()
            ->showToggleColumns(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return User::query()->with(['services','bookingItems'])->where('utype','VEN');
    }

    public function relationSearch(): array
    {
        return [
            // 'services'=>[
            //     'title'
            // ],
            // 'bookingItems'=>[
            //     'id','booking_id','status','total'
            // ]
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('name')

           /** Example of custom column using a closure **/
            ->addColumn('name_lower', fn (User $model) => strtolower(e($model->name)))

            ->addColumn('username')
            ->addColumn('email')
            ->addColumn('mobile')
            ->addColumn('utype')
            ->addColumn('services', function (User $model) {
                $approved = $model->services->count();
                return "<span class='badge badge-dark' style='text-transform: capitalize;'>$approved</span>";
            })
            ->addColumn('sales', function (User $model) {
                $approved = $model->bookingItems->count();
                return "<span class='badge badge-dark' style='text-transform: capitalize;'>$approved</span>";
            })
            ->addColumn('whatsapp')
            ->addColumn('insta')
            ->addColumn('fb')
            ->addColumn('snapchat')
            ->addColumn('address')
            ->addColumn('city')
            ->addColumn('country')
            ->addColumn('profile_photo_path', function (User $model){
                $image = asset('assets/imgs/'.$model->profile_photo_path);
                return "<span><img src='{$image}'class='h-12 w-12 rounded-full ring-2 ring-white' style='width:45px;'></span>";
             })
            ->addColumn('online_status')
            ->addColumn('admin_approved')
            ->addColumn('created_at_formatted', fn (User $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Username', 'username')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Mobile', 'mobile')
                ->sortable()
                ->searchable(),

            Column::make('Utype', 'utype')
                ->sortable()
                ->searchable(),
                Column::make('Services', 'services')
                ->sortable()
                    ->searchable(),
                Column::make('Sales Services', 'sales')
                ->sortable()
                ->searchable(),

            Column::make('Whatsapp', 'whatsapp')
                ->sortable()
                ->searchable(),

            Column::make('Insta', 'insta')
                ->sortable()
                ->searchable(),

            Column::make('Fb', 'fb')
                ->sortable()
                ->searchable(),

            Column::make('Snapchat', 'snapchat')
                ->sortable()
                ->searchable(),

            Column::make('Address', 'address')
                ->sortable()
                ->searchable(),

            Column::make('City', 'city')
                ->sortable()
                ->searchable(),

            Column::make('Country', 'country')
                ->sortable()
                ->searchable(),

            Column::make('Profile photo path', 'profile_photo_path')
                ->sortable()
                ->searchable(),

            Column::make('Online status', 'online_status')
                ->toggleable(),

            Column::make('Admin approved', 'admin_approved')
                ->toggleable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('name')->operators(['contains']),
            Filter::inputText('username')->operators(['contains']),
            Filter::inputText('email')->operators(['contains']),
            Filter::inputText('mobile')->operators(['contains']),
            Filter::inputText('utype')->operators(['contains']),
            Filter::inputText('whatsapp')->operators(['contains']),
            Filter::inputText('insta')->operators(['contains']),
            Filter::inputText('fb')->operators(['contains']),
            Filter::inputText('snapchat')->operators(['contains']),
            Filter::inputText('address')->operators(['contains']),
            Filter::inputText('city')->operators(['contains']),
            Filter::inputText('country')->operators(['contains']),
            Filter::inputText('profile_photo_path')->operators(['contains']),
            Filter::boolean('online_status'),
            Filter::boolean('admin_approved'),
            Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        //$this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\User $row): array
    {
        return [
            Button::add('edit')
                ->slot('<i class="fas fa-edit text-indigo-500"></i>')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
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
