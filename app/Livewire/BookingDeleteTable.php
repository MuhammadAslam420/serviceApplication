<?php

namespace App\Livewire;

use App\Models\Booking;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
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

final class BookingDeleteTable extends PowerGridComponent
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
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Booking::query()->withTrashed()->whereNotNull('deleted_at');
    }

    public function relationSearch(): array
    {
        return [
            'user'=>[
                'name'
            ]
        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('customer',fn(Booking $model)=>$model->user->name)
            ->addColumn('total')
            ->addColumn('bookingstatus')
            ->addColumn('deleted_at')
            ->addColumn('created_at_formatted', fn (Booking $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Customer', 'customer')->searchable()->sortable(),
            Column::make('Grand Total','total')->searchable()->sortable(),
            Column::make('Status','bookingstatus')->searchable()->sortable(),
            Column::make('Deleted Date', 'deleted_at')->searchable()->sortable(),
            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

             Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            // Filter::datetimepicker('created_at'),
        ];
    }

    public function header():array
    {
        return [
            Button::add('bulk-live')
                ->slot('Bulk Live')
                ->class('btn  bg-dark-200 text-gray-700 border border-gray-300 rounded  ')
                ->dispatch('bulkLive', []),
        ];
    }
    #[\Livewire\Attributes\On('bulkLive')]
    public function bulkLive(): void
    {
        $bookings = Booking::withTrashed()->whereIn('id', $this->checkboxValues)->get();
    
        foreach ($bookings as $booking) {
            $booking->restore(); // Use the restore method to undelete the record
        }
    
        $this->alert('success', 'Bookings have been Live');
    }
    

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(\App\Models\Booking $row): array
    {
        return [
            // Button::add('edit')
            //     ->slot('Edit: '.$row->id)
            //     ->id()
            //     ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
            //     ->dispatch('edit', ['rowId' => $row->id])
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
