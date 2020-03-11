<?php $title ="FreeWebo - Agence web solidaire"; ?>
<?php $metaDescription="FreeWebo est une agence web solidaire qui crée gratuitement des sites web pour des associations ou jeunes créateurs d'entreprise, en faisant appel à des développeurs bénévoles&nbsp;!"; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <header class="card-header rounded">
            <h1 class="text-center page-header text-info"><img src="public/images/logo.png" alt="logo"/><strong> Bienvenue sur le site FreeWebo&nbsp;!</strong>
            </h1>
        </header><br/>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <p class="text-center bg-info rounded text-white py-3">FreeWebo est une agence web solidaire<br/> qui crée des sites web gratuitement<br/> pour des associations<br/>et des jeunes créateurs d'entreprise,<br/>avec l'aide de développeurs bénévoles</p>
            </div>

            <div class="offset-md-1 col-md-3">
                <!-- formulaire pour se connecter -->
                <form method="post">
                    <div class="form-group small mb-1">
                        <legend class="italic font-weight-bold text-info small">Espace membre</legend>
                        <input type="email" name="email" placeholder="monmail@exemple.com" required class="px-3" />
                        <input type="password" name="password" value="password" required class="px-3"/>
                    </div>
                    <input type="submit" value="Se connecter" id="submit" class="btn btn-info btn-sm small" />
                </form>
                <div>
                    <!-- bouton pour s'inscrire -->
                    <p class="small italic font-weight-bold text-info mt-3 mb-0">Pas encore inscrit&nbsp;?</p>
                    <a class="btn btn-sm btn-info small" href="view/front/signUp.php" role="button">S'inscrire</a>
                </div>
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
