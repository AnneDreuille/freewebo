<?php $title ="FreeWebo - Agence web solidaire"; ?>
<?php $metaDescription="FreeWebo est une agence web solidaire qui crée gratuitement des sites web pour des associations ou jeunes créateurs d'entreprise, en faisant appel à des développeurs bénévoles&nbsp;!"; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <header class="card-header rounded">
            <h1 class="text-center page-header text-info"><img src="/freewebo/public/images/logo.png" alt="logo"/><strong> Bienvenue sur le site FreeWebo&nbsp;!</strong>
            </h1>
        </header><br/>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <p class="text-center bg-info rounded text-white py-3">FreeWebo est une agence web solidaire<br/> qui crée des sites web gratuitement<br/> pour des associations<br/>et des jeunes créateurs d'entreprise,<br/>avec l'aide de développeurs bénévoles</p>
            </div>

            <div class="offset-md-1 col-md-2 offset-md-1">
                <!-- formulaire pour se connecter -->
                <form method="post">
                    <div class="form-group">
                        <p class="italic font-weight-bold text-info small mb-0">Espace membre</p>
                        <div class="form-group row mb-1">
                            <div class="col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" aria-label="arobase">@</span>
                                    <input type="email" name="email" id="mail" placeholder="monmail@exemple.com" required class="form-control small"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <div class="col">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" aria-label="password"><span class="fas fa-lock"></span></span>
                                    <input type="password" name="password" id="password" placeholder="******" required class="form-control small"/>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><span class="far fa-eye"></span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-1">
                            <div class="col">
                                <input type="submit" value="Se connecter" id="submit" class="btn btn-info btn-sm small" />
                            </div>
                        </div>
                        <!-- bouton pour s'inscrire -->
                        <div class="form-group row">
                            <div class="col">
                                <span class="small italic font-weight-bold text-info mt-3 mb-0">Pas encore membre&nbsp;?</span>
                                <a class="btn btn-sm btn-info small" href="/freewebo/view/front/signUp.php" role="button"><span class="fas fa-user-edit"></span> S'inscrire</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div><br/>

        <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4"></div>
        </div><br/>

    <!-- Bouton back to the top -->
    <!-- <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-arrow-up"></span></a> -->

    </div><br/><br/> <!-- fin container -->


<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
