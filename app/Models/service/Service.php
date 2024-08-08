<?php

namespace App\Models\service;

use App\Models\offer\Offer;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model implements TranslatableContract
{
    use HasFactory, Translatable;
    public $translatedAttributes = ['name'];
    protected $fillable = ['price', 'availability'];
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}
