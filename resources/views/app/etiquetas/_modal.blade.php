<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Etiqueta {{ $box->tracking }}</title>
    <style>
        @page { size: 4in 6in; margin: 0.2in; }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .label-4x6 {
            width: 4in;
            height: 6in;
            padding: 0.2in;
            display: grid;
            grid-template-rows: auto 1fr auto;
            gap: 0.1in;
            border: 1px dashed #ccc;
            box-sizing: border-box;
        }

        .brand { font-weight: 800; font-size: 16pt; }
        .brand .highlight { color: #f1c40f; }
        .tagline { font-size: 8pt; color: #555; }

        .body { display: grid; gap: 0.06in; border-top: 1px solid #000; border-bottom: 1px solid #000; padding: 0.08in 0; }
        .field { font-size: 10pt; }
        .destino { font-size: 12pt; font-weight: 700; padding: 0.06in; border: 1px solid #000; border-radius: 4px; }

        .footer { display: grid; gap: 0.05in; }
        .tracking-big { font-family: "Courier New", monospace; font-size: 14pt; text-align: center; font-weight: 700; }
        .price { font-size: 16pt; font-weight: 800; text-align: center; border: 1px solid #000; border-radius: 6px; padding: 0.04in 0; }
        .barcode { width: 100%; height: 0.8in; }

        @media print {
            body { margin: 0; }
            .label-4x6 { border: none; }
        }
    </style>
</head>
<body>

<div class="label-4x6">
    <!-- Encabezado -->
    <div>
        <div class="brand">Telo <span class="highlight">Llevo</span></div>
        <div class="tagline">Logística y Entrega de Paquetes</div>
    </div>

    <!-- Datos del paquete -->
    <div class="body">
        <div class="field"><b>Tracking:</b> {{ $box->tracking }}</div>
        <div class="field" style="display: flex; justify-content: space-between; font-size: 11pt;">
    <span><b>Vendedor:</b> {{ $box->nombre_vendedor }}</span>
    <span><b>Tel:</b> {{ $box->telefono_vendedor }}</span>
</div>

<div class="field" style="display: flex; justify-content: space-between; font-size: 11pt;">
    <span><b>Cliente:</b> {{ $box->nombre_cliente }}</span>
    <span><b>Tel:</b> {{ $box->telefono_cliente }}</span>
</div>
<div class="field"><b>Comentarios:</b></div>
        <div class="destino">Destino: {{ $box->destino }}</div>
    </div>

    <!-- Código de barras y precio -->
    <div class="footer">
        <svg id="barcode" class="barcode"></svg>
        <div class="tracking-big">{{ $box->tracking }}</div>
        <div class="price">Pagar: ${{ number_format($box->costo_total, 2) }}</div>
    </div>
</div>

<!-- Librería de código de barras -->
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script>
<script>
    const tracking = @json($box->tracking);
    JsBarcode("#barcode", tracking, {
        format: "CODE128",
        displayValue: false,
        height: 60,
        margin: 0
    });

    // Imprime automáticamente al abrir la página
    window.onload = function() {
        window.print();
    };
</script>
</body>
</html>


