<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Skills;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function getSkills() 
    {
        return $this->hasMany(
            Skills::class,
            'profiles_id',
            'id'
        );
    }

    public function getAge() {
        return Carbon::parse($this->date_of_birth)->age;
    }
}
