<?php $title ="FreeWebo - Administration Projet"; ?>
<?php $metaDescription="Suivi des projets du site freewebo.org - Agence Web solidaire&nbsp;!"; ?>
<?php $header = 'FreeWebo - Administration Projet'; ?>

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

        <div class="row">
            <!-- nommer un développeur -->
            <div class="col-md-4">
                <form action="index.php?action=assign&id=<?php echo $_GET['id'];?>" method="post" class="border pt-1 px-2 bg-light rounded">
                    <p class="text-info font-weight-bold text-center">Nommer 1 développeur sur un projet</p>
                    <div class="from-group row pb-2">
                        <div class="col">
                            <input type="text" name="name" id="nameProject" placeholder="Nom du projet" required class="form-control text-capitalize"/>
                        </div>
                    </div>
                    <div class="from-group row">
                        <div class="col">
                            <input type="text" name="lastName" id="lastName" placeholder="Nom" required class="form-control text-uppercase"/>
                        </div>
                        <div class="col">
                            <input type="text" name="firstName" id="firstName" placeholder="Prénom" required class="form-control text-capitalize"/>
                        </div>
                    </div><br/>
                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <span class="input-group-text" aria-label="arobase">@</span>
                                <input type="email" name="mail" id="mail" placeholder="mail du développeur" required class="form-control text-lowercase"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col text-center">
                            <input type="submit" value="Valider" id="submit" class="btn btn-info font-weight-bold px-5 submit" />
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
        </div><br/>

<!-- DETAIL D'UN PROJET-->
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive-sm border">
                    <p class= "text-info text-center font-weight-bold">DETAIL D'UN PROJET</p>
                    <table class="table table-striped table-condensed small">
                        <thead>
                            <tr class="text-info">
                                <th>Nom projet</th>
                                <th>idClient</th>
                                <th>idDev</th>
                                <th>needDate</th>
                                <th>assignDate</th>
                                <th>modelDate</th>
                                <th>startDate</th>
                                <th>urlDate</th>
                                <th>endDate</th>
                                <th>ratingClient</th>
                                <th>ratingDev</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo($project['name']) ?></td>
                                <td><?php echo($project['idClient']) ?></td>
                                <td><?php echo($project['idDev']) ?></td>
                                <td><?php echo(substr($project['needDate_fr'],0,10)) ?></td>
                                <td><?php echo(substr($project['assignDate_fr'],0,10)) ?></td>
                                <td><?php echo(substr($project['modelDate_fr'],0,10)) ?></td>
                                <td><?php echo(substr($project['startDate_fr'],0,10)) ?></td>
                                <td><?php echo(substr($project['urlDate_fr'],0,10)) ?></td>
                                <td><?php echo(substr($project['endDate_fr'],0,10)) ?></td>
                                <td><?php echo($project['ratingClient']) ?></td>
                                <td><?php echo($project['ratingDev']) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div><br/>
        <!-- Description du projet -->
        <div class="row">
            <div class="col-sm-10">
                <p class= "text-info font-weight-bold mb-1">Description du projet</p>
                <small class= "xsmall"><?php echo($project['description']) ?></small>
            </div>
        </div>
<hr/>

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
