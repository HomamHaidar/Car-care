<?php

namespace App\Models;

use App\Models\service\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','phone','email',
        'services_time','location','total',
        'latitude','longitude',
        'user_id','car_id'];

    public function car(){
        return $this->belongsTo(Car::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function services(){
        return $this->belongsToMany(Service::class);
    }
    protected $with=['car','user','services'];

}
