<?php

namespace App\Aslam;

use App\Models\Seo;
use App\Models\Service;

class ServiceEdit
{

    public function updateService(string | int $serviceId, array $data)
    {
        $service = Service::findOrFail($serviceId);
        $service->title = $data['title'];
        $service->slug = $data['slug'];
        $service->description = $data['description'];
        $service->price = $data['price'];
        $service->discount = $data['discount'];
        $service->status = $data['status'];
        $service->featured = $data['featured'];
        $service->image = $data['image'];
        $service->gallery = $data['gallery'];
        $service->lat = $data['lat'];
        $service->lng = $data['lng'];
        $service->address = $data['address'];
        $service->city = $data['city'];
        $service->country_id = $data['country_id'];
        $service->category_id = $data['category_id'];
        $service->sub_category_id = $data['sub_category_id'];
        $service->video_link = $data['video_link'];
        $service->position = $data['position'];
        $service->approved = $data['approved'];
        $service->vip = $data['vip'];
        $service->state = $data['state'];
        $service->zipcode = $data['zipcode'];
        $service->duration = $data['duration'];
        $service->save();

    }
    public function createNewService(array $data)
    {
        $service = new Service();
        $service->title = $data['title'];
        $service->slug = $data['slug'];
        $service->description = $data['description'];
        $service->price = $data['price'];
        $service->discount = $data['discount'];
        $service->status = $data['status'];
        $service->featured = $data['featured'];
        $service->image = $data['image'];
        $service->gallery = $data['gallery'];
        $service->lat = $data['lat'];
        $service->lng = $data['lng'];
        $service->address = $data['address'];
        $service->city = $data['city'];
        $service->country_id = $data['country_id'];
        $service->category_id = $data['category_id'];
        $service->sub_category_id = $data['sub_category_id'];
        $service->video_link = $data['video_link'];
        $service->position = $data['position'];
        $service->approved = $data['approved'];
        $service->vip = $data['vip'];
        $service->state = $data['state'];
        $service->zipcode = $data['zipcode'];
        $service->duration = $data['duration'];
        $service->save();
        $service_id = $service->id;
        $meta_keyword = $data['meta_keyword'];
        $meta_description = $data['meta_description'];
        $this->CreateSeo($service_id, $meta_keyword, $meta_description);
    }
    public function CreateSeo($service_id, $meta_keyword, $meta_description)
    {
        $seo = new Seo();
        $seo->service_id = $service_id;
        $seo->meta_keyword = $meta_keyword;
        $seo->meta_description = $meta_description;
        $seo->save();
    }

}
