<?php $title ="S'inscrire sur freewebo.org - Agence Web solidaire"; ?>
<?php $metaDescription="S'inscrire à FreeWebo pour demander la création de votre site web gratuitement... ou pour être développeur bénévole&nbsp;!"; ?>
<?php $header = 'Inscrivez-vous sur le site FreeWebo&nbsp;!'; ?>

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
                <p class="small italic text-center text-info font-weight-bold">
                <?php
                if ($error===true){
                    echo $alert;
                } elseif ($error===false){
                    echo 'Super ! Vous êtes maintenant inscrit(e).';
                }
                ?>
                </p>
                <!-- afficher le formulaire d'INSCRIPTION à remplir -->
                <form action="index.php?action=signUp" method="post" class="border px-3 py-3 bg-light rounded">
                    <div>
                        <p class="mb-0 text-info font-weight-bold">Qui êtes-vous&nbsp;?</p>
                        <div class="form-check">
                            <input type="radio" id="radio1" name="userType" value="client" class="form-check-input"
                            <?php if (isset($_POST['userType']) && $_POST['userType'] === 'client') {
                                echo 'checked';}?> />
                            <label for="radio1" class="form-check-label">Gérant association ou créateur entreprise</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="radio2" name="userType" value="dev" class="form-check-input"
                            <?php if (isset($_POST['userType']) && $_POST['userType'] === 'dev') {
                                echo 'checked';}?>/>
                            <label for="radio2" class="form-check-label">Développeur bénévole</label>
                        </div>
                    </div>

                    <div class="form-group row mt-3">
                        <div class="col">
                            <input type="text" name="lastName" id="lastName" placeholder="Nom" required class="form-control text-uppercase" value="<?php if (isset($_POST['lastName'])){echo htmlspecialchars($_POST['lastName']);} ?>" />
                        </div>
                        <div class="col">
                            <input type="text" name="firstName" id="firstName" placeholder="Prénom" required class="form-control text-capitalize" value="<?php if (isset($_POST['firstName'])){echo htmlspecialchars($_POST['firstName']);} ?>" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <span class="input-group-text" aria-label="arobase">@</span>
                                <input type="email" name="mail" id="mail" placeholder="monmail@exemple.com" required class="form-control text-lowercase" value="<?php if (isset($_POST['mail'])){echo htmlspecialchars($_POST['mail']);} ?>" />
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <span class="input-group-text" aria-label="tel"><span class="fas fa-phone"></span></span>
                                <input type="tel" name="phone" id="phone" placeholder="0X XX XX XX XX" class="form-control" value="<?php if (isset($_POST['phone'])){echo htmlspecialchars($_POST['phone']);} ?>" />
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
                <a class="btn btn-lg btn-info btn-sm" href="index.php" role="button"><span class="fas fa-home pr-1"></span>Retour à la page d'accueil</a>
            </div>
        </div>

        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-info rounded-circle float-right"><span class="fas fa-arrow-circle-up"></span></a>

    </div><br/><br/> <!-- fin container -->


<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
