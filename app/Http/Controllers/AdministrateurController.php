<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrateurController extends Controller
{
    /**
     * Dashboard administrateur
     */
    public function index()
    {
        // Récupération de l'admin connecté via le guard "admin"
        $admin = auth('admin')->user();

        // Passer $admin à la vue
        return view('admin.index', compact('admin'));
    }
}
