<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casting;
use App\Models\Reel;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;


class CastingController extends Controller
{

    public function showAll() {
        return view('panel.comerciales');
    }

    public function index($lang) {
        $seccion = 'Comerciales';
        $Reel = Reel::first();
        return view('index', ['seccion' => $seccion, 'Reel' => $Reel]);
    }

    public function fotografia($lang) {
        $castings = Casting::with('getFotografias')->where('seccion', 'Fotografía')->get();
        return view('fotografia', ['castings' => $castings]);
    }

    public function mini($lang) {
        $seccion = 'Mini';
        return view('mini', ['seccion' => $seccion]);
    }

    public function ficcion($lang) {
        $seccion = 'Ficción';
        return view('ficcion', ['seccion' => $seccion]);
    }

    public function streetagency($lang) {
        return view('street');
    }

    public function show($id)
    {
        $interesado = Casting::find($id);
        return view('panel.inbox-detail', ['interesado' => $interesado]); 
    }

    public function create()
    {
        return view('panel.create'); 
    }

    public function edit($lang, $id) {
        $casting = Casting::find($id);    
        return view('panel.edit', ['casting' => $casting]); 
    }

    public function reel($lang) {
        $Reel =  Reel::first();
        return view('panel.reel', ['Reel' => $Reel]);
    }

    public function editarFotografias($lang, $id) {
        $casting = Casting::find($id);
        $fotografias = $casting->getFotografias;
        return view('panel.fotografias-edit', ['imgs' => $fotografias, 'casting_id' => $id, 'label' => 'Editando Fotografias de '.$casting->nombre, 'table' => 'fotografias', 'directorio' => 'fotos']);
    }

    public function getThumbnail() {
        $url = 'https://vimeo.com/298168842';
        $response = Http::get('https://vimeo.com/api/oembed.json?url='.$url);
        dd($response['thumbnail_url']);
    }

    public function player($lang, $slug) {
        if ($slug === "reel") {
            $casting = Reel::first();    
        } else {
            $casting = Casting::where('slug', $slug)->firstOrFail();
        }
        return view('casting-player', ['casting' => $casting]);
    }

    // public function api() {
    //     $response = Http::post('https://casting.saigonbuenosaires.com/api/params.php?', [
    //         'USER' => 'websaigon',
    //         'PASS' => 'AvrpE36@',
    //     ]);
    //     dd($response);
    // }

}