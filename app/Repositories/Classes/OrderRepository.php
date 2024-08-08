<?php

namespace App\Repositories\Classes;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Admin;
use App\Models\Car;
use App\Models\Order;
use App\Models\service\Service;
use App\Repositories\Interfaces\IAdminRepository;
use App\Repositories\Interfaces\IMainRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OrderRepository extends BasicRepository implements \App\Repositories\Interfaces\OrderRepository
{
    /**
     * @var array
     */

    protected array $fieldSearchable = [
       'id', 'name','phone','email',
        'services_time','location','total',
        'latitude','longitude',
    ];

    /**
     * Configure the Model
     **/
    public function model(): string
    {
        return Order::class;
    }

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function getFieldsRelationShipSearchable()
    {
        return $this->model->searchRelationShip;
    }

    public function translationKey()
    {
        return $this->model->translationKey();
    }

    public function findBy(Request $request, $andsFilters = []): \Illuminate\Database\Eloquent\Collection|array
    {
        return $this->all(orderBy:$request->order, andsFilters: $andsFilters);
    }

    /**
     * @param $data
     */
    public function store($request)
    {
        $validated=$request;
        $car=new Car();
        $car->brand= $validated['car_brand'];
        $car->category= $validated['car_category'];
        $car->oil= $validated['car_oil'];
        $car->save();
        $validated['car_id'] = $car->id;
        $serviceIds = $validated['service_id'];
        $services = Service::with('offers')->findMany($serviceIds);
        $total = 0;

        foreach ($services as $service) {
            $currentPrice = $service->price;

            foreach ($service->offers as $offer) {
                if ($offer->code == $validated['coupon_code'] && $offer->expire_date > now()) {
                    if ($offer->type == 0) {
                        $discountAmount = ($offer->discount / 100) * $currentPrice;
                        $currentPrice -= $discountAmount;
                    } elseif ($offer->type == 1) {
                        $currentPrice -= $offer->discount;
                    }

                    $currentPrice = max($currentPrice, 0);
                }
            }
            $total += $currentPrice;
        }

        $validated['total'] = $total;

        $order= Order::create($validated);

        $order->services()->attach($validated['service_id']);
        return $order;
    }


    public function list()
    {
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function show($id)
    {
        return $this->find($id);
    }

    /**
     * @param      $request
     * @param null $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function update($request, $id = null)
    {
        $validated=$request;
        $order = $this->find($id);

        $car=Car::findOrFail($order->car_id);

        $car->brand= $validated['car_brand'];
        $car->category= $validated['car_category'];
        $car->oil= $validated['car_oil'];
        $car->save();
        $validated['car_id'] = $car->id;

        $serviceIds = $validated['service_id'];
        $services = Service::with('offers')->findMany($serviceIds);
        $total = 0;

        foreach ($services as $service) {
            $currentPrice = $service->price;

            foreach ($service->offers as $offer) {
                if ($offer->code == $validated['coupon_code'] && $offer->expire_date > now()) {
                    if ($offer->type == 0) {
                        $discountAmount = ($offer->discount / 100) * $currentPrice;
                        $currentPrice -= $discountAmount;
                    } elseif ($offer->type == 1) {
                        $currentPrice -= $offer->discount;
                    }

                    $currentPrice = max($currentPrice, 0);
                }
            }
            $total += $currentPrice;
        }

        $validated['total'] = $total;

        $order->update($validated);

        $order->services()->sync($validated['service_id']);

        return $order;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id): mixed
    {
        return $this->delete($id);
    }


    public function index()
    {
        $order= Order::with('car','user','services')->get();

        return  OrderResource::collection($order);
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }
}
