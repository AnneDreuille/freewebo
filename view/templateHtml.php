<!DOCTYPE html>
<html lang="fr" prefix="og: http://ogp.me/ns#">
    <head>  <!-- script TinyMCE en fin de body -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title><?php echo $title; ?></title>

        <!-- meta description pour le SEO : améliorer la visibilité du site -->
        <meta name="description" content="<?php echo $metaDescription; ?>" />

        <!--lien google font police Open Sans-->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans&display=swap' rel='stylesheet' type='text/css'>

        <!--lien font-awesome pour les icônes-->
        <link rel="stylesheet" href=
        "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css">

        <!--liens pour le favicon -->
        <link rel="icon" href="<?php echo BASE_PATH;?>favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php echo BASE_PATH;?>favicon.ico" type="image/x-icon" />

        <!--lien CDN bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
        <!--lien autre style-->
        <link rel="stylesheet" href="<?php echo BASE_PATH;?>public/style.css"/>

        <!-- url canonique -->
        <link rel="canonical" href="<?php echo $urlCanonical;?>" />

        <!-- balises open graph -->
        <meta property="og:title" content="FreeWebo - Agence web solidaire"/>
        <meta property="og:description" content="FreeWebo est une agence web solidaire qui crée des sites web gratuits pour des associations ou des jeunes entrepreneurs, grâce à des développeurs bénévoles."/>
        <meta property="og:image" content="https://www.freewebo.org/public/images/webdesign.jpg" />
        <meta property="og:url" content="https://www.freewebo.org/" />
        <meta property="og:type" content="website">

        <!-- Matomo script mesure d'audience sans cookies-->
        <script>
            var _paq = window._paq || [];

            // fonction de non prorogation des cookies
            _paq.push([function() {
                var self = this;
                function getOriginalVisitorCookieTimeout() {
                    var now = new Date(),
                    nowTs = Math.round(now.getTime() / 1000),
                    visitorInfo = self.getVisitorInfo();
                    var createTs = parseInt(visitorInfo[2]);
                    var cookieTimeout = 33696000; // 13 mois en secondes
                    var originalTimeout = createTs + cookieTimeout - nowTs;
                    return originalTimeout;
                }
                this.setVisitorCookieTimeout( getOriginalVisitorCookieTimeout() );
            }]);

            /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
            _paq.push(['trackPageView']);
            _paq.push(['enableLinkTracking']);
            (function() {
                var u="https://freewebo.matomo.cloud/";
                _paq.push(['setTrackerUrl', u+'matomo.php']);
                _paq.push(['setSiteId', '1']);
                var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
                g.type='text/javascript'; g.async=true; g.defer=true; g.src='//cdn.matomo.cloud/freewebo.matomo.cloud/matomo.js'; s.parentNode.insertBefore(g,s);
            })();
        </script>
        <!-- End Matomo Code -->

        <!--script schema.org-->
        <!-- Balisage JSON-LD généré par l'outil d'aide au balisage de données structurées de Google -->
        <script type="application/ld+json">
        {
          "@context" : "http://schema.org",
          "@type" : "Article",
          "mainEntityOfPage" : {
                "@type": "WebPage",
                "@id": "https://freewebo.org/"
            },
          "name" : "FreeWebo",
          "author" : {
            "@type" : "Person",
            "name" : "Anne M Dreuille"
          },
          "datePublished" : "2020-05-05",
          "dateModified" : "2020-05-05",
          "image" : "https://freewebo.org/public/images/logo.png",
          "articleSection" : "FreeWebo - Agence web solidaire",
          "headline": "FreeWebo - Agence web solidaire",
          "articleBody" : "FreeWebo est une agence web solidaire qui crée des sites web gratuitement pour des associations ou des jeunes créateurs d'entreprise, avec l'aide de développeurs bénévoles.",
          "url" : "https://freewebo.org/",
          "publisher" : {
            "@type" : "Organization",
            "name" : "FreeWebo",
            "logo": {
                    "@type": "ImageObject",
                    "url": "https://freewebo.org/favicon.ico"
                }
            }
        }
        </script>
    </head>

    <body>
        <header class="card-header pb-0">
            <div class="text-center page-header text-info pt-0 mb-0">
                <div class="d-md-inline" id="btnLike"><img src="<?php echo BASE_PATH;?>public/images/logo.png" alt="logo" class="img.card-img" width="77" height="77" /></div>
                <h1 class="pl-2 d-md-inline font-weight-bold"><?php echo $titlePage; ?></h1>
            </div>
            <nav>
                <ul class="nav d-flex justify-content-between">
                    <!-- Accueil -->
                    <li class="nav-item">
                        <a href="<?php echo BASE_PATH;?>" class="nav-link text-info font-weight-bold"><span class="fas fa-home pr-1"></span>Accueil</a>
                    </li>
                    <!-- Espace membre -->
                    <li class="nav-item">
                        <?php if (!empty($_SESSION ['userType']) && ($_SESSION ['userType']!=="admin")) :?>
                        <a href="<?php echo BASE_PATH;?>index.php?action=member" class="nav-link text-info font-weight-bold"><span class="fas fa-campground pr-1"></span>Espace membre</a>

                        <?php elseif (empty($_SESSION ['userType'])):?>
                        <a href="" class="nav-link text-info font-weight-bold" data-toggle="tooltip" data-placement="top" title="Pour avoir accès, il faut s'inscrire&nbsp;!"><span class="fas fa-campground pr-1"></span>Espace membre</a>
                        <?php endif;?>
                    </li>

                    <!-- Espace Dev -->
                    <?php if (!empty($_SESSION ['userType']) && $_SESSION ['userType']!=="client"):?>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="<?php echo BASE_PATH;?>index.php?action=dev"><span class="fas fa-laptop-house pr-1"></span>Espace Dev</a>
                    </li>
                    <?php endif;?>

                    <!-- Espace Admin -->
                    <?php if (!empty($_SESSION ['userType']) && $_SESSION ['userType']==="admin"):?>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="<?php echo BASE_PATH;?>index.php?action=admin" ><span class="fas fa-igloo pr-1"></span>Espace admin</a>
                    </li>
                    <?php endif;?>

                    <!-- Bonjour ! -->
                    <?php if (empty($_SESSION['firstName'])):?>
                    <li class="nav-item">
                        <span class="nav-link text-secondary italic font-weight-bold h5"><span class="far fa-comment pr-1"></span>"Bonjour&nbsp;!"</span>
                    </li>
                    <?php else :?>
                    <li class="nav-item text-center">
                        <span class="nav-link text-secondary italic font-weight-bold h5"><span class="far fa-comment pr-1"></span>"Bonjour, <?php echo htmlspecialchars($_SESSION['firstName']);?>&nbsp;!"</span>
                    </li>
                    <?php endif;?>

                    <!-- bouton like -->
                    <li class="nav-link">
                        <a href="<?php echo BASE_PATH;?>index.php?action=clicks" class="text-info font-weight-bold text-decoration-none mt-2 pr-1" data-toggle="tooltip" data-placement="top" title="Clic si tu aimes&nbsp;!"><span class="fas fa-thumbs-up pr-1"></span>J'aime FreeWebo</a>
                        <span class="text-info"><?php nbLike();?></span>
                    </li>

                    <!-- bouton contact -->
                    <li class="nav-link">
                        <a href="mailto:support@freewebo.org" class="mt-2 text-info font-weight-bold text-decoration-none" data-toggle="tooltip" data-placement="top" title="Clic pour écrire un mail à : support@freewebo.org" ><span class="fas fa-question-circle pr-1"></span>Contact</a>
                    </li>

                    <!-- bouton déconnexion -->
                    <li class="nav-link">
                        <a href="<?php echo BASE_PATH;?>index.php?action=logOut" class="mt-2 text-info font-weight-bold text-decoration-none" data-toggle="tooltip" data-placement="top" title="Clic pour se déconnecter"><span class="fas fa-sign-out-alt pr-1"></span>Déconnexion</a>
                    </li>
                </ul>
            </nav>
        </header><br/>

        <?php echo $content; ?>

        <div class="container-fluid">
            <footer class="row card-footer">
                <!-- partenaires -->
                <div class ="col-md-11 container d-md-flex justify-content-around align-items-center d-sm-inline-flex">
                    <p class="text-info text-center font-weight-bold h5 px-1">Nos partenaires</p>
                    <div class="text-center py-1"><img src="<?php echo BASE_PATH;?>public/images/bnpparibas.png" alt="bnpparibas" width="231" height="73" /></div>
                    <div class="text-center py-1"><img src="<?php echo BASE_PATH;?>public/images/ideas.png" alt="ideas" width="105" height="99" /></div>
                    <div class="text-center py-1"><img src="<?php echo BASE_PATH;?>public/images/openclassrooms.png" alt="openclassrooms" width="202" height="98" /></div>
                    <div class="text-center py-1"><img src="<?php echo BASE_PATH;?>public/images/tousbenevoles.jpg" alt="tousbenevoles" width="230" height="52" /></div>
                </div>
                <hr/>
                <!-- politique de confidentialité -->
                <div class="col-md-1 text-center pr-1 d-md-flex align-items-end">
                    <a href="index.php?action=privacyPolicy"><p class="text-secondary small italic">Politique de confidentialité</p></a>
                </div><br/>
            </footer><br/>
        </div>

        <!-- script pour TinyMCE éditeur texte -->
        <script src="https://cdn.tiny.cloud/1/jy2e0nx3gog6j48dtlzexwjk3qxqq5noggxzme1zo8amqzcm/tinymce/5.2.2-80/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
            selector:'textarea',
            height:300,
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            });
        </script>

        <!-- script pour bootstrap, jquery & js-->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://unpkg.com/bootstrap-show-password@1.2.1/dist/bootstrap-show-password.min.js"></script>

        <script src="<?php echo BASE_PATH;?>public/main.js"></script>

    </body>
</html>

