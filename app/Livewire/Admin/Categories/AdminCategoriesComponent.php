<?php

namespace App\Livewire\Admin\Categories;

use Livewire\Attributes\Layout;
use Livewire\Component;

class AdminCategoriesComponent extends Component
{
    #[Layout('layouts.admin')]
    public function render()
    {
        return view('livewire.admin.categories.admin-categories-component');
    }
}
