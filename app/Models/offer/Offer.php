<?php

namespace App\Models\offer;


use App\Models\service\Service;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Offer extends Model implements TranslatableContract
{

    use HasFactory,Translatable;

    public $translatedAttributes  = ['title', 'description'];

    protected $fillable = ['code','image','type','discount','expire_date','service_id'];

    public function Service(){
        return $this->belongsTo(Service::class);
    }
    protected $with=['Service'];
}
