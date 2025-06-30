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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


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
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary"
                                onclick="event.preventDefault(); document.getElementById('dashboard-form').submit();">
                                <i class="bi bi-speedometer2 me-2"></i>Tableau de Bord
                            </a>
                            <form id="dashboard-form" action="{{ route('admin.dashboard') }}" method="GET"
                                style="display: none;">
                                @csrf <!-- Même pour les GET par sécurité -->
                            </form>
                        </div>

                        <!-- Bouton Déconnexion -->
                        {{-- <div class="d-inline-block">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>Déconnexion
                                </button>
                            </form>
                        </div> --}}
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
    <footer class="footer bg-dark text-white py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Colonne Logo & Contact -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-brand mb-4">
                    <img src="{{ asset('images/logo.jpg') }}" alt="BIO-STONE Logo" class="img-fluid" style="max-height: 80px;">
                </div>
                <p class="mb-4">Votre partenaire en solutions agricoles durables au Togo.</p>
                
                <div class="contact-info">
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex align-items-start">
                            <i class="bi bi-envelope fs-5 me-3 mt-1"></i>
                            <a href="mailto:biostonesarl1@gmail.com" class="text-white text-decoration-none">biostonesarl1@gmail.com</a>
                        </li>
                        <li class="mb-3 d-flex align-items-start">
                            <i class="bi bi-telephone fs-5 me-3 mt-1"></i>
                            <div>
                                <a href="tel:+22890597628" class="text-white text-decoration-none d-block">+228 90 59 76 28</a>
                                <a href="tel:+22870153571" class="text-white text-decoration-none d-block">+228 70 15 35 71</a>
                                <a href="tel:+22899164057" class="text-white text-decoration-none d-block">+228 99 16 40 57</a>
                            </div>
        </li>
                        <li class="d-flex align-items-start">
            <i class="bi bi-geo-alt fs-5 me-3 mt-1"></i>
            <span>BP:138 Dapaong-Togo<br>Rue de Tantigou à 100m de MRS</span>
        </li>
    </ul>
 </div>
            </div>

            <!-- Colonne Liens rapides -->
            <div class="col-lg-2 col-md-6">
                <h5 class="text-uppercase mb-4" style="color: #81c784;">Liens rapides</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#about" class="text-white text-decoration-none">À propos</a></li>
                    <li class="mb-2"><a href="#services" class="text-white text-decoration-none">Services</a></li>
                    <li class="mb-2"><a href="#product" class="text-white text-decoration-none">Produits</a></li>
                    <li class="mb-2"><a href="#testimonial" class="text-white text-decoration-none">Témoignages</a></li>
                    <li><a href="#contact" class="text-white text-decoration-none">Contact</a></li>
            </ul>
        </div>


              
     <!-- Colonne Services -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase mb-4" style="color: #81c784;">Nos services</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-check-circle me-2" style="color: #81c784;"></i> Accompagnement des coopératives</li>
                    <li class="mb-2"><i class="bi bi-check-circle me-2" style="color: #81c784;"></i> Financement agricole</li>
                    <li class="mb-2"><i class="bi bi-check-circle me-2" style="color: #81c784;"></i> Commercialisation</li>
                    <li class="mb-2"><i class="bi bi-check-circle me-2" style="color: #81c784;"></i> Formations techniques</li>
                    <li><i class="bi bi-check-circle me-2" style="color: #81c784;"></i> Conseil agricole</li>
                </ul>
            </div>

            <!-- Colonne Réseaux sociaux & Newsletter -->
            <div class="col-lg-3 col-md-6">
                <h5 class="text-uppercase mb-4" style="color: #81c784;">Suivez-nous</h5>
                <div class="social-links mb-4">
                    <a href="#" class="text-white me-3" aria-label="Facebook"><i class="bi bi-facebook fs-4"></i></a>
                    <a href="#" class="text-white me-3" aria-label="Twitter"><i class="bi bi-twitter fs-4"></i></a>
                    <a href="#" class="text-white me-3" aria-label="LinkedIn"><i class="bi bi-linkedin fs-4"></i></a>
                    <a href="#" class="text-white" aria-label="WhatsApp"><i class="bi bi-whatsapp fs-4"></i></a>
                </div>

                <h5 class="text-uppercase mb-3" style="color: #81c784;">Newsletter</h5>
                <form class="mb-3">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Votre email" aria-label="Email">
                        <button class="btn btn-success" type="submit">
                            <i class="bi bi-send"></i>
                        </button>
                    </div>
                </form>
                <small class="text-muted">Abonnez-vous pour recevoir nos actualités.</small>
            </div>
        </div>

        <hr class="my-4 bg-secondary">

        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="mb-0">&copy; 2023 BIO-STONE SARL. Tous droits réservés.</p>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#" class="text-white text-decoration-none">Mentions légales</a></li>
                    <li class="list-inline-item mx-2">•</li>
                    <li class="list-inline-item"><a href="#" class="text-white text-decoration-none">Politique de confidentialité</a></li>
                    <li class="list-inline-item mx-2">•</li>
                    <li class="list-inline-item"><a href="#" class="text-white text-decoration-none">Conditions d'utilisation</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<style>
    .footer {
        background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9)), url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }
    
    .footer a:hover {
        color: #81c784 !important;
        transition: all 0.3s ease;
    }
    
    .social-links a:hover {
        transform: translateY(-3px);
        display: inline-block;
    }
    
    .input-group button:hover {
        background-color: #2e7d32 !important;
    }
</style>

    <!-- Scripts -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Vos scripts personnalisés -->
    <script src="{{ asset('js/custom.js') }}"></script>
    
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap" async defer></script>
</body>
</html>