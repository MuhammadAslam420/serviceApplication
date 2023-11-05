<?php

namespace App\Livewire;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
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

final class BookingTable extends PowerGridComponent
{
    use WithExport;
    use LivewireAlert;
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput()
                ->showToggleColumns(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Booking::query()->with(['bookingItems', 'transaction']);
    }

    public function relationSearch(): array
    {
        return [
            'user' => [
                'name', 'mobile', 'email',
            ],
            'transaction' => [
                'payment_mode',
                'status',
            ],

        ];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('user_id', function (Booking $model) {
                $user = $model->user->name;
                $mobile = $model->mobile;
                $email = $model->email;
                $imageUrl = asset("assets/imgs/{$model->user->profile_photo_path}");
                return "
                <div>
                <p><img src='{$imageUrl}' alt='Service Image'  class='inline-block h-12 w-12 rounded-full ring-2 ring-white'></p>
                <p><span>$user</span></p>
                <p>Booking Contact : <span>$mobile</span></p>
                <p>Booking email : <span>$email</span></p>
                </div>
                ";

            })
            ->addColumn('bookingstatus', function (Booking $model) {
                $status = $model->bookingstatus;
                if ($status === 'pending') {
                    return "<span class='badge badge-info' style='text-transform: capitalize;'>$status</span>";
                } elseif ($status === 'confirmed') {
                    return "<span class='badge badge-primary' style='text-transform: capitalize;'>$status</span>";
                } elseif ($status === 'completed') {
                    return "<span class='badge badge-success' style='text-transform: capitalize;'>$status</span>";
                } else {
                    return "<span class='badge badge-danger' style='text-transform: capitalize;'>$status</span>";
                }
            })
            ->addColumn('services', function (Booking $model) {
                $servicesHtml = ''; // Initialize an empty string

                foreach ($model->bookingItems as $item) {
                    // Append each service to the string
                    $servicesHtml .= "
                        <div>
                            <span class='badge badge-primary' style='font-size:14px;'>{$item->service->title}</span>
                        </div>
                    ";
                }

                // Return the concatenated HTML string
                return $servicesHtml;
            })
            ->addColumn('payment_mode', function (Booking $model) {
                $transaction = optional($model->transaction);

                if ($transaction) {
                    $mode = $transaction->payment_mode;
                } else {
                    $mode = 'N/A';
                }

                return "
                    <div>
                        <span class='badge bg-teal-700' style='font-size:16px;text-transform:capitalize;'>
                            $mode
                        </span>
                    </div>";
            })
            ->addColumn('payment_status', function (Booking $model) {
                $transaction = optional($model->transaction);

                if ($transaction) {
                    $mode = $transaction->status;
                } else {
                    $mode = 'N/A';
                }

                return "
                    <div>
                        <span class='badge bg-teal-700' style='font-size:16px;text-transform:capitalize;'>
                            $mode
                        </span>
                    </div>";
            })
            ->addColumn('total')
            ->addColumn('subtotal')
            ->addColumn('tax')
            ->addColumn('discount')
            ->addColumn('bokking_date')
            ->addColumn('booking_time')
            ->addColumn('created_at_formatted', fn(Booking $model) => Carbon::parse($model->created_at)->isoFormat('MMM Do YYY'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->searchable()->sortable(),
            Column::make('Customer', 'user_id')->searchable()->sortable(),
            Column::make('Status', 'bookingstatus')->searchable()->sortable(),
            Column::make('Services Booked', 'services')->searchable(),
            Column::make('Payment Mode', 'payment_mode')->searchable(),
            Column::make('Payment Status', 'payment_status'),
            Column::make('Total', 'total')->searchable()->sortable(),
            Column::make('SubTotal', 'subtotal')->sortable(),
            Column::make('Tax', 'tax')->sortable(),
            Column::make('Discount', 'discount')->sortable(),
            Column::make('Date', 'booking_date')->sortable(),
            Column::make('Time', 'booking_time')->sortable(),
            Column::make('Created At', 'created_at_formatted')->searchable()->sortable(),
            Column::action('Action'),
        ];
    }

    public function filters(): array
    {
        return [

            Filter::number('total', 'total')
                ->thousands('.')
                ->decimal(','),

            Filter::number('discount', 'discount')
                ->thousands('.')
                ->decimal(','),
            Filter::Select('bookingstatus')
                ->optionValue('bookingstatus')
                ->optionLabel('bookingstatus')
                ->dataSource([
                    ['bookingstatus' => 'pending'],
                    ['bookingstatus' => 'confirmed'],
                    ['bookingstatus' => 'completed'],
                    ['bookingstatus' => 'cancelled'],
                ]),

        ];
    }
    public function header(): array
    {
        return [
            Button::add('bulk-delete')
                ->slot('Bulk delete')
                ->class('btn btn-danger rounded  ')
                ->dispatch('bulkDelete', []),
        ];
    }
    #[\Livewire\Attributes\On('detail')]
    public function detail($rowId): void
    {
        // $this->js('alert(' . $rowId . ')');
        redirect()->route('admin.booking_detail', ['id' => $rowId]);
    }

    public function actions(\App\Models\Booking $row): array
    {
        return [
            Button::add('detail')
                ->slot('Detail')
                ->id()
                ->class('btn btn-primary hover:btn-success text-light')
                ->dispatch('detail', ['rowId' => $row->id]),
        ];
    }
    #[\Livewire\Attributes\On('bulkDelete')]
    public function bulkDelete(): void
    {
        $bookings = Booking::whereIn('id', $this->checkboxValues)->get();

        foreach ($bookings as $booking) {
            $booking->delete();
        }

        $this->alert('success', 'Bookings have been deleted');
    }

    /*
public function actionRules($row): array
{
return [
// Hide button detail for ID 1
Rule::button('edit')
->when(fn($row) => $row->id === 1)
->hide(),
];
}
 */
}
