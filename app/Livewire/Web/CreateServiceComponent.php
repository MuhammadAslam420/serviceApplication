<?php

namespace App\Livewire\Web;

use App\Aslam\ServiceEdit;
use App\Models\Category;
use App\Models\Country;
use App\Models\ServiceType;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateServiceComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.base')]
    public $currentStep = 1;
    public $stepContent = [
        'Step 1 Service Information',
        'Step 2 Address Location',
        'Step 3 Service Gallery',
        'Step 4 SEO',
    ];
    public function nextStep()
    {
        $this->currentStep++;
    }

    public function prevStep()
    {
        $this->currentStep--;
    }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->serviceTitle, '-');
    }
    public function setSubCategories()
    {
        if (!empty($this->category)) {
            $this->subCategories = SubCategory::where('category_id', $this->category)->get();
        } else {
            $this->subCategories = [];
        }
    }
    public $subCategories = [];

    #[Rule('required|string|max:255', message: 'The :attribute field is required and must not exceed 255 characters.')]
    public $serviceTitle;

    #[Rule('required|string|unique:services')]
    public $slug;

    #[Rule('required')]
    public $category;

    #[Rule('required')]
    public $subcategory;

    #[Rule('required')]
    public $serviceType;

    #[Rule('required')]
    public $price;

    #[Rule('required')]
    public $discount;

    #[Rule('required')]
    public $duration;

    #[Rule('nullable|string|max:5000', message: 'The :attribute field is required and must not exceed 5000 characters.')]
    public $description;

    #[Rule('required|string|max:255')]
    public $address;

    #[Rule('required|string|max:255')]
    public $city;
    #[Rule('required')]
    public $country;

    #[Rule('required|string')]
    public $state;

    #[Rule('required|string')]
    public $zipcode;

    #[Rule('required')]
    public $lat;

    #[Rule('required')]
    public $lng;

    #[Rule('required|mimes:jpg,jpeg,png|max:2048')]
    public $image;

    #[Rule('nullable')]
    public $gallery;

    #[Rule('nullable|string|max:255')]
    public $video_link;

    #[Rule('required|string')]
    public $meta_keyword;

    #[Rule('nullable|string|max:5000', message: 'The :attribute field is required and must not exceed 5000 characters.')]
    public $meta_description;

    public function createService()
    {
        try {
            $this->validate();
            DB::beginTransaction();
            if ($this->image) {
                $image = '';
                $image = Carbon::now()->timestamp . '.' . $this->image->extension();
                $this->image->storeAs('assets/imgs/services/default', $image);
                //$service->image = $image;
            }
            $galleryImages = [];
            if ($this->gallery) {
                foreach ($this->gallery as $galleryImage) {
                    $imageName = Carbon::now()->timestamp . '.' . $galleryImage->extension();
                    $galleryImage->storeAs('assets/imgs/services/gallery', $imageName);
                    $galleryImages[] = $imageName;
                }
            }

            $data = [
                'title' => $this->serviceTitle,
                'slug' => $this->slug,
                'price' => $this->price,
                'discount' => $this->discount,
                'description' => $this->description,
                'city' => $this->city,
                'zipcode' => $this->zipcode,
                'state' => $this->state,
                'address' => $this->address,
                'service_type_id' => $this->serviceType,
                'category_id' => $this->category,
                'sub_category_id' => $this->subcategory,
                'country_id' => $this->country,
                'lat' => $this->lat,
                'lng' => $this->lng,
                'user_id' => Auth::user()->id,
                'status' => 'inactive',
                'type' => $this->price > 0 ? 'paid' : 'free',
                'approved' => 'no',
                'position' => 10,
                'featured' => 'non-featured',
                'vip' => 0,
                'duration' => $this->duration,
                'views' => 0,
                'meta_keyword' => $this->meta_keyword,
                'meta_description' => $this->meta_description,
            ];
            $createService = new ServiceEdit();
            $createService->createNewService($data);
            DB::commit();
            $this->alert('success', 'Yes,You create new service successfully');
            $this->reset();
            return;
        } catch (\Exception $e) {
            DB::rollBack();
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
    public function render()
    {
        $categories = Category::where('status', 'active')->get();
        $types = ServiceType::get();
        $countries = Country::get();
        return view('livewire.web.create-service-component', ['categories' => $categories, 'types' => $types, 'countries' => $countries]);
    }
}
