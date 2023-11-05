<?php

namespace App\Livewire\Admin\Payments\Method;

use App\Models\Payment;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PaymentsMethodsComponent extends Component
{
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $stripe;
    public $stripe_type;
    public $stripe_secrete_key;
    public $stripe_password;
    public $stripe_status;
    public $jazzcash;
    public $jazzcash_type;
    public $jazzcash_api;
    public $jazzcash_merchant_id;
    public $jazzcash_hash;
    public $jazzcash_password;
    public $jazzcash_status;
    public $easypaisa;
    public $easypaisa_type;
    public $easypaisa_api;
    public $easypaisa_merchant_id;
    public $easypaisa_hash;
    public $easypaisa_password;
    public $easypaisa_status;
    public $cos;
    public $cos_type;
    public $cos_status;

    public function mount(){
       $payment = Payment::where('name','stripe')->first();
       $this->stripe = $payment->name;
       $this->stripe_type = $payment->type;
       $this->stripe_secrete_key = $payment->merchant_id;
       $this->stripe_password = $payment->password;
       $this->stripe_status = $payment->status;

       $cos = Payment::where('name','cos')->first();
       $this->cos = $cos->name;
       $this->cos_type = $cos->type;
       $this->cos_status = $cos->status;

       $jazzcash = Payment::where('name','jazzcash')->first();
       $this->jazzcash =$jazzcash->name;
       $this->jazzcash_type =$jazzcash->type;
       $this->jazzcash_api =$jazzcash->api_url;
       $this->jazzcash_merchant_id =$jazzcash->merchant_id;
       $this->jazzcash_hash =$jazzcash->hash;
       $this->jazzcash_password =$jazzcash->password;
       $this->jazzcash_status =$jazzcash->status;
       $easypaisa = Payment::where('name','easypaisa')->first();
       $this->easypaisa =$easypaisa->name;
       $this->easypaisa_type =$easypaisa->type;
       $this->easypaisa_api =$easypaisa->api_url;
       $this->easypaisa_merchant_id =$easypaisa->merchant_id;
       $this->easypaisa_hash =$easypaisa->hash;
       $this->easypaisa_password =$easypaisa->password;
       $this->easypaisa_status =$easypaisa->status;
    }

    public function updateCos()
    {
        $cos = Payment::where('name','cos')->first();
        $cos->name =$this->cos;
        $cos->type =$this->cos_type;
        $cos->status =$this->cos_status;
        $cos->save();
        $this->alert('success','Cash on Spot method updated');
    }
    public function updateStripe()
    {
        $payment = Payment::where('name','stripe')->first();
        $payment->name = $this->stripe;
        $payment->type = $this->stripe_type;
        $payment->merchant_id = $this->stripe_secrete_key;
        $payment->password = $this->stripe_password;
        $payment->status = $this->stripe_status;
        $payment->save();
        $this->alert('success','StripePayment Method has been updated');
    }
    public function updateJazzcash()
    {
        $jazzcash = Payment::where('name','jazzcash')->first();
        $jazzcash->name = $this->jazzcash;
        $jazzcash->type = $this->jazzcash_type;
        $jazzcash->api_url = $this->jazzcash_api;
        $jazzcash->merchant_id = $this->jazzcash_merchant_id;
        $jazzcash->hash = $this->jazzcash_hash;
        $jazzcash->password = $this->jazzcash_password;
        $jazzcash->status = $this->jazzcash_status;
        $jazzcash->save();
        $this->alert('success','Jazzcash method updated');
    }
    public function updateEasypaisa()
    {
        $easypaisa = Payment::where('name','easypaisa')->first();
        $easypaisa->name = $this->easypaisa;
        $easypaisa->type = $this->easypaisa_type;
        $easypaisa->api_url = $this->easypaisa_api;
        $easypaisa->merchant_id = $this->easypaisa_merchant_id;
        $easypaisa->hash = $this->easypaisa_hash;
        $easypaisa->password = $this->easypaisa_password;
        $easypaisa->status = $this->easypaisa_status;
        $easypaisa->save();
        $this->alert('success','Easypaisa method updated');
    }
    public function render()
    {
        return view('livewire.admin.payments.method.payments-methods-component');
    }
}
