<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Fotografia;


class Casting extends Model
{
    use HasFactory;

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

}

