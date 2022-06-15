<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Profile;

class Skills extends Model
{
    use HasFactory;

    protected $table = 'skills';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
