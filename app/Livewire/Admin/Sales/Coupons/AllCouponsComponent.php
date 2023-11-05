<?php

namespace App\Livewire\Admin\Sales\Coupons;

use App\Aslam\Sales\Coupons;
use App\Models\Coupon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class AllCouponsComponent extends Component
{
    use WithPagination;
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $couponId;
    public $code;
    public $user_id;
    public $utype;
    public $type;
    public $discount_amount;
    public $is_active;
    public $isOpen = 0;

    public $perPage;
    public $sorting = 'desc';
    public $search;
    public $searchCode;
    public $coupon = 0;
    public function openModal($Id = null)
    {
        $this->isOpen = true;
        $this->couponId = $Id;
        $this->coupon = Coupon::find($this->couponId);
        if ($this->coupon) {
            $this->mount($this->coupon);

        }
    }
    public function closeModal()
    {
        $this->isOpen = false;
      
        return;
    }
    public function mount(Coupon $coupon)
    {
        $this->code = $coupon->code;
        $this->user_id = $coupon->user_id;
        $this->utype = $coupon->utype;
        $this->discount_amount = $coupon->discount_amount;
        $this->type = $coupon->type;
        $this->is_active = $coupon->is_active;
    }
    public function updateCoupon()
    {
        $this->validate([
            'code' => 'required',
            'type' => 'required',
            'discount_amount' => 'required',
            'is_active' => 'required',
        ]);
        try {
            $data = [
                'code' => $this->code,
                'type' => $this->type,
                'discount_amount' => $this->discount_amount,
                'is_active' => $this->is_active,
            ];
            $coupon = new Coupons();
            if($this->couponId){
                $coupon->updateCoupons($this->couponId, $data);
            $this->alert('success', 'Coupon has been Updated');
            }else{
                $coupon->createCoupons($data);
            $this->alert('success', 'Coupon has been Updated');
            }

        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
    public function updateStatus($id,$status){
        $coupon = Coupon::find($id);
        $coupon->is_active = $status;
        $coupon->save();
        $this->alert('success','Coupon Status Updated');
    }
    public function deleteCoupon($id){
        $coupon = new Coupons();
        $coupon->deleteCoupons($id);
        $this->alert('success','Coupon has been Deleted');
    }
    public function render()
    {
        $coupons = Coupon::where(function ($query) {
                $query->whereHas('user', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                });
            })
            ->where('code', 'LIKE', '%' . $this->searchCode . '%')
            ->orderBy('created_at', $this->sorting)
            ->paginate($this->perPage);

        return view('livewire.admin.sales.coupons.all-coupons-component', ['coupons' => $coupons]);
    }
}
