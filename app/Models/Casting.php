<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fotografia;
use App\Models\Productora;
use Illuminate\Support\Facades\Http;


class Casting extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'castings';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function getFotografias() 
    {
        return $this->hasMany(
            Fotografia::class,
            'casting_id',
            'id'
        )->orderBy('order');
    }

    public function getWebUrl() {

        $sections = [
            'Comerciales' => 'comerciales', 
            'Fotografía' => 'fotografia', 
            'Ficción' => 'ficcion', 
            'Mini' => 'mini', 
            'Street Agency' => 'street-agency',
        ];
        $section = $sections[$this->seccion];

        return '/'.app()->getLocale().'/'.$section;
    }

    public function getProductora()
    {
        return $this->belongsTo(Productora::class, 'productora_id');
    }

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nombre'
            ]
        ];
    }

}

