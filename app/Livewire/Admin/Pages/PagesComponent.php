<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Page;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class PagesComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $search;
    public $perPage = 6;
    public $sorting = 'default';
    public $isOpen = 0;
    public $name;

    public $title;
    public $description;

    public $pageId;
    public function openModel($id)
    {
        $this->pageId =$id;
        $this->mount();
        $this->isOpen = true;
        
    }
    public function mount()
    {
        // Fetch the page data and populate the form fields
        if($this->pageId){
            $page = Page::find($this->pageId);
        //dd($page);
        if ($page) {
            $this->name = $page->name;
            $this->title = $page->title;
            $this->description = $page->description;
        }
        }
    }
   

    public function closeModal()
    {

        $this->isOpen = false;
        $this->reset();

    }
    public function editPage()
    {
        $this->validate([
            'title' => 'required|string',
            'name' => 'required|string',
            'description' => 'required',
        ]);

        $page = Page::find($this->pageId);
        $page->name = $this->name;
        $page->title = $this->title;
        $page->description = $this->description;
        $page->save();
        $this->closeModal();
        $this->alert('success', 'Page has been updated');
    }

    public function statusToggle($id, $status)
    {
        $page = Page::find($id);
        $page->status = $status;
        $page->save();
        $this->alert('success', 'Status has been update');
    }
    public function render()
    {
        try {
            if($this->sorting === 'default'){
                $pages = Page::where('name','LIKE','%' .$this->search . '%')->orderBy('created_at','desc')->paginate($this->perPage);
            }else{
                $pages = Page::where('name','LIKE','%' .$this->search . '%')->orderBy('name',$this->sorting)->paginate($this->perPage);
            }
            return view('livewire.admin.pages.pages-component', ['pages' => $pages]);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
}
