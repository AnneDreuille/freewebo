<?php $title ="S'inscrire sur freewebo.org - Agence Web solidaire"; ?>
<?php $metaDescription="S'inscrire à FreeWebo pour demander la création de votre site web gratuitement... ou pour être développeur bénévole&nbsp;!"; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <h1 class="text-center page-header text-primary"><strong>"S'inscrire"</strong>
        <!-- <p><img src="public/images/logo.jpg" alt="logo"/></p> -->
        <p>Une fois inscrit, vous pourrez demander la création de votre site web gratuitement&nbsp;!</p>
        <p>Si vous êtes développeur, vous pourrez être bénévole sur un projet&nbsp;!</p></h1>

        <!-- bouton Retour à la page d'accueil-->
        <!-- <a class="btn btn-lg btn-info" href="index.php" role="button"><span class="glyphicon glyphicon-circle-arrow-left"></span> Retour à la page d'accueil</a><br/><br/> -->


        <div class="row">
            <div class="col-xs-12 col-md-6">

                <!-- afficher le formulaire d'INSCRIPTION à remplir -->
                <form action="action=/signUp.php" method="post">
                    <fieldset class="form-check">
                        <legend>Qui êtes-vous&nbsp;?</legend>

                        <input type="radio" id="client1" name="userType" value="client" class="form-check-input" /><br/>
                        <label for="client1" class="form-check-label">Gérant d'une association</label>

                        <input type="radio" id="client2" name="userType" value="client" class="form-check-input" /><br/>
                        <label for="client2" class="form-check-label">Jeune créateur d'entreprise</label>

                        <input type="radio" id="dev" name="userType" value="dev" class="form-check-input" /><br/>
                        <label for="dev" class="form-check-label">Développeur bénévole</label>
                    </fieldset>

                    <fieldset class="form-group form-inline">
                        <label for="lastName">Nom</label>
                        <input type="text" name="lastName" id="lastName" value="lastName" required/><br/>

                        <label for="firstName">Prénom</label>
                        <input type="text" name="firstName" id="firstName" value="firstName" required/><br/>
                    </fieldset>

                    <fieldset class="form-group">
                        <label for="email">Mail</label>
                        <input type="email" name="email" value="mail" placeholder="monmail@exemple.com" required/><br/>

                        <label for="tel">Tél.</label>
                        <input type="tel" name="tel" value="phone" placeholder="0x xx xx xx xx" /><br/>

                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" value="password" required/><br/>
                    </fieldset>

                    <input type="submit" value="signUp" id="submit" class="btn btn-success" >Valider<br/>
                </form>

            </div>
        </div><br/>

    <!-- Bouton back to the top -->
    <!-- <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-arrow-up"></span></a> -->

    </div><br/><br/> <!-- fin container -->

    <!-- bouton Retour à la page d'accueil-->
    <!-- <a class="btn btn-lg btn-info" href="index.php" role="button"><span class="glyphicon glyphicon-circle-arrow-left"></span> Retour à la page d'accueil</a><br/><br/> -->



<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
