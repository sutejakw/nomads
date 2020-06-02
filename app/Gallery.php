<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class Gallery extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'travel_packages_id', 'image', 
    ];

    protected $hidden = [

    ];

    public function travel_package()
    {
        // membuat relasi ke model TravelPackage dengan travel_package_id sebagai foreign key dan id menjadi primary key
        return $this->belongsTo(TravelPackage::class, 'travel_packages_id', 'id');
    }
}
