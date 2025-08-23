@extends('layouts.app')

@section('title', 'paquetes Ingresados')

@section('contenido')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Paquetes Ingresados</h1>
        <p class="mb-4">La tabla mostrara los paquetes ingresados. Que aun no se han entrega al cliente</p>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="{{ route('recepcion') }}" class=" btn btn-success m-0 font-weight-bold ">Ingresar Nuevo paquete</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                              <th>Tracking</th>
                            <th>Cliente</th>
                            <th>Vendedor</th>
                            <th>Tipo</th>
                            <th>Costo</th>
                            <th>Destino</th>
                            <th>Fecha Recepción</th>
                                 <th>Estatus Paquete</th>
                                <th>Accion</th>
                            </tr>
                        </thead>

                        <tbody>

                                  @foreach($paquetes as $paquete)
                            <tr>
                                <td>{{ $paquete->tracking }}</td>
                                <td>{{ $paquete->nombre_cliente }} ({{ $paquete->telefono_cliente }})</td>
                                <td>{{ $paquete->nombre_vendedor }} ({{ $paquete->telefono_vendedor }})</td>
                                <td>{{ $paquete->tipo_paquete }}</td>
                                <td>${{ number_format($paquete->costo_envio, 2) }}</td>
                                <td>{{ $paquete->destino }}</td>
                                <td>{{ $paquete->fecha_recepcion }}</td>
                                <td>{{ ucfirst($paquete->estatus) }}</td>
                                 <td>
                                    <a href="#" class="btn btn-warning me-3 text-primary">
                                        <i class="fa-solid fa-pencil fa-1x"></i>
                                    </a>
<a href="{{ route('etiqueta.show', $paquete->tracking) }}" target="_blank" class="btn btn-secondary">
    <i class="fa-solid fa-print"></i>
</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

        @section('scripts')
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({
            "pageLength": 8, // cantidad de filas por página
            "lengthMenu": [5, 20,20, 25, 50,20,20,20],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });
</script>
@endsection
@endsection
