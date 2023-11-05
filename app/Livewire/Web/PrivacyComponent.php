<?php

namespace App\Livewire\Web;

use App\Models\Page;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PrivacyComponent extends Component
{
    #[Layout('layouts.base')]
    public function render()
    {
        try{
            $privacy = Page::where('name','privacy')->firstorFail();
        return view('livewire.web.privacy-component',['privacy'=>$privacy]);
        }
        catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
}
