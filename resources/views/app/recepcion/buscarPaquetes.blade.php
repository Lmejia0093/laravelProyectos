@extends('layouts.app')

@section('title', 'Lista de Paquetes')

@section('contenido')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">

            <!-- Tarjeta con estilo corporativo -->
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header text-center fw-bold text-dark bg-warning">
                    <i class="bi bi-upc-scan"></i> Escaneo de Código de Paquete
                </div>

                <div class="card-body p-4">
                    <!-- Campo de resultado -->
                    <div class="mb-3">
                        <label for="codigo_escaneado" class="form-label fw-semibold text-dark">
                            Código del Paquete (Escaneado o Manual)
                        </label>
                        <input type="text"
                               class="form-control form-control-lg border-warning text-center fw-bold"
                               id="codigo_escaneado"
                               name="codigo_escaneado"
                               placeholder="Escanee o escriba el código manualmente"
                               required>
                        <small class="text-muted">Si el código no se puede escanear, escríbalo manualmente.</small>
                    </div>

                    <!-- Lector QR -->
                    <div id="reader" class="border rounded shadow-sm mx-auto mb-4"
                         style="width: 100%; max-width: 450px; background: #fffbe6;">
                    </div>

                    <!-- Botón de escaneo -->
                    <div class="d-grid">
                        <button type="button" class="btn btn-warning btn-lg fw-bold shadow-sm" onclick="startScanner()">
                            <i class="bi bi-camera"></i> Escanear Código
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Script del lector -->
<script>
    let scanner;

    function startScanner() {
        if (scanner) {
            scanner.clear().catch(error => console.error('Error al limpiar el escáner:', error));
        }

        scanner = new Html5Qrcode("reader");

        scanner.start(
            { facingMode: "environment" },
            { fps: 10, qrbox: 250 },
            qrCodeMessage => {
                document.getElementById('codigo_escaneado').value = qrCodeMessage;
                scanner.stop().then(() => {
                    document.getElementById("reader").innerHTML = "";
                }).catch(err => console.error('Error al detener escáner:', err));
            },
            errorMessage => {
                // errores de escaneo se pueden ignorar
            }
        ).catch(err => console.error('Error al iniciar escáner:', err));
    }
</script>
@endsection
