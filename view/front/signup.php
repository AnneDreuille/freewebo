<?php $title ="S'inscrire sur freewebo.org - Agence Web solidaire"; ?>
<?php $metaDescription="S'inscrire à FreeWebo pour demander la création de votre site web gratuitement... ou pour être développeur bénévole&nbsp;!"; ?>
<?php $titlePage = 'Inscrivez-vous sur le site FreeWebo&nbsp;!'; ?>
<?php $urlCanonical="https://freewebo.org/index.php?action=signUp"; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4"></div>

            <div class="col-md-4">
                <p class="text-center bg-info rounded text-white py-3">Une fois inscrit, vous pourrez demander la création de votre site web gratuitement&nbsp;!<br/>Si vous êtes développeur, vous pourrez être bénévole sur un projet&nbsp;!</p>
            </div>
            <div class="col-md-4"></div>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <!-- afficher les messages : erreur ou succès -->
                <p class="italic text-center text-info font-weight-bold">
                <?php
                if ($error===true):
                    echo $alert;
                elseif ($error===false):
                    echo "Super ! Vous êtes maintenant inscrit(e).";?><br/><?php echo "Sur la page d'accueil, vous pouvez désormais vous connecter à votre espace membre en indiquant mail et mot de passe.";
                endif; ?>
                </p>
                <!-- afficher le formulaire d'INSCRIPTION à remplir -->
                <form action="<?php echo BASE_PATH;?>index.php?action=signUp" method="post" class="border px-3 py-3 bg-light rounded">
                    <div>
                        <p class="mb-0 text-info font-weight-bold">Qui êtes-vous&nbsp;?</p>
                        <div class="form-check">
                            <input type="radio" id="radio1" name="userType" value="client" class="form-check-input"
                            <?php if (!empty($_POST['userType']) && $_POST['userType'] === 'client') :
                                echo 'checked';
                            endif;?> />
                            <label for="radio1" class="form-check-label">Créateur entreprise ou Gérant association</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="radio2" name="userType" value="dev" class="form-check-input"
                            <?php if (!empty($_POST['userType']) && $_POST['userType'] === 'dev') :
                                echo 'checked';
                                endif;?>/>
                            <label for="radio2" class="form-check-label">Développeur bénévole</label>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col">
                            <input type="text" name="lastName" id="lastName" title="Nom" placeholder="Nom" required class="form-control text-uppercase" value="<?php if (!empty($_POST['lastName'])):
                                echo htmlspecialchars($_POST['lastName']);
                            endif; ?>" />
                        </div>
                        <div class="col">
                            <input type="text" name="firstName" id="firstName" title="Prénom" placeholder="Prénom" required class="form-control text-capitalize" value="<?php if (!empty($_POST['firstName'])):
                                echo htmlspecialchars($_POST['firstName']);
                            endif; ?>" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <span class="input-group-text" aria-label="arobase">@</span>
                                <input type="email" name="mail" id="mail" title="mail" placeholder="monmail@exemple.com" required class="form-control text-lowercase" value="<?php if (!empty($_POST['mail'])):
                                    echo htmlspecialchars($_POST['mail']);
                                endif; ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <span class="input-group-text" aria-label="tel"><span class="fas fa-phone"></span></span>
                                <input type="tel" name="phone" id="phone" title="tel" placeholder="0X XX XX XX XX" class="form-control" value="<?php if (!empty($_POST['phone'])):
                                    echo htmlspecialchars($_POST['phone']);
                                else :
                                    echo '';
                                endif; ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <span class="input-group-text" aria-label="password"><span class="fas fa-lock"></span></span>
                                <input type="password" name="password" id="password" placeholder="******" title="password" data-toggle="password" required class="form-control"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col text-center">
                            <input type="submit" value="Valider" class="btn btn-info font-weight-bold px-5"/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div><br/>


        <!-- bouton Retour à la page d'accueil-->
        <div class="row">
            <div class='col-md-4'>
                <a class="btn btn-lg btn-info btn-sm" href="<?php echo BASE_PATH;?>" role="button"><span class="fas fa-home pr-1"></span>Retour à la page d'accueil</a>
            </div>
        </div>

        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-info rounded-circle float-right"><span class="fas fa-arrow-circle-up"></span></a><br/><br/>

    </div><br/><br/> <!-- fin container -->


<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
