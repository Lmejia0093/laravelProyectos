<?php

namespace App\Http\Controllers\Recepcion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paquete;
class RecepcionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('app.recepcion.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'telefono_cliente' => 'required|string',
        'nombre_cliente' => 'required|string',
        'telefono_vendedor' => 'required|string',
        'nombre_vendedor' => 'required|string',
        'tipo_paquete' => 'required|string',
        'costo_envio' => 'required|numeric',
        'costo_total' => 'nullable|numeric',
        'espera_remuneracion' => 'required|boolean',
        'urgente' => 'required|boolean',
        'destino' => 'required|string',
        'fecha_recepcion' => 'required|date',
        'estatus' => 'required|string',
        'ubicacion' => 'nullable|string',
        'tracking' => 'required|string|unique:paquetes,tracking',
    ]);

    $paquete = Paquete::create([
        'tracking' => $request->tracking,
        'nombre_cliente' => $request->nombre_cliente,
        'telefono_cliente' => $request->telefono_cliente,
        'nombre_vendedor' => $request->nombre_vendedor,
        'telefono_vendedor' => $request->telefono_vendedor,
        'tipo_paquete' => $request->tipo_paquete,
        'costo_envio' => $request->costo_envio,
        'costo_total' => $request->costo_total ?? 0,
        'espera_remuneracion' => $request->espera_remuneracion,
        'urgente' => $request->urgente,
        'destino' => $request->destino,
        'fecha_recepcion' => $request->fecha_recepcion,
        'estatus' => $request->estatus,
        'comentario' => $request->ubicacion,
    ]);
       // Guardar en BD

    //return redirect()->route('recepcion.paquetesingresados')->with('success', '✅ Paquete registrado correctamente: ' . $paquete->tracking);
      // Redirigir a la vista de la etiqueta para imprimir
    return redirect()->route('etiqueta.show', $paquete->tracking);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function BuscarPaquetes(Request $request){
         // Capturar el tracking desde el input
        $tracking = $request->input('tracking-number');

        // Simulación de "base de datos"
    $boxesIngresados = [
        '12345678' => [
            'tracking_number' => '12345678',
            'vendedor' => 'Don Santa Ana',
            'destino' => 'San Vicente',
            'fecha_ingreso' => '2025-08-18',
            'estado' => 'En Bodega',
            'precio'          => 7.50,
        ],
        '202020' => [
            'tracking_number' => '77777778',
            'vendedor' => 'Juan Pérez',
            'destino' => 'Santa Ana',
            'fecha_ingreso' => '2025-08-10',
            'estado' => 'En Ruta',
            'precio'          => 7.50,
        ],
    ];

      // Buscar el tracking dentro del "array"
    if (isset($boxesIngresados[$tracking])) {
        $box = $boxesIngresados[$tracking];
        return view('app.recepcion.paqueteBuscado', compact('box'));
    }


    // Si no existe -> mensaje de error
    return redirect()->back()->with('error', '❌ El paquete con tracking ' . $tracking . ' no fue encontrado.');

    }

    public function PaquetesIngresados(){
         // Traer todos los paquetes, los más recientes primero
    $paquetes = Paquete::where('estatus','recepcionado')->orderBy('created_at', 'desc')->get();
        return view('app.recepcion.paquetesingresados',compact('paquetes'));
    }
}
