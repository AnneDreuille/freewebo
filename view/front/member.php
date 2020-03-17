<?php $title ="Espace membre FreeWebo - Agence web solidaire"; ?>
<?php $metaDescription="Parce que vous êtes gérant d'une association ou jeune créateur d'entreprise, l'espace membre FreeWebo vous permet de suivre la création de votre site web, réalisée gratuitement par un développeur bénévole&nbsp;!"; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <header class="card-header rounded">
            <h1 class="text-center page-header text-info"><img src="/freewebo/public/images/logo.png" alt="logo"/><strong> Bienvenue dans votre espace membre FreeWebo&nbsp;!</strong>
            </h1>
        </header><br/>

        <!-- bouton Retour à la page d'accueil-->
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-lg btn-info btn-sm" href="/freewebo" role="button"><span class="fas fa-home"></span> Retour à la page d'accueil</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 btn-group">
                <!-- afficher le prénom du client -->
                <button type="button" class="btn btn-outline-secondary disabled rounded mr-2">
                <?php
                    if (!empty ($_SESSION['idUser']) && ($_SESSION['userType']='client')){
                        echo $_SESSION['firstName'] ;
                    } else {
                        echo 'prénom du client';
                    }
                ?>
                </button>
                <!-- afficher le nom du projet -->
                <button type="button" class="btn btn-outline-secondary disabled rounded mr-2">
                <?php echo ('nom du projet'); ?>
                </button>
                <!-- afficher le prénom du développeur -->
                <button type="button" class="btn btn-outline-secondary disabled rounded mr-2">
                <?php
                    echo ('prénom du dev');
                ?>
                </button>
            </div>
            <div class="col-md-3"></div>
        </div><br/><br/>

        <div class="row">
            <div class="col-md-12">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-success rounded mr-2 w-15">1. Définir le besoin</button>
                    <button type="button" class="btn btn-warning rounded mr-2 w-15">2. Trouver un développeur</button>
                    <button type="button" class="btn btn-warning rounded mr-2 w-15">3. Nommer un développeur</button>
                    <button type="button" class="btn btn-primary rounded mr-2">4. Donner le modèle</button>
                    <button type="button" class="btn btn-success rounded mr-2">5. Accepter le modèle</button>
                    <button type="button" class="btn btn-primary rounded mr-2">6. Donner l'url</button>
                    <button type="button" class="btn btn-success rounded mr-2">7. Noter les intervenants</button>
                </div>
            </div>
        </div><br/><br/><br/>



        <div class="row">
            <!-- bouton pour décrire le besoin -->
            <div class="offset-md-1 col-md-3">
                <button type="button" class="btn btn-success rounded-circle" href="index.php?action=need"><span class="far fa-file-alt"></span><p class="font-weight_bold"> 1. Je décris mon besoin&nbsp;!</p></button>
            </div>

            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
        </div><br/>

        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-info rounded-circle float-right"><span class="fas fa-arrow-circle-up"></span></a>

        <!-- bouton Retour à la page d'accueil-->
        <div class="row">
            <a class="btn btn-lg btn-info btn-sm" href="/freewebo" role="button"><span class="fas fa-home"></span> Retour à la page d'accueil</a>
        </div>

    </div><br/><br/> <!-- fin container -->

<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
