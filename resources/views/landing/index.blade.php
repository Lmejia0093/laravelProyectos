<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Telo LLevo - Landing</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">

  <!-- AOS Animations -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    /* Hero principal */
    .hero {
      background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.6), rgba(33, 33, 33, 0.6)),
        url("https://images.unsplash.com/photo-1598966733521-6a18d1bb6a4c") center/cover no-repeat;
      color: white;
      height: 100vh;
      display: flex;
      align-items: center;
      text-align: center;
    }

    .hero h1 {
      font-size: 3.5rem;
      font-weight: 700;
    }

    .btn-warning {
      font-weight: bold;
      border-radius: 30px;
      padding: 10px 30px;
      transition: all 0.3s ease;
    }

    .btn-warning:hover {
      transform: scale(1.05);
      box-shadow: 0px 4px 12px rgba(255, 193, 7, 0.5);
    }

    /* Secciones */
    section {
      padding: 80px 0;
    }

    /* Cards servicios */
    .service-card {
      background: #fff;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
      transition: all 0.3s ease-in-out;
    }

    .service-card:hover {
      transform: translateY(-10px);
      box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.2);
    }

    /* Footer */
    footer {
      background: #212529;
      color: #bbb;
      padding: 30px 0;
    }

    footer a {
      color: #ffc107;
      margin: 0 10px;
      font-size: 1.2rem;
      transition: 0.3s;
    }

    footer a:hover {
      color: white;
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold text-warning" href="#">Telo LLevo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href="#nosotros">Sobre Nosotros</a></li>
          <li class="nav-item"><a class="nav-link" href="#servicios">Servicios</a></li>
          <li class="nav-item"><a class="nav-link btn btn-sm btn-outline-warning ms-2"
              href="{{ route('login') }}">Administración</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero -->
  <header class="hero d-flex flex-column justify-content-center">
    <div class="container" data-aos="fade-up">
      <h1 class="mb-4"><span class="text-warning">Telo LLevo</span> <br> Logística y Envíos Eficientes</h1>
      <p class="lead mb-4">Llevamos tus paquetes con seguridad y rapidez a cualquier destino.</p>
      <form class="row justify-content-center g-2">
        <div class="col-md-6">
          <input class="form-control text-center" type="text" name="Tracking_Number" id="Tracking_Number"
            placeholder="Digite su número de guía" required>
        </div>
        <div class="col-md-auto">
          <button type="submit" class="btn btn-warning">Buscar</button>
        </div>
      </form>
    <!-- Seguimiento -->
<div id="tracking-result" style="display:none; margin-top:30px;">
  <h3 class="text-center mb-4">Seguimiento del envío</h3>

  <!-- Línea de progreso -->
  <div class="position-relative mb-4">
    <div class="progress" style="height: 6px;">
      <div class="progress-bar bg-warning" role="progressbar" style="width: 60%"></div>
    </div>

    <!-- Etapas -->
    <div class="d-flex justify-content-between position-absolute w-100" style="top: -14px;">
      <!-- Recepción -->
      <div class="text-center" style="width: 25%;">
        <i class="fas fa-check-circle text-success fa-lg"></i>
        <div class="small">Recepción</div>
      </div>

      <!-- Bodega -->
      <div class="text-center" style="width: 25%;">
        <i class="fas fa-check-circle text-success fa-lg"></i>
        <div class="small">Bodega</div>
      </div>

      <!-- En ruta (activo) -->
      <div class="text-center" style="width: 25%;">
        <i class="fas fa-truck text-warning fa-lg"></i>
        <div class="small">En ruta</div>
      </div>

      <!-- Entregado (pendiente) -->
      <div class="text-center" style="width: 25%;">
        <i class="far fa-circle text-muted fa-lg"></i>
        <div class="small">Entregado</div>
      </div>
    </div>
  </div>
</div>

</div>
    </div>
  </header>

  <!-- Sección Nosotros -->
  <section id="nosotros">
    <div class="container text-center" data-aos="fade-right">
      <h2 class="fw-bold">¿Quiénes Somos?</h2>
      <p class="text-muted mt-3">En <b>Telo LLevo</b> nos especializamos en el manejo y transporte de paquetería con
        tecnología de rastreo y un equipo confiable.</p>
    </div>
  </section>

  <!-- Sección Servicios -->
  <section id="servicios" class="bg-light">
    <div class="container text-center">
      <h2 class="fw-bold" data-aos="fade-up">Nuestros Servicios</h2>
      <div class="row mt-5 g-4">
        <div class="col-md-4" data-aos="zoom-in">
          <div class="service-card">
            <i class="fa-solid fa-parachute-box fa-3x text-warning mb-3"></i>
            <h5>Recepción</h5>
            <p>Recibimos y registramos tus paquetes de forma inmediata.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="service-card">
            <i class="fa-solid fa-warehouse fa-3x text-warning mb-3"></i>
            <h5>Bodega</h5>
            <p>Almacenamiento seguro y gestión eficiente del inventario.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="service-card">
            <i class="fa-solid fa-truck-fast fa-3x text-warning mb-3"></i>
            <h5>Ruteo</h5>
            <p>Distribución y entregas rápidas en la última milla.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center">
    <div class="container">
      <p>&copy; 2025 Telo LLevo | Desarrollado por DM503</p>
      <div>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="+5037777777"><i class="fab fa-whatsapp"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init({ duration: 1000, once: true });
  </script>
  <script>
 const input = document.getElementById("Tracking_Number");
 const trackingResult = document.getElementById("tracking-result");

 input.addEventListener("input",function ()
 {
      if (this.value.trim() === "") {
      trackingResult.style.display = "none"; // se oculta
      }
 });


  document.querySelector("form").addEventListener("submit", function(e) {
    e.preventDefault(); // evita recargar la página

    const tracking = document.querySelector("input[name='Tracking_Number']").value.trim();

    if(tracking !== "") {
      // Simulación: si existe el tracking, mostramos
      document.getElementById("tracking-result").style.display = "block";
    } else {
      alert("Por favor digite un número de guía válido.");
    }
  });
</script>

</body>
</html>
