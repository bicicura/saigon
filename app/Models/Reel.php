<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reel extends Model
{
    use HasFactory;

    protected $table = 'reel';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $guarded = [];

    public function getWebUrl() {

        return '/'.app()->getLocale().'/#comerciales';
    }

}
