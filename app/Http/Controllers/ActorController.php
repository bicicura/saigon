<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actor;

class ActorController extends Controller
{

    public function index() {
        $actores = Actor::with('getBook')->orderBy('nombre', 'ASC')->get(['id', 'nombre', 'thumbnail', 'slug']);
        return view('management', ['actores' => $actores]);
    }

    // uso el request porque sino me tomaba el parametro language de la url como el id, ahora lo especifico al parametro.
    public function detail($language, $slug) {
        $actor = Actor::with('getBook')->where('slug', $slug)->firstOrFail();
        return view('management-detail', ['actor' => $actor]);
    }

    public function showAll() {
        return view('panel.management');
    }

    public function create() {
        return view('panel.management-create');
    }

    public function edit($language, $id) {
        $Actor = Actor::find($id);
        return view('panel.management-edit', ['Actor' => $Actor]);
    }

    public function editBook($language, $id) {
        $Actor = Actor::find($id);
        $book = $Actor->getBook;
        return view('panel.management-edit-book', ['imgs' => $book, 'actor_id' => $id, 'label' => 'Editando Book de '.$Actor->nombre, 'table' => 'book', 'directorio' => 'actors']);
    }
}