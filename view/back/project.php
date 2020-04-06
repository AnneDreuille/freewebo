<?php $title ="FreeWebo - Administration Projet"; ?>
<?php $metaDescription="Suivi des projets du site freewebo.org - Agence Web solidaire&nbsp;!"; ?>
<?php $header = 'FreeWebo - Administration Projet'; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

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
                                <th>ratingClient</th>
                                <th>ratingDev</th>
                                <th>endDate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo htmlspecialchars($project['name']); ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($project['idClient']); ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($project['idDev']); ?></td>
                                <td><?php echo htmlspecialchars(substr($project['needDate_fr'],0,10)); ?></td>
                                <td><?php echo htmlspecialchars(substr($project['assignDate_fr'],0,10)); ?></td>
                                <td><?php echo htmlspecialchars(substr($project['modelDate_fr'],0,10)); ?></td>
                                <td><?php echo htmlspecialchars(substr($project['startDate_fr'],0,10)); ?></td>
                                <td><?php echo htmlspecialchars(substr($project['urlDate_fr'],0,10)); ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($project['ratingClient']); ?></td>
                                <td class="text-center"><?php echo htmlspecialchars($project['ratingDev']); ?></td>
                                <td><?php echo htmlspecialchars(substr($project['endDate_fr'],0,10)); ?></td>
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
                <small class= "xsmall"><?php echo $project['description']; ?></small>
            </div>
        </div>
<hr/>
        <!-- MISE A JOUR D'UN PROJET-->
        <div class="row">
            <!-- nommer un développeur -->
            <div class="col-md-4">
                <form action="index.php?action=assign&id=<?php echo htmlspecialchars($_GET['id']);?>" method="post" class="border pt-1 px-2 bg-light rounded">
                    <p class="text-info font-weight-bold text-center">Nommer 1 développeur sur le projet</p>
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
                            <input type="submit" value="Valider" class="btn btn-info font-weight-bold px-5" />
                        </div>
                    </div>
                </form>
            </div>
            <!-- acter la fin d'un projet -->
            <div class="col-md-3">
                <form action="index.php?action=endDate" method="post" class="border pt-1 px-2 bg-light rounded">
                    <p class="text-info font-weight-bold text-center">Acter la fin du projet</p>
                    <div class="form-group row">
                        <div class="col text-center">
                            <input type="submit" value="Valider" class="btn btn-info font-weight-bold px-5" />
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-5"></div>
        </div><br/>
<hr/>

        <!-- bouton Retour à la page d'accueil-->
        <div class="row">
            <div class="col-md-4">
                <a class="btn btn-lg btn-info btn-sm" href="index.php" role="button"><span class="fas fa-home pr-1"></span>Retour à la page d'accueil</a>
            </div>
        </div>

        <!-- bouton Retour à l'espace membre-->
        <div class="row mt-2">
            <div class='col-md-4'>
                <a class="btn btn-lg btn-success btn-sm" href="index.php?action=member&id=<?php echo htmlspecialchars($_GET['id']);?>" role="button"><span class="fas fa-campground pr-1"></span>Retour à l'espace membre</a>
            </div>
        </div>

        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-info rounded-circle float-right"><span class="fas fa-arrow-circle-up"></span></a>

    </div><br/><br/> <!-- fin container -->


<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
