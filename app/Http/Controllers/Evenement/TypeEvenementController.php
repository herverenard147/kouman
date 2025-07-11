<?php

namespace App\Http\Controllers\Evenement;

use App\Http\Controllers\Controller;
use App\Models\TypeHebergement;
use Illuminate\Http\Request;

class TypeEvenementController extends Controller
{
    public function getTypesByFamille($idFamille)
{
    $types = TypeHebergement::where('idFamilleType', $idFamille)->get();
    return response()->json($types);
}
}
