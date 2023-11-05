<?php

namespace App\Livewire\Admin\Setting\Home;

use App\Models\Banner;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminBannersComponent extends Component
{
    use WithFileUploads;
    use WithPagination;
    use LivewireAlert;
    #[Layout('layouts.admin')]

    public $sort = 'desc';
    public $perPage =10;

    public function updateStatus($id,$status){
        
        $banner = Banner::find($id)->update([
            'status'=>$status
        ]);
        $this->alert('success','Banner Status updated');
    }
    public function deleteBan($id){
        Banner::find($id)->delete();
        $this->alert('success','Banner Deleted Successfully');
    }
    public function render()
    {
        $banners = Banner::orderBy("id",$this->sort)->paginate($this->perPage);
        return view('livewire.admin.setting.home.admin-banners-component',['banners'=>$banners]);
    }
}
