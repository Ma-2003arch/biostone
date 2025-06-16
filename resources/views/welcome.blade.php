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
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
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
                                                <li><a href="#services">Nos services</a></li>
                                                <li><a href="#contact">Contactez Nous</a></li>
                                                <li class="nav-item">
                                                <a class="nav-link {{ request()->is('content*') ? 'active' : '' }}" href="{{ route('content.liste') }}">
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
                    <img class="second-slide" src="images/banner.jpg" alt="Second slide">
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
                        <a href="#">En savoir plus</a>
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
    <div class="offer">
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
                <a href="services.html"
                    style="display: inline-block; padding: 8px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 10px;">En
                    savoir plus</a>
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
            <a href="produits.html" class="btn btn-success btn-lg px-4 py-2">
                Voir tous nos produits <i class="fas fa-arrow-right ml-2"></i>
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
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                            <form class="main_form">
                                <div class="row">

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" placeholder="Nom" type="text" name="Name">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" placeholder="Email" type="text" name="Email">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" placeholder="telephone" type="text" name="Phone">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <textarea class="textarea" placeholder="Message" type="text"
                                            name="Message"></textarea>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <button class="send">Envoyer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
    <footr>
        <div class="footer top_layer ">
            <div class="container">

                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="address">
                            <a href="index.html"> <img src="images/logo.jpg" alt="logo" /></a>

                        </div>
                        <li>
                            <a href="#"><img src="icon/email.png" alt="#" /></a>biostonesarl1@gmail.com
                        </li>
                        <li>
                            <a href="#"><img src="icon/call.png" alt="#" /></a>+228 90 59 76 28
                        </li>
                        <li>
                            <a href="#"><img src="icon/call.png" alt="#" /></a>+228 70 15 35 71
                        </li>
                        <li>
                            <a href="#"><img src="icon/call.png" alt="#" /></a>+228 99 16 40 57
                        </li>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="address">
                            <h3>Liens utiles</h3>
                            <ul class="Links_footer">
                                <li><img src="icon/3.png" alt="#" /> <a href="#"> Whatssap</a> </li>
                                <li><img src="icon/3.png" alt="#" /> <a href="#">Twitter</a> </li>
                                <li><img src="icon/3.png" alt="#" /> <a href="#">Facebook</a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="address">
                            <h3>Nos partenaires</h3>
                            <ul class="Links_footer partners">
                                <li><img src="images/client-4.PNG" alt="MIFA"></li>
                                <li><img src="images/client2.jpeg" alt="GIZ"></li>
                                <li><img src="images/client-13.jpeg" alt="ANPGF"></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <div class="address">
                            <h3>Contactez nous</h3>

                            <ul class="loca">
                                <li>
                                    <a href="#"><img src="icon/loc.png" alt="#" /></a>BP:138 <br> Dapaong-Togo Rue de
                                    Tantigou a 100m de MRS
                                    <br>Lome,legbassito
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footr>

    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function () {

                $(this).addClass('transition');
            }, function () {

                $(this).removeClass('transition');
            });
        });
    </script>
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