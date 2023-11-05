<?php

namespace App\Livewire;

use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
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

final class CategoryTable extends PowerGridComponent
{
    use WithExport;
    use LivewireAlert;

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
        return Category::query()->with('subcategories')->where('deleted_at',null);
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('logo',function (Category $model) {
                $imageUrl = asset("assets/imgs/category/{$model->logo}");
                return "
            <div>
            <p>
            <img src='$imageUrl' alt='Categoery logo'  class='inline-block h-12 w-12 rounded-full ring-2 ring-black border-2 border-pg-secondary-950'>
            </p>
            </div>
            ";
            })
            ->addColumn('slug')
            ->addColumn('status')
            ->addColumn('subCategories',fn(Category $model)=>$model->subcategories->count())
            ->addColumn('created_at_formatted', fn (Category $model) => Carbon::parse($model->created_at)->isoFormat('MMM Do YYYY'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')->searchable()->sortable(),
            Column::make('Logo','logo'),
            Column::add()->title('Category')->field('name')->editOnClick()->searchable()->sortable(),
            Column::make('Slug','slug'),
            Column::add()->title('Status')->field('status')->editOnClick()->searchable()->sortable(),
            Column::make('SubCategories','subCategories'),
            Column::make('Created at', 'created_at_formatted', 'created_at')->searchable()->sortable(),
            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            // Filter::datetimepicker('created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        // $this->js('alert('.$rowId.')');
        redirect()->route('admin.edit_category',['id'=>$rowId]);
    }
    #[\Livewire\Attributes\On('deleteCategory')]
    public function deleteCategory($id)
    {
        $category = Category::find($id);
        //$this->js('alert(' . $category->title . ')');
        $category->delete();
        $this->alert('success', 'Category has been deleted');
    }
    
    public function onUpdatedEditable(string | int $id, string $field, string $value): void
    {
        $category = Category::query()->find($id);

        // Check if the field being updated is 'title'
        if ($field === 'name') {
            $category->name = $value;
            // Update the 'slug' based on the new 'title'
            $slug = Str::slug($value, '-');
            $category->slug = $slug;
        } else {
            // For other fields, update as usual
            $category->$field = $value;
        }
        $category->save();
        $this->alert('success', 'Category has been updated');
    }

    public function actions(\App\Models\Category $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('btn btn-primary text-dark dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id]),
            Button::add('deleteCategory')
                  ->slot('Delete')
                  ->id()
                  ->class('btn btn-danger text-dark')
                  ->dispatch('deleteCategory',['id'=>$row->id]),
            
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
