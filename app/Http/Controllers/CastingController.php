<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casting;
use Illuminate\Support\Facades\Http;


class CastingController extends Controller
{

    public function showAll() {
        return view('panel.comerciales');
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

}