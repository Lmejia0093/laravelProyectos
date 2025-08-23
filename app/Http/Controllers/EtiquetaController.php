<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;
class EtiquetaController extends Controller
{
public function show($tracking)
{
 $box = Paquete::where('tracking', $tracking)->firstOrFail();
        return view('app.etiquetas._modal', compact('box'));
}

}

