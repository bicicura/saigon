<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;

class Actor extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'actors';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function getBook() 
    {
        return $this->hasMany(
            Book::class,
            'actor_id',
            'id'
        )->orderBy('order');
    }

    public function getAge() {
        return Carbon::parse($this->date_of_birth)->age;
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