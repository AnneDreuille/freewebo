<?php $title ="S'inscrire sur freewebo.org - Agence Web solidaire"; ?>
<?php $metaDescription="S'inscrire à FreeWebo pour demander la création de votre site web gratuitement... ou pour être développeur bénévole&nbsp;!"; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <header class="card-header rounded">
            <h1 class="text-center page-header text-info"><img src="/freewebo/public/images/logo.png" alt="logo"/><strong> Inscrivez-vous sur le site FreeWebo&nbsp;!</strong>
            </h1>
        </header><br/>

        <div class="row">
            <div class="col-md-4">
                <!-- bouton Retour à la page d'accueil-->
                <a class="btn btn-lg btn-info btn-sm" href="/freewebo" role="button"><span class="fas fa-home"></span> Retour à la page d'accueil</a>
            </div>

            <div class="col-md-4">
                <p class="text-center bg-info rounded text-white py-3">Une fois inscrit, vous pourrez demander la création de votre site web gratuitement&nbsp;!<br/>Si vous êtes développeur, vous pourrez être bénévole sur un projet&nbsp;!</p>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <!-- afficher le formulaire d'INSCRIPTION à remplir -->
                <form action="index.php?action=signUp" method="post" class="border px-3 py-3 bg-light rounded">
                    <div>
                        <p class="mb-0 text-info font-weight-bold">Qui êtes-vous&nbsp;?</p>
                        <div class="form-check">
                            <input type="radio" id="radio1" name="userType" value="client" class="form-check-input" />
                            <label for="radio1" class="form-check-label">Gérant d'une association</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="radio2" name="userType" value="client" class="form-check-input" />
                            <label for="radio2" class="form-check-label">Jeune créateur d'entreprise</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="radio3" name="userType" value="dev" class="form-check-input" />
                            <label for="radio3" class="form-check-label">Développeur bénévole</label>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col">
                            <input type="text" name="lastName" id="lastName" placeholder="Nom" required class="form-control"/>
                        </div>
                        <div class="col">
                            <input type="text" name="firstName" id="firstName" placeholder="Prénom" required class="form-control"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <span class="input-group-text" aria-label="arobase">@</span>
                                <input type="email" name="mail" id="mail" placeholder="monmail@exemple.com" required class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <span class="input-group-text" aria-label="tel"><span class="fas fa-phone"></span></span>
                                <input type="tel" name="phone" id="phone" placeholder="0X XX XX XX XX" class="form-control" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <span class="input-group-text" aria-label="password"><span class="fas fa-lock"></span></span>
                                <input type="password" name="password" id="password" placeholder="******" data-toggle="password" required class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <p class="small italic text-center text-info"><?php echo $message; ?></p>
                    <div class="form-group row">
                        <div class="col text-center">
                            <input type="submit" value="Valider" id="submit" class="btn btn-info font-weight-bold px-5 submit" />
                        </div>
                    </div>
                    <p class="small italic text-center text-info success"></p>
                </form>
            </div>
            <div class="col-md-4"></div>
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
