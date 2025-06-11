<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Portal Audio Visual - Libras</title>

  <!-- Bibliotecas externas -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>

  <!-- Estilo local -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- se existir -->

  <style>
    #map, #mapVagas { height: 400px; }
    .section { padding: 60px 0; }
    .logo-img {
      height: 60px;
      width: auto;
    }
    html {
      scroll-behavior: smooth;
    }
    header {
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 9999;
    }
    body {
      padding-top: 100px;
    }
    .nav-link.active {
      text-decoration: underline;
      font-weight: bold;
    }
  </style>
</head>
<body style="scroll-behavior: smooth;" data-bs-spy="scroll" data-bs-target="#navbarHeader" data-bs-offset="100" tabindex="0">

  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>

  <header class="bg-primary text-white py-3 fixed-top shadow">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
      <div class="d-flex align-items-center">
        <img src="{{ asset('img/logo_audio_visual_branco.jpg') }}" alt="Logo Áudio Visual" class="logo-img me-3">
        <div>
          <h1 class="h4 mb-0">Portal Áudio Visual</h1>
          <p class="mb-0">Serviços e vagas com acessibilidade em Libras</p>
        </div>
      </div>

      <nav class="navbar navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
          <ul id="navbarHeader" class="navbar-nav gap-2">
            <li class="nav-item">
              <a class="nav-link text-white" href="#servicos">
                <i class="fas fa-sign-language me-1"></i> Serviços
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#vagas">
                <i class="fas fa-briefcase me-1"></i> Vagas
              </a>
            </li>

            @if (Route::has('login'))
                    @auth
                    <li class="nav-item">
                      <a href="{{ url('/dashboard') }}" class="nav-link text-white fw-semibold">
                          <i class="fas fa-user me-1"></i>Dashboard
                      </a>
                    </li>
                    @else
                    <li class="nav-item">
                      <a href="{{ route('login') }}" class="nav-link text-white fw-semibold">
                          <i class="fas fa-user me-1"></i>Log in
                      </a>
                    </li>

                        @if (Route::has('register'))   
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link text-white fw-semibold">
                                <i class="fas fa-user me-1"></i> Registrar
                            </a>
                            </li>
                        @endif
                    @endauth
            @endif

          </ul>
        </div>
      </nav>
    </div>
  </header>

  <section class="section">
    <div class="container">
      <h2 class="text-center mb-4" id="servicos"><i class="fas fa-sign-language me-2"></i>Serviços com Atendimento em Libras</h2>
      <div id="filtrosServicos" class="row g-3 mb-4"></div>
      <div id="listaServicos" class="row g-4"></div>
    </div>
  </section>

  <div id="map" class="container mb-5"></div>

  <section class="section bg-light">
    <div class="container">
      <h2 class="text-center mb-4" id="vagas"><i class="fas fa-briefcase me-2"></i>Vagas de Emprego com Acessibilidade</h2>
      <div id="filtrosVagas" class="row g-3 mb-4"></div>
      <div id="listaVagas" class="row g-4"></div>
    </div>
  </section>

  <div id="mapVagas" class="container mb-5"></div>

  <footer class="bg-dark text-white text-center py-3">
    <div class="container">
      <p class="mb-0">&copy; 2025 Portal Acessível em Libras</p>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
