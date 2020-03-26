<?php $title ="Définir votre besoin de site web sur freewebo.org - Agence Web solidaire"; ?>
<?php $metaDescription="Sur FreeWebo, vous pouvez décrire le site web dont vous avez besoin. Si vous êtes gérant d'association ou jeune créateur d'entreprise, la réalisation de votre site web sera effectuée gratuitement à l'aide de développeurs bénévoles&nbsp;!"; ?>
<?php $header = 'Définir votre besoin de site web sur FreeWebo&nbsp;!'; ?>

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
                <form action="index.php?action=need" method="post" class="border px-3 py-3 bg-light rounded">
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
                            <textarea name="description" id="description" class="form-group">
                                <small>Type de site souhaité : site institutionnel ou vitrine, site e-commerce, blog,...<br/><br/>
                                Type de visiteurs attendus<br/><br/>
                                Description de votre activité (quels sont les objectifs)<br/><br/>
                                Contenu de votre site (textes, photos...)<br/><br/>
                                Fonctionnalités de votre site (ex. formulaire de contact,...)<br/><br/>
                                Design souhaité : couleurs, police de caractères, graphisme<br/><br/>
                                ...</small>
                            </textarea>

                            <p><small id="helpDescription" class="form-text italic">
                                <ul class="list-group" >
                                    <li class="list-group-item">Type de site souhaité : site institutionnel ou vitrine, site e-commerce, blog,...</li>
                                    <li class="list-group-item">Type de visiteurs attendus</li>
                                    <li class="list-group-item">Description de votre activité (quels sont les objectifs)</li>
                                    <li class="list-group-item">Contenu de votre site (textes, photos...)</li>
                                    <li class="list-group-item">Fonctionnalités de votre site (ex. formulaire de contact,...)</li>
                                    <li class="list-group-item">Design souhaité : couleurs, police de caractères, graphisme</li>
                                    <li class="list-group-item">...</li>
                                </ul>
                            </small></p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col text-center">
                            <input type="submit" value="Valider" id="submit" class="btn btn-info font-weight-bold px-5 submit" />
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-3"></div>
        </div><br/>


        <!-- bouton Retour à l'espace membre-->
        <div class="row">
            <div class='col-md-3'>
                <a class="btn btn-lg btn-success btn-sm" href="index.php?action=member" role="button"><span class="fas fa-campground pr-1"></span>Retour à l'espace membre</a>
            </div>
        </div>

        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-info rounded-circle float-right"><span class="fas fa-arrow-circle-up"></span></a>


    </div><br/><br/> <!-- fin container -->


<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
