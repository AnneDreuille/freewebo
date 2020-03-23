<?php $title ="Espace Administration freewebo.org - Agence Web solidaire"; ?>
<?php $metaDescription="Espace administration du site freewebo.org - Agence Web solidaire&nbsp;!"; ?>
<?php $header = 'Espace Administration FreeWebo'; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <!-- bouton Retour à la page d'accueil-->
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-lg btn-info btn-sm" href="/freewebo" role="button"><span class="fas fa-home"></span> Retour à la page d'accueil</a>
            </div>
        </div>

        <!-- bouton Retour à l'espace membre-->
        <div class="row my-2">
            <div class='col-md-4'>
                <a class="btn btn-lg btn-success btn-sm" href="index.php?action=member" role="button"><span class="fas fa-campground"></span> Retour à l'espace membre</a>
            </div>
        </div>

        <!-- mettre à jour les données d'un user -->
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div><br/>
<hr/>
        <!-- liste USERS-->
        <div class="row">
            <!-- liste CLIENTS-->
            <div class="col-sm-6">
                <div class="table-responsive-sm border">
                    <p class= "text-info text-center font-weight-bold">LISTE DES CLIENTS</p>
                    <table class="table table-striped table-condensed small">
                        <thead>
                            <tr class="text-info">
                                <th>id</th>
                                <th>prénom</th>
                                <th>nom</th>
                                <th class="text-center">mail</th>
                                <th>phone</th>
                                <th>signUpDate</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($listClient as $data) {
                        ?>
                            <tr class="xsmall" >
                                <td><?php echo($data['id']) ?></td>
                                <td class="text-capitalize"><?php echo($data['firstName']) ?></td>
                                <td class="text-uppercase"><?php echo($data['lastName']) ?></td>
                                <td><?php echo($data['mail']) ?></td>
                                <td><?php echo($data['phone']) ?></td>
                                <td><?php echo(substr($data['signUpDate_fr'],0,10)) ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- liste DEVS-->
            <div class='col-sm-6'>
                <div class="table-responsive-sm border">
                    <p class= "text-info text-center font-weight-bold">LISTE DES DEVS</p>
                    <table class="table table-striped table-condensed small">
                        <thead>
                            <tr class="text-info">
                                <th>id</th>
                                <th>prénom</th>
                                <th>nom</th>
                                <th class="text-center">mail</th>
                                <th>phone</th>
                                <th>signUpDate</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($listDev as $data) {
                        ?>
                            <tr class="xsmall" >
                                <td><?php echo($data['id']) ?></td>
                                <td class="text-capitalize"><?php echo($data['firstName']) ?></td>
                                <td class="text-uppercase"><?php echo($data['lastName']) ?></td>
                                <td><?php echo($data['mail']) ?></td>
                                <td><?php echo($data['phone']) ?></td>
                                <td><?php echo(substr($data['signUpDate_fr'],0,10)) ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br/>

        <!-- liste PROJETS-->
        <div class="row">
            <div class="col-sm-4">
                <div class="table-responsive-sm border">
                    <p class= "text-info text-center font-weight-bold">LISTE DES PROJETS</p>
                    <table class="table table-striped table-condensed small">
                        <thead>
                            <tr class="text-info">
                                <th>id projet</th>
                                <th>Nom projet</th>
                                <th>idClient</th>
                                <th>idDev</th>
                                <th>lien</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($listProject as $data) {
                        ?>
                            <tr>
                                <td><?php echo($data['id']) ?></td>
                                <td><?php echo($data['name']) ?></td>
                                <td><?php echo($data['idClient']) ?></td>
                                <td><?php echo($data['idDev']) ?></td>
                                <td class="text-center"><a href="index.php?action=project&id=<?php echo $data['id'];?>" role="button" class="fas fa-share btn-info"></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br/>

        <!-- bouton Retour à la page d'accueil-->
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-lg btn-info btn-sm" href="/freewebo" role="button"><span class="fas fa-home"></span> Retour à la page d'accueil</a>
            </div>
        </div>

        <!-- bouton Retour à l'espace membre-->
        <div class="row mt-2">
            <div class='col-md-4'>
                <a class="btn btn-lg btn-success btn-sm" href="index.php?action=member" role="button"><span class="fas fa-campground"></span> Retour à l'espace membre</a>
            </div>
        </div>

        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-info rounded-circle float-right"><span class="fas fa-arrow-circle-up"></span></a>

    </div><br/><br/> <!-- fin container -->


<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
