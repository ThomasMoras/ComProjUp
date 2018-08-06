<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">

    <title>KiproMeet</title>

    <!-- Bootstrap core CSS-->
    <link href="assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css" />

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body style="padding: 0px">

<div id="h">
    <div class="logo">
        <h2>KiproMeet</h2>
    </div><!--/logo-->
    <div class="container centered">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Bienvenue sur le site <b>KiproMeet</b>.<br/>Ici, vous pourrez rencontrer des professionnels pour discuter ou réaliser des projets.</h2>
            </div>
        </div><!--/row-->

        <div class="row mt">
            <div class="col-sm-4">
                <i class="ion-ios7-monitor-outline"></i>
                <h3>Inscription gratuite</h3>
            </div><!--/col-md-4-->

            <div class="col-sm-4">
            </div><!--/col-md-4-->

            <div class="col-sm-4">
                <i class="ion-ios7-browsers-outline"></i>
                <h3>Tous domaines profesionnels disponible</h3>
            </div><!--/col-md-4-->

            <div class="col-sm-4">
                <h3><a href="{{ route('register') }}"><input type="button" class="btn btn-conf btn-clear"  value="Inscription"/></a></h3>
            </div>

            <div class="col-sm-4">
            </div>

            <div class="col-sm-4">
                <h3><a href="{{ route('login') }}"><input type="button" class="btn btn-conf btn-clear"  value="Se connecter"/></a></h3>
            </div>
        </div><!--/row-->
    </div><!--/container-->
</div><!--H-->

<div id="g">
    <div class="container">
        <div class="row centered">
            <h4>Domaines professionels disponibles :</h4>
        </div><!--/row-->
    </div><!--/.container-->
    <div class="portfolio-centered mt">
        <div class="recentitems portfolio">

            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/agriculture.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Agriculture</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/agriculture.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->

            <div class="portfolio-item web-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/architecture.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Architecture, urbanisme, paysage</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/architecture.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->

            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/art.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Art, design, Artisanat d'art, Arts du spectacle</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/art.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->

            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/audiovisuel.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Audiovisuel, Communication, Journalisme</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/audiovisuel.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a></div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->

            <div class="portfolio-item books">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/banque.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Banque, assurance</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/banque.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->

            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/commerce.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Commerce, distribution</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/commerce.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->

            <div class="portfolio-item web-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/comptabilite.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Comptabilité, gestion, ressources humaines</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/comptabilite.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->

            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/culture.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Culture et patrimoine, Bâtiment et travaux publics</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/culture.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->

            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/defense.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Défense, Droit, justice</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/defense.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->

            <div class="portfolio-item books">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/edition.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Édition, librairie, bibliothèque</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/edition.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->

            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/enseignement.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Fonction publique, Enseignement, Recherche</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/enseignement.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/environnement.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Environnement, Filière bois</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/environnement.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/hotellerie.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Hôtellerie, restauration</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/hotellerie.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/jeuvideo.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Informatique et réseaux, Jeu vidéo</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/jeuvideo.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/logistique.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Logistique et transport</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/logistique.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/maintenance.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Maintenance, entretien</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/maintenance.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/marketing.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Marketing, publicité</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/marketing.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/medical.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Médical, Paramédical</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/medical.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/securite.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Sécurité, Social</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/securite.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/sport.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Sport, Tourisme</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/sport.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
            <div class="portfolio-item graphic-design">
                <div class="he-wrap tpl6">
                    <img src="assets/img/portfolio/traduction.jpg" class="img-responsive" alt="">
                    <div class="he-view">
                        <div class="bg a0" data-animate="fadeIn">
                            <h3 class="a1" data-animate="fadeInDown">Traduction, interprétation</h3>
                            <a data-rel="prettyPhoto" href="assets/img/portfolio/traduction.jpg" class="dmbutton a2" data-animate="fadeInUp"><i class="ion-search"></i></a>
                        </div><!-- he bg -->
                    </div><!-- he view -->
                </div><!-- he wrap -->
            </div><!-- end col-12 -->
        </div><!-- portfolio -->
    </div>
</div>


<div id="f">
    <div class="container">
        <div class="row centered">
            <div class="col-md-8 col-md-offset-2">
                <a href="#"><i class="ion-social-twitter"></i></a>
                <a href="#"><i class="ion-social-instagram"></i></a>
                <a href="#"><i class="ion-social-facebook"></i></a>
            </div><!--/col-md-8-->
        </div>
    </div><!--/container-->
</div><!--/.F-->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/retina-1.1.0.js"></script>
<script src="assets/js/jquery.hoverdir.js"></script>
<script src="assets/js/jquery.hoverex.min.js"></script>
<script src="assets/js/jquery.prettyPhoto.js"></script>
<script src="assets/js/jquery.isotope.min.js"></script>
<script src="assets/js/custom.js"></script>


<script>
    // Portfolio
    (function($) {
        "use strict";
        var $container = $('.portfolio'),
            $items = $container.find('.portfolio-item'),
            portfolioLayout = 'fitRows';

        if( $container.hasClass('portfolio-centered') ) {
            portfolioLayout = 'masonry';
        }

        $container.isotope({
            filter: '*',
            animationEngine: 'best-available',
            layoutMode: portfolioLayout,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            },
            masonry: {
            }
        }, refreshWaypoints());

        function refreshWaypoints() {
            setTimeout(function() {
            }, 1000);
        }

        $('nav.portfolio-filter ul a').on('click', function() {
            var selector = $(this).attr('data-filter');
            $container.isotope({ filter: selector }, refreshWaypoints());
            $('nav.portfolio-filter ul a').removeClass('active');
            $(this).addClass('active');
            return false;
        });

        function getColumnNumber() {
            var winWidth = $(window).width(),
                columnNumber = 1;

            if (winWidth > 1200) {
                columnNumber = 5;
            } else if (winWidth > 950) {
                columnNumber = 4;
            } else if (winWidth > 600) {
                columnNumber = 3;
            } else if (winWidth > 400) {
                columnNumber = 2;
            } else if (winWidth > 250) {
                columnNumber = 1;
            }
            return columnNumber;
        }

        function setColumns() {
            var winWidth = $(window).width(),
                columnNumber = getColumnNumber(),
                itemWidth = Math.floor(winWidth / columnNumber);

            $container.find('.portfolio-item').each(function() {
                $(this).css( {
                    width : itemWidth + 'px'
                });
            });
        }

        function setPortfolio() {
            setColumns();
            $container.isotope('reLayout');
        }

        $container.imagesLoaded(function () {
            setPortfolio();
        });

        $(window).on('resize', function () {
            setPortfolio();
        });
    })(jQuery);
</script>
</body>
</html>
