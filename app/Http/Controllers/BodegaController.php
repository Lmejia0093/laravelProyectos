<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paquete;
use App\Models\Ubicacion;

class BodegaController extends Controller
{
    //
    public function index()
{
    $paquetes = Paquete::where('estatus', 'recepcionado')->get();
    $ubicaciones = Ubicacion::all();
    return view('app.bodega.index', compact('paquetes', 'ubicaciones'));
}

public function asignarUbicacion(Request $request, $id)
{
    $paquete = Paquete::findOrFail($id);
    $paquete->ubicacion_id = $request->ubicacion_id;
    $paquete->estatus = 'bodega';
    $paquete->save();

    return redirect()->back()->with('success', 'Ubicación asignada correctamente.');
}


}
