<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Actor;

class ActorController extends Controller
{

    public function index() {
        $actores = Actor::get(['id', 'nombre', 'thumbnail']);
        return view('management', ['actores' => $actores]);
    }

    // uso el request porque sino me tomaba el parametro language de la url como el id, ahora lo especifico al parametro.
    public function detail($language, Request $request) {
        $actor = Actor::find($request->id);
        $book = $actor->getBook;
        return view('management-detail', ['actor' => $actor, 'book' => $book]);
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