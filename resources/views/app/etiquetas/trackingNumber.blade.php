<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Etiqueta {{ $box['tracking_number'] }}</title>

<style>
  @page {
    size: 4in 4in;
    margin: 0.2in;
  }

  .label-4x4 {
    width: 4in;
    height: 4in;
    box-sizing: border-box;
    padding: 0.15in;
    font-family: Arial, Helvetica, sans-serif;
    display: grid;
    grid-template-rows: auto 1fr auto;
    gap: 0.08in;
    border: 1px dashed #ccc; /* opcional, solo para ver márgenes */
  }

  .brand {
    font-weight: 800;
    font-size: 16pt;
    line-height: 1;
  }
  .brand .highlight { color: #f1c40f; }
  .tagline {
    font-size: 8pt;
    color: #555;
    margin-top: 2px;
  }

  .body {
    display: grid;
    grid-template-rows: auto auto auto 1fr;
    gap: 0.06in;
    border-top: 1px solid #000;
    border-bottom: 1px solid #000;
    padding: 0.08in 0;
  }
  .field { font-size: 10pt; }
  .field b { font-size: 10.5pt; }
  .destino {
    font-size: 12pt;
    font-weight: 700;
    padding: 0.06in;
    border: 1px solid #000;
    border-radius: 4px;
  }

  .footer {
    display: grid;
    grid-template-rows: auto auto;
    gap: 0.05in;
  }
  .tracking-big {
    font-family: "Courier New", monospace;
    font-size: 14pt;
    text-align: center;
    font-weight: 700;
    letter-spacing: 1px;
  }
  .price {
    font-size: 16pt;
    font-weight: 800;
    text-align: center;
    border: 1px solid #000;
    border-radius: 6px;
    padding: 0.04in 0;
  }
  .barcode {
    width: 100%;
    height: 0.8in;
  }

  .actions {
    margin-top: 10px;
  }
  @media print {
    .actions { display: none !important; }
    .label-4x4 { border: none; }
  }
</style>
</head>
<body>

<div class="label-4x4">
  <!-- Encabezado -->
  <div>
    <div class="brand">Telo <span class="highlight">Llevo</span></div>
    <div class="tagline">Logística y Entrega de Paquetes</div>
  </div>

  <!-- Datos -->
  <div class="body">
    <div class="field"><b>Tracking:</b> {{ $box['tracking_number'] }}</div>
    <div class="field"><b>Vendedor:</b> {{ $box['vendedor'] }}</div>
    <div class="field"><b>Cliente:</b> {{ $box['cliente'] ?? 'N/D' }}</div>
    <div class="destino">Destino: {{ $box['destino'] }}</div>
  </div>

  <!-- Código de barras + Precio -->
  <div class="footer">
    <svg id="barcode" class="barcode"></svg>
    <div class="tracking-big">{{ $box['tracking_number'] }}</div>
    <div class="price">Pagar: ${{ number_format($box['precio'], 2) }}</div>
  </div>
</div>

<!-- Botón imprimir (solo pantalla) -->
<div class="actions">
  <button onclick="window.print()">🖨️ Imprimir</button>
</div>

<!-- Librería de código de barras -->
<script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.6/dist/JsBarcode.all.min.js"></script>
<script>
  const tracking = @json($box['tracking_number']);
  JsBarcode("#barcode", tracking, {
    format: "CODE128",
    displayValue: false,
    height: 60,
    margin: 0
  });
</script>
</body>
</html>
