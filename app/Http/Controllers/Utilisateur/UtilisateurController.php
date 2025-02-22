<?php

namespace App\Http\Controllers\Utilisateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index()
    {
        return view('utilisateur.dashboard'); // Vue pour l'utilisateur
    }
}
