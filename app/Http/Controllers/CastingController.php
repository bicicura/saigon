<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casting;
use App\Models\Reel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;


class CastingController extends Controller
{

    public function showAll() {
        return view('panel.comerciales');
    }

    public function index($lang) {
        $seccion = 'Comerciales';
        $Reels = Casting::where('reel', 1)->get();

        count($Reels) > 0 ? $reelFlag = true : $reelFlag = false;

        $castings = Casting::where('seccion', ['Comerciales', 'Mini'])->orderBy('id', 'DESC')->limit(9)->get();

        return view('index', ['castings' => $castings, 'reelFlag' => $reelFlag, 'Reels' => $Reels]);
    }

    public function comerciales($lang) {
        $seccion = 'Comerciales';
        return view('comerciales', ['seccion' => $seccion]);
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

    public function player($lang, $slug) {
        if ($slug === "reel") {
            $casting = Reel::first();    
        } else {
            $casting = Casting::where('slug', $slug)->firstOrFail();
        }
        return view('casting-player', ['casting' => $casting]);
    }

    // public function test($lang) {
    //     $thumbnail_width = 640;

    //     $url = 'https://vimeo.com/717912032&width='.$thumbnail_width;
    //     $response = Http::get('https://vimeo.com/api/oembed.json?url='.$url);
    //     $thumbnail_url = $response['thumbnail_url'];

    //     $response = Http::get($thumbnail_url);

    //     $img = $response->body();
    //     $fileName = 'Test.jpg';

    //     file_put_contents('thumbnails/'.$fileName, $img);
    //     return $fileName;
    // }

    public function showReel() {
        return view('panel.show-reel');
    }

}