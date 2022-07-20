<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Skill;

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consultas';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function getSkills() 
    {
        return $this->hasMany(
            Skill::class,
            'profiles_id',
            'id'
        )->get();
    }

    public function getAge() {
        return Carbon::parse($this->date_of_birth)->age;
    }
}
