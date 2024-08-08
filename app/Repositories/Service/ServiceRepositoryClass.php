<?php

namespace App\Repositories\Service;


use App\Repositories\Service\ServiceRepositoryInterface;

use App\Models\Service\Service;



class ServiceRepositoryClass implements ServiceRepositoryInterface
{

    public function all()
    {
        return Service::all();
    }

    public function create(array $data)
    {
        $price = $data['price'];
        $availability = $data['availability'];
        $service = new Service(['price' => $price, 'availability' => $availability]);

        foreach ($data['name'] as $locale => $name) {
            $service->translateOrNew($locale)->name = $name;
        }

        $service->save();
        return $service;
    }

    public function update(array $data, $serviceId)
    {
        $service = $this->find($serviceId);
        $service->price = $data['price'];
        $service->availability = $data['availability'];
        foreach ($data['name'] as $locale => $name) {
            $service->translateOrNew($locale)->name = $name;
        }
        $service->save();
        return $service;
    }



    public function find($serviceId)
    {
        $service = Service::findOrFail($serviceId);
         return $service;
    }


    public function delete($serviceId)
    {
        $service = $this->find($serviceId);
        $service->delete();
    }




}
