<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ConsultaController extends Controller
{

    public function showAll() {
        return view('panel.inbox');
    }

    public function show($language, $id)
    {
        $interesado = Consulta::find($id);
        return view('panel.inbox-detail', ['interesado' => $interesado]); 
    }

}
