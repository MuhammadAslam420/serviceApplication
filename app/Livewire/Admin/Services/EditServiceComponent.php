<?php

namespace App\Livewire\Admin\Services;

use App\Aslam\ServiceEdit;
use App\Models\Category;
use App\Models\Country;
use App\Models\Service;
use App\Models\ServiceType;
use App\Models\SubCategory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditServiceComponent extends Component
{
    use WithFileUploads;
    use LivewireAlert;
    #[Layout('layouts.admin')]
    public $title;
    public $slug;
    public $description;
    public $price;
    public $discount;
    public $status;
    public $featured;
    public $image;
    public $gallery;
    public $lat;
    public $lng;
    public $address;
    public $city;
    public $country_id;
    public $category_id;
    public $sub_category_id;
    public $service_type_id;
    public $video_link;
    public $position;
    public $approved;
    public $duration;
    public $zipcode;
    public $vip;
    public $serviceId;
    public $user_id;
    public $new_image;
    public $new_gallery;
    public $type;
    public $state;
    public $subCategories = [];
    // public $updateService;

    // public function __construct(ServiceEdit $updateService){
    //     $this->updateService = $updateService;
    // }
    public function generateSlug()
    {
        $this->slug = Str::slug($this->title, '-');
    }
    public function mount($id)
    {
        $this->serviceId = $id;
        $service = Service::find($id);
        $this->title = $service->title;
        $this->slug = $service->slug;
        $this->description = $service->description;
        $this->price = $service->price;
        $this->discount = $service->discount;
        $this->duration = $service->duration;
        $this->status = $service->status;
        $this->featured = $service->featured;
        $this->image = $service->image;
        $this->gallery = $service->gallery;
        $this->lat = $service->lat;
        $this->lng = $service->lng;
        $this->address = $service->address;
        $this->city = $service->city;
        $this->zipcode = $service->zipcode;
        $this->country_id = $service->country_id;
        $this->category_id = $service->category_id;
        $this->service_type_id = $service->service_type_id;
        $this->user_id = $service->user->name;
        $this->sub_category_id = $service->sub_category_id;
        $this->video_link = $service->video_link;
        $this->position = $service->position;
        $this->approved = $service->approved;
        $this->vip = $service->vip;
        $this->type = $service->type;
        $this->state = $service->state;
        if (!empty($this->category_id)) {
            $this->subCategories = SubCategory::where('category_id', $this->category_id)->get();
        }

    }
    public function setSubCategories()
    {
        if (!empty($this->category_id)) {
            $this->subCategories = SubCategory::where('category_id', $this->category_id)->get();
        } else {
            $this->subCategories = [];
        }
    }
    public function updateService()
    {
        // Validate the form data
        $this->validate([
            'title' => 'required|string',
            'slug' => 'required|unique:services,slug,' . $this->serviceId,
            'description' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required|numeric',
            'status' => 'required',
            'featured' => 'required',
            'new_image' => 'nullable|image|max:2048',
            'lat' => 'nullable|numeric',
            'lng' => 'nullable|numeric',
            'address' => 'nullable',
            'city' => 'nullable',
            'country_id' => 'required|exists:countries,id',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'video_link' => 'nullable|url',
            'position' => 'nullable|integer',
            'approved' => 'required',
            'vip' => 'required',
            'state' => 'nullable|string|min:3',
            'zipcode' => 'nullable|string|min:5',
            'duration' => 'required|integer',

        ]);
        try {
            if ($this->new_image) {
                $image = Carbon::now()->timestamp . '.' . $this->new_image->extension();
                $this->new_image->storeAs('assets/imgs/services/default', $image);
                // $service->image = $image;
            } else {
                $image = $this->image;
            }
            if ($this->new_gallery) {
                foreach ($this->new_gallery as $key => $gall) {
                    $imageName = Carbon::now()->timestamp . $key . '.' . $gall->extension();
                    $gall->storeAs('assets/imgs/services/gallery', $imageName);
                    $images[] = $imageName; // Append the new image name to the array
                }
                $gallery = implode(',', $images);
                // $service->gallery = implode(',', $images);

            } else {
                $gallery = $this->gallery;
            }
            $data = [
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
                'price' => $this->price,
                'discount' => $this->discount,
                'status' => $this->status,
                'featured' => $this->featured,
                'image' => $image,
                'gallery' => $gallery,
                'lat' => $this->lat,
                'lng' => $this->lng,
                'address' => $this->address,
                'city' => $this->city,
                'country_id' => $this->country_id,
                'category_id' => $this->category_id,
                'sub_category_id' => $this->sub_category_id,
                'video_link' => $this->video_link,
                'position' => $this->position,
                'approved' => $this->approved,
                'vip' => $this->vip,
                'state' => $this->state,
                'zipcode' => $this->zipcode,
                'duration' => $this->duration,
            ];

            $serviceEdit = new ServiceEdit();
            $serviceEdit->updateService($this->serviceId, $data);
            $this->alert('success', 'Service has been edit successfully');
            return redirect()->route('admin.services');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return view('livewire.web.error-component', compact('errorMessage'));
        }
    }
    public function render()
    {
        $categoires = Category::where('status', 'active')->get();
        $countries = Country::get();
        $types = ServiceType::get();
        return view('livewire.admin.services.edit-service-component', ['categoires' => $categoires, 'countries' => $countries, 'types' => $types]);
    }
}
