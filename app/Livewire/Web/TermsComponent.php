<?php

namespace App\Livewire\Web;

use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Component;

class TermsComponent extends Component
{
    #[Layout('layouts.base')]
    public function render()
    {
        try{
            $term = Page::where('name','term')->firstorFail();
                return view('livewire.web.terms-component',['term'=>$term]);
        }
        catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
}
