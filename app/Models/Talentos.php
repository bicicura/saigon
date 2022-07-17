<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Talentos extends Model
{
    use HasFactory;

    protected $table = 'talentos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public static function parseJson() {
        $file =  Storage::disk('local')->get('/json/params.json');
        $file = json_decode($file);

        foreach ($file->skills->sports as $item) {
            $talento = new Talentos;
            $talento->nombre = $item->nombre;
            $talento->nombre_eng = $item->nombre_eng;
            $talento->val = $item->val;
            $talento->seccion = 'sports';
            $talento->save();
        }
    }
}
