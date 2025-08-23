@extends('layouts.app')
@section('title','Recepcion de paquetes')
@section('contenido')
    <div class="container-fluid py-5">
        <div class="card shadow-lg mx-auto" style="max-width: 1200px;">
            <div class="card-body p-4">

                <h4 class="text-center mb-4">Formulario de Recepción de Paquetes</h4>

                <form method="POST" action="{{ route('recepcion.store') }}">
                    @csrf

                    <div class="row">
                        <!-- ================== CLIENTE ================== -->
                        <div class="col-md-6 mb-4">
                            <div class="card border-primary shadow-sm h-100">
                                <div class="card-header bg-primary text-white fw-bold">
                                    Datos del Cliente
                                </div>
                                <div class="card-body row">
                                    <div class="mb-3 col-12">
                                        <label for="telefono_cliente" class="form-label">Teléfono del Cliente</label>
                                        <input type="tel" class="form-control" id="telefono_cliente"
                                            onchange="BuscarCliente(this.value)" name="telefono_cliente" required>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
                                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente"
                                            required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ================== VENDEDOR ================== -->
                        <div class="col-md-6 mb-4">
                            <div class="card border-success shadow-sm h-100">
                                <div class="card-header bg-success text-white fw-bold">
                                    Datos del Vendedor
                                </div>
                                <div class="card-body row">
                                    <div class="mb-3 col-12">
                                        <label for="telefono_vendedor" class="form-label">Teléfono del Vendedor</label>
                                        <input type="tel" class="form-control" id="telefono_vendedor"
                                            onchange="BuscarVendedor(this.value)" name="telefono_vendedor" required>
                                    </div>
                                    <div class="mb-3 col-12">
                                        <label for="nombre_vendedor" class="form-label">Nombre del Vendedor</label>
                                        <input type="text" class="form-control" id="nombre_vendedor"
                                            name="nombre_vendedor" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================== ENVÍO ================== -->
                    <div class="row">
                        <div class="col-12 mb-4">
                            <div class="card border-dark shadow-sm">
                                <div class="card-header bg-dark text-white fw-bold">
                                    Información del Envío
                                </div>
                                <div class="card-body row">

                                    <div class="mb-3 col-md-6">
                                        <label for="tipo_paquete" class="form-label">Tipo de Paquete</label>
                                        <select class="form-select" id="tipo_paquete" name="tipo_paquete"
                                            onchange="calcularCosto()">
                                            <option value="">Seleccione...</option>
                                            <option value="caja">Caja</option>
                                            <option value="sobre">Sobre</option>
                                            <option value="bolsa">Bolsa</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="costo_envio" class="form-label">Costo de Envío</label>
                                        <input type="number" class="form-control" id="costo_envio" name="costo_envio"
                                            step="0.01" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="costo_total" class="form-label">Costo Total</label>
                                        <input type="number" class="form-control" id="costo_total" name="costo_total"
                                            step="0.01">
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">¿Espera remuneración?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="espera_remuneracion"
                                                    id="remu_si" value="1" required>
                                                <label class="form-check-label" for="remu_si">Sí</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="espera_remuneracion"
                                                    id="remu_no" value="0">
                                                <label class="form-check-label" for="remu_no">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label">¿Urgente?</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="urgente"
                                                    id="urgente_si" value="1" required>
                                                <label class="form-check-label" for="urgente_si">Sí</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="urgente"
                                                    id="urgente_no" value="0">
                                                <label class="form-check-label" for="urgente_no">No</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="destino" class="form-label">Destino</label>
                                        <select class="form-select" id="destino" name="destino" required>
                                            <option value="sucursal_1">Sucursal 1</option>
                                            <option value="sucursal_2">Sucursal 2</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="fecha_recepcion" class="form-label">Fecha de Recepción</label>
                                        <input type="date" class="form-control" id="fecha_recepcion"
                                            name="fecha_recepcion" required>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="estatus" class="form-label">Estatus</label>
                                        <select class="form-select" id="estatus" name="estatus" required>
                                            <option class="" value="recepcionado">Nuevo Paquete</option>
                                        </select>
                                    </div>

                                    <div class="mb-3 col-12">
                                        <label for="ubicacion" class="form-label">Comentario</label>
                                        <input type="text" class="form-control" id="ubicacion" name="ubicacion">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tracking generado automáticamente -->
                    <input type="hidden" name="tracking" value="{{ uniqid('TK') }}">



                    <!-- Botón de enviar -->
                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-success">Registrar Paquete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function BuscarCliente(numero) {
            let clientes = {
                "123456789": "Juan Pérez",
                "60607070": "María López"
            };

            if (clientes[numero]) {
                document.getElementById("nombre_cliente").value = clientes[numero];
            } else {
                document.getElementById("nombre_cliente").value = "";
            }
        }

        function BuscarVendedor(numero) {
            let vendedor = {
                "20202020": "Juana Platos"
            };

            if (vendedor[numero]) {
                document.getElementById("nombre_vendedor").value = vendedor[numero];
            } else {
                document.getElementById("nombre_vendedor").value = "";
            }
        }
    </script>
@endsection
