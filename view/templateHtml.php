<!DOCTYPE html>
<html lang="fr">
    <head>  <!-- script TinyMCE en fin de body -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title><?php echo $title; ?></title>

        <!-- meta description pour le SEO : améliorer la visibilité du site -->
        <meta name="description" content="<?php echo $metaDescription; ?>" />

        <!--lien google font police Monserrat-->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

        <!--lien font-awesome pour les icônes-->
        <script src="https://kit.fontawesome.com/97e1d87785.js"></script>

        <!--liens pour le favicon (les 2 1ers pour version en ligne, le 3ème pour version en local)-->
        <link rel="icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
        <link rel="icon" href="/freewebo/public/images/favicon.ico" type="image/ico" />

        <!--lien CDN bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
        <!--lien autre style-->
        <link rel="stylesheet" href="/freewebo/public/style.css"/>

        <!--script schema.org-->
        <!-- Balisage JSON-LD généré par l'outil d'aide au balisage de données structurées de Google -->
       <!--  <script type="application/ld+json">
        {
            "@context" : "http://schema.org",
            "@type" : "Article",
            "mainEntityOfPage" : {
                "@type": "WebPage",
                "@id": "https://blogjf.webagency2-0.com/"
            },
            "name" : "Blog de l'écrivain Jean Forteroche",
            "author" : {
                "@type" : "Person",
                "name" : "Jean Forteroche"
            },
            "datePublished" : "2019-05-12T14:22",
            "dateModified" : "2019-05-12T14:22",
            "image" : "https://blogjf.webagency2-0.com/public/images/couvertureAlaska.jpg",
            "articleSection" : "Chapitre 1",
            "headline": "Chapitre 1",
            "articleBody" : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consectetur felis sed lorem suscipit, pharetra maximus lectus volutpat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse eget libero non sem bibendum dictum eu a lorem. Maecenas consequat, libero in lobortis rhoncus, libero lorem ullamcorper ligula, eu iaculis nibh est eget ex. Nullam tellus risus, tempus eget condimentum at, semper et turpis...",
            "url" : "https://blogjf.webagency2-0.com/index.php?action=post&id=1",
            "publisher" : {
                "@type" : "Organization",
                "name" : "Jean Forteroche",
                "logo": {
                    "@type": "ImageObject",
                    "url": "https://blogjf.webagency2-0.com/favicon.ico"
                }
            }
        } -->
        <!-- </script> -->
    </head>

    <body>
        <header class="card-header pb-0">
            <h1 class="text-center page-header text-info pt-0 mb-0">
                <div class="d-md-inline d-sm-block"><img src="/freewebo/public/images/logo.png" alt="logo" class="img.card-img"/></div>
                <strong class="pl-2"><?php echo $header; ?></strong>
            </h1>
            <nav>
                <ul class="nav d-flex justify-content-between">
                    <!-- Accueil -->
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-info font-weight-bold"><span class="fas fa-home pr-1"></span>Accueil</a>
                    </li>
                    <!-- Espace membre -->
                    <?php if (!empty($_SESSION ['userType']) && ($_SESSION ['userType']!=="admin")) : ?>
                    <li class="nav-item">
                        <?php if (empty($_SESSION ['userType'])):?>
                        <a href="" class="nav-link text-info font-weight-bold" data-toggle="tooltip" data-placement="top" title="Pour avoir accès, il faut s'inscrire&nbsp;!"><span class="fas fa-campground pr-1"></span>Espace membre</a>
                        <?php else :?>
                        <a href="index.php?action=member" class="nav-link text-info font-weight-bold"><span class="fas fa-campground pr-1"></span>Espace membre</a>
                        <?php endif;?>
                    </li>
                    <?php endif;?>

                    <!-- Espace Admin -->
                    <?php if (!empty($_SESSION ['userType']) && $_SESSION ['userType']==="admin"):?>
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="index.php?action=admin" ><span class="fas fa-igloo pr-1"></span>Espace admin</a>
                    </li>
                    <?php endif;?>

                    <!-- Bonjour ! -->
                    <?php if (empty($_SESSION['firstName'])):?>
                    <li class="nav-item">
                        <p class="text-secondary italic font-weight-bold h5 mb-0 mt-2"><span class="far fa-comment pr-1"></span>"Bonjour&nbsp;!"</p>
                    </li>
                    <?php else :?>
                    <li class="nav-item">
                        <p class="text-secondary italic font-weight-bold h5 mb-0 mt-2"><span class="far fa-comment pr-1"></span>"Bonjour, <?php echo htmlspecialchars($_SESSION['firstName']);?>&nbsp;!"</p>
                    </li>
                    <?php endif;?>

                    <!-- bouton like -->
                    <li class="nav-link">
                        <a href="index.php?action=clicks" class="text-info font-weight-bold text-decoration-none mt-2 pr-1" id="btnLike" data-toggle="tooltip" data-placement="top" title="Clic si tu aimes&nbsp;!"><span class="fas fa-thumbs-up pr-1"></span>J'aime FreeWebo</a>
                        <span class="text-info pr-5"><?php nbLike();?></span>
                    </li>

                    <!-- bouton contact -->
                    <li class="nav-link">
                        <a href="mailto:support@freewebo.org" class="mt-2 text-info font-weight-bold text-decoration-none" data-toggle="tooltip" data-placement="top" title="Clic pour écrire un mail à : support@freewebo.org" ><span class="fas fa-question-circle pr-1"></span>Contact</a>
                    </li>
                </ul>
            </nav>
        </header><br/>

        <?php echo $content; ?>


        <footer class="card-footer">
            <!-- partenaires -->
            <div class ="container d-flex justify-content-between align-items-center">
                <p class="text-info font-weight-bold h5">Nos partenaires</p>
                <div><img src="public/images/bnpparibas.png" alt="bnpparibas"/></div>
                <div><img src="public/images/ideas.png" alt="ideas"/></div>
                <div><img src="public/images/openclassrooms.png" alt="openclassrooms"/></div>
                <div><img src="public/images/tousbenevoles.jpg" alt="tousbenevoles"/></div>
            </div>
            <hr/>
            <!-- politique de confidentialité -->
            <div class="row float-right">
                <a href="index.php?action=privacyPolicy"><p class="text-secondary small italic pr-5">Politique de confidentialité</p></a>
            </div><br/>
        </footer><br/>

        <!-- script pour TinyMCE éditeur texte -->
        <script src="https://cdn.tiny.cloud/1/jy2e0nx3gog6j48dtlzexwjk3qxqq5noggxzme1zo8amqzcm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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

        <script src="/freewebo/public/main.js"></script>

    </body>
</html>

