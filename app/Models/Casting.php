<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fotografia;
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

    // public function getThumbnail() {
        
    //     $url = 'https://vimeo.com/581208956';
    //     $response = Http::get('https://vimeo.com/api/oembed.json?url='.$url);
    //     return $response['thumbnail_url'];
    // }

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

