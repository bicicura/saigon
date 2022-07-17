<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productora extends Model
{
    use HasFactory;

    protected $table = 'productoras';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function getCastings() 
    {
        return $this->hasMany(
            Castings::class,
            'productora_id',
            'id'
        );
    }

}
