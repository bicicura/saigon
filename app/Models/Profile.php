<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use Carbon\Carbon;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function getAge() {
        return Carbon::parse($this->date_of_birth)->age;
    }

    // public function getBook()
    // {
    //     return $this->hasMany(
    //         Extra::class,
    //         'talent_id',
    //         'id'
    //     )->orderBy('order');
    // }
}
