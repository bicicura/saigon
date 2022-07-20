<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index() {
        $suscriptores = Newsletter::orderBy('id', 'DESC')->get();
        return view('panel.newsletter-table', ['suscriptores' => $suscriptores]);
    }

    public function desuscribir() {
        return view('desuscribir');
    }
}
