<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Carbon\Carbon;

class ProfileController extends Controller
{

    public function showAll() {
        return view('panel.inbox');
    }

    public function show($id)
    {
        $interesado = Profile::find($id);
        return view('panel.inbox-detail', ['interesado' => $interesado]); 
    }

}
