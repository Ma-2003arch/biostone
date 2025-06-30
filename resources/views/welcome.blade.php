<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>moon firm</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    {{-- java script --}}
    <script src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
    <script>
        emailjs.init('YOUR_USER_ID'); // Initialiser avec votre ID EmailJS
    </script>
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen"><link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout ">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
    <header>
        <!-- header inner -->
        <div class="header">

            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.html"><img src="images/logo.jpg" alt="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="location_icon_bottum_tt">
                            <ul>
                                <li><img src="icon/loc1.png" />Localisation</li>
                                <li><img src="icon/email1.png" />biostonesarl1@gmail.com</li>

                                <li><img src="icon/call1.png" />+228 90 59 76 28/+288 70 15 35 71/+228 99 16 40 57 </li>
                            </ul>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-md-12 location_icon_bottum">
                        <div class="row">
                            <div class="col-md-8 ">
                                <div class="menu-area">
                                    <div class="limit-box">
                                        <nav class="main-menu">
                                            <ul class="menu-area-main">
                                                <li> <a href="#about">A propos</a> </li>
                                                <li><a href="#services" class="nav-link">Nos services</a></li>
                                                <li><a href="#contact">Contactez Nous</a></li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{ request()->is('content*') ? 'active' : '' }}"
                                                        href="{{ route('content.liste') }}">
                                                        <i class="bi bi-newspaper me-1"></i> Blog & Actualités
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                                <form class="search">
                                    <input class="form-control" type="text" placeholder="Search">
                                    <button><img src="images/search_icon.png"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>
    <!-- end header -->
    <section class="slider_section">
        <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="first-slide" src="images/banner.jpg" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>BIO-STONE</h1>
                            <span>CAMPAGNIE AGRICOLE</span>

                            <p>BIO-STONE, au service de l’agriculture togolaise
                                Spécialisée dans l’accompagnement agricole, BIO STONE propose des solutions durables :
                                intrants bio, formation, et conseil, pour soutenir un développement agricole respectueux
                                de l’environnement.</p>
                            <a class="buynow" href="form.html">Accompagnement</a>

                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="second-slide" src="images/slider-7.jpg" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>BIO-STONE</h1>
                            <span>CAMPAGNIE AGRICOLE</span>

                            <p>BIO-STONE, au service de l’agriculture togolaise
                                Spécialisée dans l’accompagnement agricole, BIO STONE propose des solutions durables :
                                intrants bio, formation, et conseil, pour soutenir un développement agricole respectueux
                                de l’environnement.</p>
                            <a class="buynow" href="#contact">Accompagnement</a>


                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="third-slide" src="images/banner.jpg" alt="Third slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1>BIO-STONE</h1>
                            <span>CAMPAGNIE AGRICOLE</span>

                            <p>BIO STONE, au service de l’agriculture togolaise
                                Spécialisée dans l’accompagnement agricole, BIO STONE propose des solutions durables :
                                intrants bio, formation, et conseil, pour soutenir un développement agricole respectueux
                                de l’environnement.</p>
                            <a class="buynow" href="#about">Accompagnement</a>

                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <i class='fa fa-angle-left'></i>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <i class='fa fa-angle-right'></i>
            </a>
        </div>
    </section>

    <!-- about -->
    <div id="about" class="about">
        <div class="container">
            <div class="row">
                <!-- Texte à gauche -->
                <div class="col-xl-5 col-lg-5 col-md-5 co-sm-l2">
                    <div class="about_box">
                        <h2>À propos<br><strong class="black">de BIO-STONE</strong></h2>
                        <p>
                            BIO STONE est une entreprise engagée dans le développement durable du secteur agricole au
                            Togo.
                            Nous proposons des intrants biologiques, des formations, un accompagnement technique et des
                            conseils personnalisés.
                            Notre vision : bâtir une agriculture respectueuse de l’environnement, innovante et
                            inclusive.
                            Nous collaborons avec des ONG, des coopératives, des institutions et des partenaires
                            publics/privés pour maximiser notre impact.
                        </p>
                        <div class="container text-center mt-4 mb-5">
                            <a class="btn btn-agriculture {{ request()->is('content*') ? 'active' : '' }}"
                                href="{{ route('content.liste') }}"
                                aria-label="En savoir plus sur nos services agricoles">
                                <i class="bi bi-newspaper me-2"></i> En savoir plus
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Image à droite -->
                <div class="col-xl-7 col-lg-7 col-md-7 co-sm-l2">
                    <div class="about_img">
                        <figure><img src="images/saison.jpg" alt="BIO STONE - Agriculture durable au Togo" />
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->

    <!-- offer -->
    <div class="offer" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Nos <strong class="black"> services</strong></h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="offer-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="offer_box">
                            <h3>Accompagnement des coopératives</h3>
                            <figure><img src="images/accompagnement.jpeg" alt="img" /></figure>
                            <p>Soutien à la création et la formalisation des coopératives agricoles pour une meilleure
                                structuration</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin_ttt">
                        <div class="offer_box">
                            <h3>Financement</h3>
                            <figure><img src="images/financement.jpeg" alt="img" /></figure>
                            <p>Accompagnement dans la recherche de financement et relations avec les institutions
                                partenaires</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin-lkk">
                        <div class="offer_box">
                            <h3>Commercialisations</h3>
                            <figure><img src="images/commercialisation.jpeg" alt="img" /></figure>
                            <p>Vente de semences, engrais, outils et machines agricoles modernes et performants</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BOUTON EN SAVOIR PLUS -->
            <div class="col-md-12 text-center" style="margin-top: 30px;">
                <div class="container text-center mt-4 mb-5">
                    <a class="btn btn-agriculture {{ request()->is('content*') ? 'active' : '' }}"
                        href="{{ route('content.liste') }}" aria-label="En savoir plus sur nos services agricoles">
                        <button class="bouton-savoir-plus">Savoir plus</button>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- product -->
    <div id="product" class="product">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h2>Nos<strong class="black">produits</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="product_box">
                                <figure><img src="images/produit5.jpeg" alt="#" />
                                    <h3></h3>
                                </figure>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                            <div class="product_box">
                                <figure><img src="images/produit11.jpg" alt="#" />
                                    <h3></h3>
                                </figure>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="product_box">
                                <figure><img src="images/produit10.jpg" alt="#" />
                                    <h3></h3>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="product_box">
                                <figure><img src="images/produits6.jpg" alt="#" />
                                    <h3></h3>
                                </figure>
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="product_box">
                                <figure><img src="images/produit7.jpg" alt="#" />
                                    <h3></h3>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center mt-4 mb-5">
            <a class="btn btn-green {{ request()->is('content*') ? 'active' : '' }}" href="{{ route('content.liste') }}"
                aria-label="En savoir plus sur nos services agricoles">
                <button class="bouton-savoir-plus">Savoir plus</button>
            </a>
        </div>
    </div>


    <!-- end product -->
    <!-- clients -->
    <div id="testimonial" class="clients">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Temoignages</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clients_red">
        <div class="container">
            <div id="testimonial_slider" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#testimonial_slider" data-slide-to="0" class=""></li>
                    <li data-target="#testimonial_slider" data-slide-to="1" class="active"></li>
                    <li data-target="#testimonial_slider" data-slide-to="2" class=""></li>
                </ul>
                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <div class="testomonial_section">

                            <div class="full testimonial_cont text_align_center cross_layout">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 pa_right">
                                        <div class="testomonial_img">
                                            <i><img src="images/team-member-1.JPG" alt="#" /></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 pa_left">
                                        <div class="cross_inner">
                                            <h3>— Sanwé Moutari, Producteur de maïs et membre du groupement Tône Vert

                                                <br><strong class="ornage_color">Farm & CO</strong>
                                            </h3>
                                            <p><img src="icon/1.png" alt="#" />Avant de rencontrer BIO STONE, nous
                                                manquions de moyens et de connaissances pour valoriser nos récoltes.
                                                Leur équipe est venue jusqu’à Dapaong, nous a formés à l’agriculture
                                                moderne et nous a aidés à obtenir des intrants de qualité. Aujourd’hui,
                                                notre groupement produit mieux, vend mieux, et surtout, nous sommes
                                                fiers de notre travail. Merci à BIO STONE pour son engagement envers les
                                                agriculteurs du Nord-Togo
                                                <img src="icon/2.png" alt="#" />
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item active">

                        <div class="testomonial_section">
                            <div class="full center">
                            </div>
                            <div class="full testimonial_cont text_align_center cross_layout">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 pa_right">
                                        <div class="testomonial_img">
                                            <i><img src="images/tes.jpg" alt="#" /></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 pa_left">
                                        <div class="cross_inner">
                                            <h3>Justin<br><strong class="ornage_color">Farm & CO</strong></h3>
                                            <p><img src="icon/1.png" alt="#" />Grâce à BIO STONE, notre groupement à
                                                Dapaong a pu améliorer ses rendements et accéder à de nouveaux marchés.
                                                Leur soutien concret change notre quotidien.
                                                <img src="icon/2.png" alt="#" />
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="carousel-item">

                        <div class="testomonial_section">
                            <div class="full center">
                            </div>
                            <div class="full testimonial_cont text_align_center cross_layout">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 pa_right">
                                        <div class="testomonial_img">
                                            <i><img src="images/team-member-2.JPG" alt="#" /></i>
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 pa_left">
                                        <div class="cross_inner">
                                            <h3>jean<br><strong class="ornage_color">Farm & CO</strong></h3>
                                            <p><img src="icon/1.png" alt="#" />BIO STONE nous a permis de passer d’une
                                                agriculture de survie à une agriculture rentable. À Dapaong, leur appui
                                                fait vraiment la différence.
                                                <img src="icon/2.png" alt="#" />
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <!-- end clients -->
    <!-- contact -->

    <div id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>Contactez<strong class="black">nous</strong></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid padddd">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 padddd">
            <div class="map_section">
                <!-- Affiche le message de succès -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Affiche les erreurs de validation -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container d-flex justify-content-center">
    <form class="main_form w-100" method="POST" action="{{ route('contact.store') }}" style="max-width: 55%;">
        @csrf
        <div class="row">
            <div class="col-12">
                <input class="form-control" placeholder="Nom" type="text" name="Name" required>
            </div>
            <div class="col-12 mt-2">
                <input class="form-control" placeholder="Email" type="email" name="Email" required>
            </div>
            <div class="col-12 mt-2">
                <input class="form-control" placeholder="Téléphone" type="text" name="Phone">
            </div>
            <div class="col-12 mt-2">
                <textarea class="form-control" placeholder="Message" name="Message" required></textarea>
            </div>
            <div class="col-12 mt-3">
                <button class="btn btn-success w-100" type="submit">Envoyer</button>
            </div>
        </div>
    </form>
