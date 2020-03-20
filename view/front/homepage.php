<?php $title ="FreeWebo - Agence web solidaire"; ?>
<?php $metaDescription="FreeWebo est une agence web solidaire qui crée gratuitement des sites web pour des associations ou jeunes créateurs d'entreprise, en faisant appel à des développeurs bénévoles&nbsp;!"; ?>
<?php $header = 'Bienvenue sur le site FreeWebo&nbsp;!'; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <p class="text-center bg-info rounded text-white py-3">FreeWebo est une agence web solidaire<br/> qui crée des sites web gratuitement<br/> pour des associations<br/>et des jeunes créateurs d'entreprise,<br/>avec l'aide de développeurs bénévoles</p>
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
                                <a class="btn btn-sm btn-info small" href="index.php?action=signUp" role="button"><span class="fas fa-user-edit"></span> S'inscrire</a>
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
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-info rounded-circle float-right"><span class="fas fa-arrow-circle-up"></span></a>

    </div><br/><br/> <!-- fin container -->


<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
