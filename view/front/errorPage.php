<?php $title ="FreeWebo.org - Agence Web solidaire"; ?>
<?php $metaDescription="FreeWebo est une agence web solidaire qui crée gratuitement des sites web pour des associations ou jeunes créateurs d'entreprise, en faisant appel à des développeurs bénévoles&nbsp;!"; ?>
<?php $header = 'FreeWebo.org - Agence Web solidaire'; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-3"></div>

            <div class="col-md-6">
                <p class="text-center bg-info rounded text-white py-3 h5">Oups ! vous vous êtes perdu(e).<br/> Pas de souci : vous pouvez revenir à la page d'accueil<br/> ou dans votre espace membre si vous êtes incrit(e).</p>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
            <!-- <div class="col-md-2"></div> -->

            <div class="col-md-12 text-center">
                <img src="public/images/errorPage.jpg" alt="errorPage"/>
            </div>

            <!-- <div class="col-md-2"></div> -->
        </div><br/>


        <!-- bouton Retour à l'espace membre-->
        <?php if (!empty($_SESSION ['userType']) && $_SESSION ['userType']==="admin") {
              echo '';
              } elseif (empty($_SESSION ['userType'])) {
                echo '';
                } else {?>
        <div class="row">
            <div class='col-md-3'>
                <a class="btn btn-lg btn-success btn-sm" href="index.php?action=member" role="button"><span class="fas fa-campground pr-1"></span>Retour à l'espace membre</a>
            </div>
        </div><br/>
        <?php }?>

        <!-- bouton Retour à la page d'accueil-->
        <div class="row">
            <div class='col-md-4'>
                <a class="btn btn-lg btn-info btn-sm" href="index.php" role="button"><span class="fas fa-home pr-1"></span>Retour à la page d'accueil</a>
            </div>
        </div><br/>

        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-info rounded-circle float-right"><span class="fas fa-arrow-circle-up"></span></a><br/><br/>


    </div><br/><br/> <!-- fin container -->


<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
