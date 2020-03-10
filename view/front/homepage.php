<?php $title ="FreeWebo - Agence web solidaire"; ?>
<?php $metaDescription="FreeWebo est une agence web solidaire qui crée gratuitement des sites web pour des associations ou jeunes créateurs d'entreprise, en faisant appel à des développeurs bénévoles&nbsp;!"; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <header class="card-header">
            <h1 class="text-center page-header text-info"><img src="public/images/logo.png" alt="logo"/><strong> Bienvenue sur le site FreeWebo&nbsp;!</strong>
            </h1>
        </header>

        <div class="row">

            <div class="col-xs-12 col-md-6">
                <!-- formulaire se connecter -->
                <!-- <form action="action=/signIn.php" method="post">
                    <fieldset class="form-group">
                        <label for="email">Mail</label>
                        <input type="email" name="email" value="mail" placeholder="monmail@exemple.com" required/><br/>

                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" value="password" required/><br/>
                    </fieldset>

                    <input type="submit" value="signIn" id="submit" class="btn btn-success" >Se connecter<br/>
                </form> -->
            </div>
        </div><br/>

    <!-- Bouton back to the top -->
    <!-- <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-primary pull-right"><span class="glyphicon glyphicon-arrow-up"></span></a> -->

    </div><br/><br/> <!-- fin container -->


<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
