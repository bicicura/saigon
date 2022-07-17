<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Casting;
use App\Models\Reel;
use App\Models\Productora;
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
        $castings = Casting::with('getFotografias')->where('seccion', 'Fotografía')->orderBy('created_at', 'DESC')->get();
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
        
        $casting = Casting::where('slug', $slug)->firstOrFail();

        return view('casting-player', ['casting' => $casting]);
    }

    public function productoras() {
        return view('panel.productoras');
    }

    public function createProductora() {
        return view('panel.productoras-create', ['type' => 'create', 'label' => 'Crear una nueva Productora']);
    }

    public function editProductora($lang, $id) {
        $productora = Productora::find($id);
        return view('panel.productoras-create', ['type' => 'update', 'label' => 'Editar una Productora', 'productora' => $productora]);
    }

    public function showReel() {
        return view('panel.show-reel');
    }

}