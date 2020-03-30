<?php $title ="FreeWebo - Agence web solidaire"; ?>
<?php $metaDescription="FreeWebo est une agence web solidaire qui crée gratuitement des sites web pour des associations ou jeunes créateurs d'entreprise, en faisant appel à des développeurs bénévoles&nbsp;!"; ?>
<?php $header = 'Bienvenue sur le site FreeWebo&nbsp;!'; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <!-- PITCH INSCRIPTION CONNEXION -->
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <p class="text-center bg-info rounded text-white py-3">FreeWebo est une agence web solidaire<br/> qui crée des sites web gratuitement<br/> pour des associations<br/>et des jeunes créateurs d'entreprise,<br/>avec l'aide de développeurs bénévoles&nbsp;!</p>
            </div>

            <div class="offset-md-1 col-md-3">
                <!-- formulaire pour se connecter signIn -->
                <form action="index.php?action=signIn" method="post">
                    <div class="form-group">
                        <p class="italic font-weight-bold text-info small mb-0">Espace membre</p>
                        <div class="form-group row mb-1">
                            <div class="col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" aria-label="arobase">@</span>
                                    <input type="email" name="mail" id="mail" placeholder="monmail@exemple.com" required class="form-control text-lowercase"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <div class="col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" aria-label="password"><span class="fas fa-lock"></span></span>
                                    <input type="password" name="password" id="password" placeholder="******" data-toggle="password" required class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <div class="col">
                                <input type="submit" value="Se connecter" id="submit" class="btn btn-info btn-sm small" />
                            </div>
                        </div>
                        <!-- bouton pour s'inscrire signUp -->
                        <div class="form-group row">
                            <div class="col">
                                <span class="small italic font-weight-bold text-info mt-3 mb-0">Pas encore membre&nbsp;?</span>
                                <a class="btn btn-sm btn-info small" href="index.php?action=signUp" role="button"><span class="fas fa-user-edit pr-1"></span>S'inscrire</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><br/>

        <!-- DESCRIPTION SERVICE APPORTE -->
        <div class="row mt-5">
            <!-- start -->
            <div class="col-md-3">
                <div class="card-title text-center">
                    <button class="btn btn-primary rounded-circle w-55 p-4" type="button"><img src="public/images/start.png" alt="start" class="pb-1"/><br/>Comment faire pour avoir mon site web&nbsp;?</button>
                </div>
                <div class="d-flex justify-content-center text-primary shadow rounded pt-2">
                    <ol>
                        <li>Je commence par m'inscrire&nbsp;!</li>
                        <li>J'accède à mon espace membre.</li>
                        <li>Je décris mon besoin.</li>
                        <li>Je valide le modèle proposé.</li>
                    </ol>
                </div>
            </div><br/>

            <!-- time -->
            <div class="col-md-3">
                <div class="card-title text-center">
                    <button class="btn btn-warning rounded-circle w-55 p-4" type="button"><img src="public/images/time.png" alt="time" class="pb-1"/><br/>Combien de temps avant d'avoir mon site web&nbsp;?</button>
                </div>
                <div class="d-flex justify-content-center text-secondary shadow rounded">
                    <ol>
                        <li>Recherche d'un développeur.</li>
                        <li>Analyse de votre besoin.</li>
                        <li>Début création dès modèle OK.</li>
                        <li>Durée création = 1 à 2 mois.</li>
                    </ol>
                </div>
            </div><br/>

            <!-- limit -->
            <div class="col-md-3">
                <div class="card-title text-center">
                    <button class="btn btn-secondary rounded-circle w-55 p-4" type="button"><img src="public/images/limit.png" alt="limit" class="pb-3"/><br/>Quelles sont les limites de FreeWebo&nbsp;?</button>
                </div>
                <div class="d-flex justify-content-center text-secondary shadow rounded">
                    <ol>
                        <li>Pour assoc. & créations entrepr.</li>
                        <li>Condition d'avoir 1 développeur.</li>
                        <li>Création de sites "simples"&nbsp;!</li>
                        <li>Coût modique hébergement site.</li>
                    </ol>
                </div>
            </div><br/>

            <!-- end -->
            <div class="col-md-3">
                <div class="card-title text-center">
                    <button class="btn btn-success rounded-circle w-55 p-4" type="button"><img src="public/images/end.png" alt="end" class="pb-2"/><br/>Comment j'obtiens l'accès à mon site web&nbsp;?</button>
                </div>
                <div class="d-flex justify-content-center text-success shadow rounded">
                    <ol>
                        <li>Lien d'accès URL transmis.</li>
                        <li>Site web publié sur la "toile"&nbsp;!</li>
                        <li>Notation vous<=>développeur.</li>
                        <li>Dites si vous aimez FreeWebo&nbsp;!</li>
                    </ol>
                </div>
            </div>
        </div><br/>

        <!-- PORTFOLIO CAROUSEL -->
        <div class="row mt-5">
            <div class=" offset-md-1 col-md-10 offset-md-1">
                <h2 class="text-center text-muted shadow font-weight-bold mb-5" >Exemples de créations en parcours de formation</h2>
                <div class="carousel slide" data-ride="carousel" data-interval="6000" id="carousel">
                    <div>
                        <a class="carousel-control-prev d-flex justify-content-start" href="#carousel" data-slide="prev" role="button">
                            <span class="carousel-control-prev-icon bg-primary rounded-circle" aria-hidden="true"></span>
                            <span class="sr-only">Précédent</span>
                        </a>
                        <a class="carousel-control-next d-flex justify-content-end" href="#carousel" data-slide="next" role="button">
                            <span class="carousel-control-next-icon bg-primary rounded-circle" aria-hidden="true"></span>
                            <span class="sr-only">Suivant</span>
                        </a>
                    </div>

                    <div class="carousel-inner">
                        <div class="carousel-item active border">
                            <a href="https://www.webagency2-0.com/" class="text-decoration-none" data-toggle="tooltip" data-placement="top" title="Clic vers le site"><h3 class="text-center text-info mb-3">Site agence web<span class="fas fa-link fa-xs pl-2"></span></h3></a>
                            <img class="d-block w-100" src="public/images/webagency.png" alt="Webagency">
                        </div>
                        <div class="carousel-item border">
                            <a href="https://strasbourgtourisme.webagency2-0.com/" class="text-decoration-none" data-toggle="tooltip" data-placement="top" title="Clic vers le site"><h3 class="text-center text-info mb-3">Site Office Tourisme<span class="fas fa-link fa-xs pl-2"></span></h3></a>
                            <img class="d-block w-100" src="public/images/strasbourg.png" alt="Strasbourg">
                        </div>
                        <div class="carousel-item border">
                            <a href="https://locavelo.webagency2-0.com/" class="text-decoration-none" data-toggle="tooltip" data-placement="top" title="Clic vers l'appli web"><h3 class="text-center text-info mb-3">Appli web location vélos<span class="fas fa-link fa-xs pl-2"></span></h3></a>
                            <img class="d-block w-100" src="public/images/locavelo.png" alt="Locavelo">
                        </div>
                        <div class="carousel-item border">
                            <a href="https://blogjf.webagency2-0.com/" class="text-decoration-none" data-toggle="tooltip" data-placement="top" title="Clic vers le site"><h3 class="text-center text-info mb-3">Blog écrivain<span class="fas fa-link fa-xs pl-2"></span></h3></a>
                            <img class="d-block w-100" src="public/images/blogjf.png" alt="Blog JF">
                        </div>
                    </div>
                </div>
            </div>
        </div><br/>
<hr/>

        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-info rounded-circle float-right"><span class="fas fa-arrow-circle-up"></span></a>

    </div><br/><br/> <!-- fin container -->


<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
