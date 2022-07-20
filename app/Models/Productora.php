<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Casting;

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
            Casting::class,
            'productora_id',
            'id'
        )->select('id', 'nombre', 'director')->get();
    }

    // ->select(['id', 'nombre'])
}
