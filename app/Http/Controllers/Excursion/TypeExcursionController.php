<?php

namespace App\Http\Controllers\Hebergement;

use App\Http\Controllers\Controller;
use App\Models\TypeHebergement;
use Illuminate\Http\Request;

class TypeExcursionController extends Controller
{
    public function getTypesByFamille($idFamille)
{
    $types = TypeHebergement::where('idFamilleType', $idFamille)->get();
    return response()->json($types);
}
}
