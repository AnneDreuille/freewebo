<?php $title ="Espace membre FreeWebo - Agence web solidaire"; ?>
<?php $metaDescription="Parce que vous êtes gérant d'une association ou jeune créateur d'entreprise, l'espace membre FreeWebo vous permet de suivre la création de votre site web, réalisée gratuitement par un développeur bénévole&nbsp;!"; ?>
<?php $header = 'Bienvenue dans votre espace membre FreeWebo&nbsp;!'; ?>

<?php ob_start(); ?>
    <div class="container-fluid">
<?php echo $_SESSION['idUser'] ; ?>
<?php echo $_SESSION['userType'] ; ?>
        <!-- bouton Retour à la page d'accueil-->
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-lg btn-info btn-sm" href="/freewebo" role="button"><span class="fas fa-home"></span> Retour à la page d'accueil</a>
            </div>
        </div>

        <!-- afficher prénom client, nom projet et prénom dév-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 btn-group">
                <!-- afficher le prénom du client -->
                <?php
                if ($_SESSION['userType']=='client'){;?>
                <button type="button" class="btn btn-success disabled rounded mr-2 text-capitalize">
                <?php echo $_SESSION['firstName'] ; ?></button>
                <?php
                } else {; ?>
                <button type="button" class="btn btn-outline-dark disabled rounded mr-2 text-capitalize">
                <?php echo 'prénom client'; ?></button>
                <?php
                }
                ?>

                <!-- afficher le nom du projet -->
                <?php
                if (!empty ($dataProject['name'])){; ?>
                <button type="button" class="btn btn-success disabled rounded mr-2 text-capitalize">
                <?php echo $dataProject['name']; ?></button>
                <?php
                } else {; ?>
                <button type="button" class="btn btn-outline-dark disabled rounded mr-2 text-capitalize">
                <?php echo 'nom projet'; ?></button>
                <?php
                }
                ?>

                <!-- afficher le prénom du développeur -->
                <button type="button" class="btn btn-outline-dark disabled rounded mr-2 text-capitalize">
                <?php
                    echo ('prénom dev');
                ?>
                </button>
            </div>
            <div class="col-md-3"></div>
        </div><br/><br/>

        <!-- afficher les boutons & images du process -->
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="btn-group align-items-end" role="group">
                    <div>
                        <div class="mb-1"><img src="public/images/1.process.jpg" alt="process étape1"/>
                        </div>
                        <a href="index.php?action=need"><button type="button" class="btn btn-success rounded mr-2 px-1">1. Je décris le besoin</button></a>
                    </div>
                    <div>
                        <div class="mb-1"><img src="public/images/2.process.jpg" alt="process étape2"/></div>
                        <a href=#><button type="button" class="btn btn-warning disabled rounded mr-2 px-1">2. Recherche développeur</button></a>
                    </div>
                    <div>
                        <div class="mb-1"><img src="public/images/3.process.png" alt="process étape3"/></div>
                        <a href=#><button type="button" class="btn btn-primary disabled rounded mr-2 px-1">3. Envoi modèle</button></a>
                    </div>
                    <div>
                        <div class="mb-1"><img src="public/images/4.process.png" alt="process étape4"/></div>
                        <a href=#><button type="button" class="btn btn-success rounded mr-2 px-1">4. J'accepte le modèle</button></a>
                    </div>
                    <div>
                        <div class="mb-1"><img src="public/images/5.process.jpg" alt="process étape5"/></div>
                        <a href=#><button type="button" class="btn btn-primary disabled rounded mr-2 px-1">5. Envoi URL</button></a>
                    </div>
                    <div>
                        <div class="mb-1"><img src="public/images/6.process.jpg" alt="process étape6"/></div>
                        <a href=#><button type="button" class="btn btn-warning rounded mr-2 px-1">6. Notations</button></a>
                    </div>
                </div>
            </div>
        </div><br/><br/>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
            <div class="col-md-3"></div>
        </div><br/>


        <!-- bouton Retour à la page d'accueil-->
        <div class="row">
            <div class='col-md-4'>
                <a class="btn btn-lg btn-info btn-sm" href="/freewebo" role="button"><span class="fas fa-home"></span> Retour à la page d'accueil</a>
            </div>
        </div>

        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-info rounded-circle float-right"><span class="fas fa-arrow-circle-up"></span></a>

    </div><br/><br/> <!-- fin container -->

<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
