<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Moon Firm</title>

    <!-- Bootstrap CSS (version 5.3) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Vos fichiers CSS personnalisés -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/fevicon.png') }}" type="image/gif">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="main-layout">
    <!-- Loader -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('images/loading.gif') }}" alt="Loading"></div>
    </div>

    <!-- Header -->
    <header>
        <div class="header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="/"><img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="img-fluid"></a>
                        </div>
                    </div>
                    
                    <div class="col-md-9 text-end">
    <!-- Bouton Tableau de Bord -->
    <div class="d-inline-block me-2">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('dashboard-form').submit();">
            <i class="bi bi-speedometer2 me-2"></i>Tableau de Bord
        </a>
        <form id="dashboard-form" action="{{ route('admin.dashboard') }}" method="GET" style="display: none;">
            @csrf <!-- Même pour les GET par sécurité -->
        </form>
    </div>
    
    <!-- Bouton Déconnexion -->
    <div class="d-inline-block">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="bi bi-box-arrow-right me-2"></i>Déconnexion
            </button>
        </form>
    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer top_layer py-4">
        <div class="container">
            <div class="row">
                <!-- Colonne 1 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="mb-3" style="max-height: 80px;">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="mailto:biostonesarl1@gmail.com" class="text-decoration-none">
                                <i class="bi bi-envelope me-2"></i>biostonesarl1@gmail.com
                            </a>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-telephone me-2"></i>+228 90 59 76 28
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-telephone me-2"></i>+228 70 15 35 71
                        </li>
                        <li>
                            <i class="bi bi-telephone me-2"></i>+228 99 16 40 57
                        </li>
                    </ul>
                </div>
                
                <!-- Colonne 2 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-3">Liens utiles</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-whatsapp me-2"></i>WhatsApp
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-twitter me-2"></i>Twitter
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-decoration-none">
                                <i class="bi bi-facebook me-2"></i>Facebook
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Colonne 3 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-3">Nos partenaires</h5>
                    <div class="d-flex flex-wrap gap-3">
                        <img src="{{ asset('images/client-4.PNG') }}" alt="MIFA" class="img-fluid" style="max-height: 50px;">
                        <img src="{{ asset('images/client2.jpeg') }}" alt="GIZ" class="img-fluid" style="max-height: 50px;">
                        <img src="{{ asset('images/client-13.jpeg') }}" alt="ANPGF" class="img-fluid" style="max-height: 50px;">
                    </div>
                </div>
                
                <!-- Colonne 4 -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h5 class="mb-3">Contactez-nous</h5>
                    <address>
                        <i class="bi bi-geo-alt me-2"></i>BP:138<br>
                        Dapaong-Togo<br>
                        Rue de Tantigou à 100m de MRS<br>
                        Lomé, Legbassito
                    </address>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Vos scripts personnalisés -->
    <script src="{{ asset('js/custom.js') }}"></script>
    
    <!-- Google Maps -->
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: { lat: 10.866417, lng: 0.205250 },
            });
            
            var marker = new google.maps.Marker({
                position: { lat: 10.866417, lng: 0.205250 },
                map: map,
                title: "BIO-STONE Dapaong"
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap" async defer></script>
</body>
</html>