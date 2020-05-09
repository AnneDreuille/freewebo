<?php $title ="FreeWebo - Administration Projet"; ?>
<?php $metaDescription="Suivi des utilisateurs du site freewebo.org - Agence Web solidaire&nbsp;!"; ?>
<?php $titlePage = 'FreeWebo - Administration User'; ?>
<?php $urlCanonical="https://freewebo.org/index.php?action=user"; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <!-- AFFICHER LES DONNEES D'UN USER POUR MISE A JOUR-->
        <div class="row">
            <div class="offset-md-4 col-md-4">
                <form action="index.php?action=updateUser&id=<?php echo htmlspecialchars($_GET['id']);?>" method="post" class="border pt-1 px-2 bg-light rounded">
                    <p class="text-info font-weight-bold text-center">Mettre à jour un utilisateur</p>
                    <!-- nom & prénom -->
                    <div class="form-group row mt-3">
                        <div class="col">
                            <input type="text" name="lastName" id="lastName" class="form-control text-uppercase" value="<?php echo htmlspecialchars($getUser['lastName']);?>" />
                        </div>
                        <div class="col">
                            <input type="text" name="firstName" id="firstName" class="form-control text-capitalize" value="<?php echo htmlspecialchars($getUser['firstName']);?>" />
                        </div>
                    </div>
                    <!-- mail -->
                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <span class="input-group-text" aria-label="arobase">@</span>
                                <input type="email" name="mail" id="mail" required class="form-control text-lowercase" value="<?php echo htmlspecialchars($getUser['mail']);?>" />
                            </div>
                        </div>
                    </div>
                    <!-- phone -->
                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <span class="input-group-text" aria-label="tel"><span class="fas fa-phone"></span></span>
                                <input type="tel" name="phone" id="phone" class="form-control" value="<?php echo htmlspecialchars($getUser['phone']);?>" />
                            </div>
                        </div>
                    </div>
                    <!-- password -->
                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <span class="input-group-text" aria-label="password"><span class="fas fa-lock"></span></span>
                                <input type="text" name="password" id="password" class="form-control xsmall" />
                            </div>
                        </div>
                    </div>
                    <!-- checkbox blacklist -->
                    <div class="form-group row">
                        <div class="col">
                            <div class="form-check pl-4">
                                <input type="checkbox" id="blacklist" name="blacklist" class="form-check-input mt-2"
                                <?php if ($getUser['blacklist'] === "1") :
                                    echo 'checked';
                                endif;?> />
                                <label for="blacklist" class="form-check-label">cocher pour blacklister l'utilisateur</label>
                            </div>
                        </div>
                    </div>
                    <!-- bouton valider -->
                    <div class="form-group row">
                        <div class="col text-center">
                            <input type="submit" value="Valider" class="btn btn-info font-weight-bold px-5"/>
                        </div>
                    </div>
                </form>
            </div>
        </div><br/><br/>

        <!-- bouton Retour à la page d'accueil-->
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-lg btn-info btn-sm" href="<?php echo BASE_PATH;?>" role="button"><span class="fas fa-home pr-1"></span>Retour à la page d'accueil</a>
            </div>
        </div>

        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-info rounded-circle float-right"><span class="fas fa-arrow-circle-up"></span></a><br/><br/>

    </div><br/><br/> <!-- fin container -->


<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
