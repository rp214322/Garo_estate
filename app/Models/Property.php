<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory, Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    protected $table = 'properties';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static $bhk = [
        "1hk" => "1hk",
        "1bhk" => "1bhk",
        "2bhk" => "2bhk",
        "3bhk" => "3bhk",
        "4bhk" => "4bhk",
        "5bhk" => "5bhk"

    ];

    public static $bathrooms = [
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",

    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getAmenitiesAttribute($amenities)
    {
        return json_decode($amenities);
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function area(){
        return $this->belongsTo('App\Models\Area');
    }

    public function gallery(){
        return $this->hasMany('App\Models\PropertyGallery');
    }

    public function feature_image(){
        return $this->hasOne('App\Models\PropertyGallery')->where('is_featured',true);
    }
}