</div>


                <div id="map">
                    <div class="col-lg-7 mb-4">
                        <div class="card h-100">
                            <div class="card-body p-0">
                                <div class="map-container">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.925943234709!2d0.2052504153659291!3d10.86641789221339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTDCsDUxJzU5LjEiTiAwwrAxMic0MS4xIkU!5e1!3m2!1sfr!2stg!4v1678907654321!5m2!1sfr!2stg"
                                        width="100%" height="100%" style="border:0; min-height: 400px;"
                                        allowfullscreen="" loading="lazy"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>

    <!--  footer -->
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
    .bouton-savoir-plus {
  background-color: #90ee90; /* vert clair */
  color: white;              /* texte blanc */
  border: none;              /* optionnel, pour enlever la bordure */
  padding: 10px 20px;        /* pour un peu d'espace à l'intérieur */
  cursor: pointer;           /* pour changer le curseur au survol */
  border-radius: 5px;        /* coins arrondis optionnels */
  font-weight: bold;         /* texte en gras optionnel */
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
    <script>
        // This example adds a marker to indicate the position of Bondi Beach in Sydney,
        // Australia.
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 16,
                center: {
                    lat: 10.866417,
                    lng: 0.205250
                },
            });

            var image = 'images/maps-and-flags.png';
            var beachMarker = new google.maps.Marker({
                position: {
                    lat: 10.866417,
                    lng: 0.205250
                },
                map: map,
                icon: image,
                title: "BIO-STONE Dapaong"
            });
        }
    </script>
    <!-- google map js -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
    <!-- end google map js -->
</body>

</html>