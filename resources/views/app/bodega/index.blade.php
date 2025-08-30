@extends('layouts.app')

@section('title', 'Módulo Bodega')

@section('contenido')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold text-yellow-500 mb-6">Bodega - Asignar Ubicaciones</h1>

    <table class="min-w-full border border-black">
        <thead class="bg-yellow-500 text-black">
            <tr>
                <th class="py-2 px-4 border">Tracking</th>
                <th class="py-2 px-4 border">Cliente</th>
                <th class="py-2 px-4 border">Tipo Paquete</th>
                <th class="py-2 px-4 border">Asignar Ubicación</th>
                <th class="py-2 px-4 border">Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paquetes as $paquete)
            <tr class="bg-black text-yellow-500">
                <td class="py-2 px-4 border">{{ $paquete->tracking }}</td>
                <td class="py-2 px-4 border">{{ $paquete->nombre_cliente }}</td>
                <td class="py-2 px-4 border">{{ $paquete->tipo_paquete }}</td>
                <td class="py-2 px-4 border">
                    <form action="{{ route('bodega.asignar', $paquete->id) }}" method="POST">
                        @csrf
                        <select name="ubicacion_id" class="p-1 rounded border border-yellow-500 bg-black text-yellow-500" required>
                            <option value="">-- Seleccionar --</option>
                            @foreach($ubicaciones as $ubicacion)
                                <option value="{{ $ubicacion->id }}">{{ $ubicacion->codigo }}</option>
                            @endforeach
                        </select>
                </td>
                <td class="py-2 px-4 border">
                        <button type="submit" class="bg-yellow-500 text-black px-4 py-1 rounded hover:bg-yellow-600">
                            Asignar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
