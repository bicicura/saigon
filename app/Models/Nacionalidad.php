<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Nacionalidad extends Model
{
    use HasFactory;

    protected $table = 'nacionalidades';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function parseJson() {
        $file =  Storage::disk('local')->get('/json/params.json');
        $file = json_decode($file);

        foreach ($file->nacionalidades as $item) {
            $nacion = new Nacionalidad();
            $nacion->comun = $item->comun;
            $nacion->nombre = $item->nombre;
            $nacion->val = $item->val;
            $nacion->save();
        }
    }
}
