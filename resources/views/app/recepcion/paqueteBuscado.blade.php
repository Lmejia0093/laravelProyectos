@extends('layouts.app')

@section('title', 'Paquete Encontrado')

@section('contenido')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Información del paquete</h1>
        <p class="mb-4">La tabla mostrará los datos del paquete buscado</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>Vendedor</th>
                                <th>Destino</th>
                                <th>Fecha Ingreso</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $box['tracking_number'] }}</td>
                                <td>{{ $box['vendedor'] }}</td>
                                <td>{{ $box['destino'] }}</td>
                                <td>{{ $box['fecha_ingreso'] }}</td>
                                <td>{{ $box['estado'] }}</td>
                                <td>
                                    <a href="{{ route('etiqueta.show', $box['tracking_number']) }}"
                                        class="btn btn-secondary btn-print">
                                        <i class="fa-solid fa-print fa-1x"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection





@section('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "pageLength": 5,
                "lengthMenu": [5, 10, 25, 50],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('.btn-print').on('click', function(e) {
                e.preventDefault();
                let url = $(this).attr('href');

                $.get(url, function(data) {
                    // Elimina modal anterior si existe
                    $('#etiquetaModal').remove();

                    // Agrega el nuevo modal
                    $('body').append(data);

                    // Muestra el modal
                    let modal = new bootstrap.Modal(document.getElementById('etiquetaModal'));
                    modal.show();
                });
            });
        });
    </script>
@endsection
