<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consulta;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'consultas_skills';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }
}
