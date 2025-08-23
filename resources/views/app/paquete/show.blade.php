@extends('layouts.app')

@section('title', 'Paquete Encontrado')

@section('contenido')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Información del paquete</h1>
    <p class="mb-4">La tabla mostrará los datos del paquete buscado</p>

    <div class="card shadow mb-4">
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
                            <td>{{ $box['fecha_ingreso'] ?? '—' }}</td>
                            <td>{{ $box['estado'] ?? '—' }}</td>
                            <td>
                                <!-- aquí abrimos el modal con AJAX -->
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
$(function () {
    // inicializa DataTable
    $('#dataTable').DataTable({
        pageLength: 5,
        lengthMenu: [5, 10, 25, 50],
        language: { url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json" }
    });

    // abre modal con AJAX
    $(document).on('click', '.btn-print', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');

        $.get(url, function (data) {
            $('#etiquetaModal').remove(); // elimina modal previo
            $('body').append(data);       // inserta el nuevo
            $('#etiquetaModal').modal('show'); // muestra modal (BS4)
        });
    });
});
</script>
@endsection
