<?php

namespace App\Aslam\Sales;

use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Coupons
{
    use LivewireAlert;
    public function createCoupons($data)
    {
        $coupon = new Coupon();
        $coupon->user_id = Auth::user()->id;
        $coupon->utype = Auth::user()->utype;
        $coupon->code = $data['code'];
        $coupon->type = $data['type'];
        $coupon->discount_amount = $data['discount_amount'];
        $coupon->is_active = $data['is_active'];
        $coupon->save();
       return $coupon;

    }
    public function updateCoupons($couponId, $data)
    {
        $coupon = Coupon::find($couponId);
        $coupon->user_id = Auth::user()->id;
        $coupon->utype = Auth::user()->utype;
        $coupon->code = $data['code'];
        $coupon->type = $data['type'];
        $coupon->discount_amount = $data['discount_amount'];
        $coupon->is_active = $data['is_active'];
        $coupon->save();
        return $coupon;
    }
    public function deleteCoupons($couponId)
    {
        $coupon = Coupon::find($couponId);
        if ($coupon) {
            $coupon->delete();
        } 
        return ;
    
    }
}
