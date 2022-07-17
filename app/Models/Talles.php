<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Talles extends Model
{
    use HasFactory;

    protected $table = 'talles';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function parseJson() {
        $file =  Storage::disk('local')->get('/json/params.json');
        $file = json_decode($file);

        foreach ($file->talles->calzado as $item) {
            $talle = new Talles;
            $talle->inc = $item->inc;
            $talle->nombre = $item->nombre;
            $talle->tipo = $item->tipo;
            $talle->val = $item->val;
            $talle->valid = $item->valid;
            $talle->save();
        }
    }
}
