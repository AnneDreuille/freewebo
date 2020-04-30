<?php $title ="Définir votre besoin de site web sur freewebo.org - Agence Web solidaire"; ?>
<?php $metaDescription="Sur FreeWebo, vous pouvez décrire le site web dont vous avez besoin. Si vous êtes gérant d'association ou jeune créateur d'entreprise, la réalisation de votre site web sera effectuée gratuitement à l'aide de développeurs bénévoles&nbsp;!"; ?>
<?php $titlePage = 'Définir votre besoin de site web sur FreeWebo&nbsp;!'; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6">
                <p class="text-center bg-info rounded text-white py-3">Décriver SVP précisément votre besoin<br/> afin nous puissions l'analyser et trouver un développeur bénévole<br/> qui se chargera de la réalisation de votre site web&nbsp;!</p>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6">
                <!-- afficher le formulaire d'EXPRESSION DES BESOINS à remplir -->
                <form action="index.php?action=need" method="post" class="border px-3 py-3 bg-light rounded submitNeed">
                    <div class="from-group row">
                        <div class="col">
                            <label for="name" class="text-info font-weight-bold" >Nom de votre site</label>
                            <input type="text" name="name" id="name" required class="form-control"/>
                            <p><small id="helpName" class="form-text small italic">Nom de votre structure ou nom que vous voulez donner à votre site.</small></p>
                        </div>
                    </div><br/>
                    <div class="form-group row">
                        <div class="col">
                            <label for="description" class="text-info font-weight-bold">Description du site souhaité</label>
                            <textarea name="description" id="description"></textarea>
                            <p><small id="helpDescription" class="form-text italic">
                                <p class="text-info mb-0">Liste des rubriques pour aide&nbsp;:</p>
                                <ul>
                                    <li>Type de site souhaité : site institutionnel ou vitrine, site e-commerce, blog,...</li>
                                    <li>Type de visiteurs attendus</li>
                                    <li>Description de votre activité (quels sont les objectifs)</li>
                                    <li>Contenu de votre site (textes, photos...)</li>
                                    <li>Fonctionnalités de votre site (ex. formulaire de contact,...)</li>
                                    <li>Design souhaité : couleurs, police de caractères, graphisme</li>
                                    <li>Hébergement du site&nbsp;: confirmer SVP si nous devons nous en charger.
                                    <li>...</li>
                                </ul>
                            </small></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col text-center">
                            <input type="submit" value="Valider" class="btn btn-info font-weight-bold px-5" />
                            <p id="msg" class="text-center text-info italic small pt-3"></p>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3"></div>
        </div><br/>


        <!-- bouton Retour à l'espace membre-->
        <?php if (!empty($_SESSION ['userType']) && $_SESSION ['userType']!=="admin") :?>
        <div class="row">
            <div class='col-md-3'>
                <a class="btn btn-lg btn-success btn-sm" href="index.php?action=member" role="button"><span class="fas fa-campground pr-1"></span>Retour à l'espace membre</a>
            </div>
        </div>
        <?php endif;?>

        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-info rounded-circle float-right"><span class="fas fa-arrow-circle-up"></span></a><br/><br/>


    </div><br/><br/> <!-- fin container -->


<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
