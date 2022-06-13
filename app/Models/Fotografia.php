<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Casting;

class Fotografia extends Model
{
    use HasFactory;

    protected $table = 'fotografias';
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function casting()
    {
        return $this->belongsTo(Casting::class);
    }
}
