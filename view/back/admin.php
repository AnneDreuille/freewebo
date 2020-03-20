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

        <div class="row">
            <!-- nommer un développeur -->
            <div class="col-md-4">
                <form action="index.php?action=assign" method="post" class="border pt-1 px-2 bg-light rounded">
                    <p class="text-info font-weight-bold text-center">Nommer 1 développeur sur un projet</p>
                    <div class="from-group row pb-2">
                        <div class="col">
                            <input type="text" name="name" id="nameProject" placeholder="Nom du projet" required class="form-control"/>
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
            <!-- mettre à jour les données d'un user -->
            <div class="col-md-4 border bg-warning">
                <p class='text-center'>formulaire pour mettre à jour<br/> les données d'un user</p>
            </div>

            <div class="col-md-4"></div>
        </div>
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
                                <td><?php echo($data['firstName']) ?></td>
                                <td><?php echo($data['lastName']) ?></td>
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
                                <td><?php echo($data['firstName']) ?></td>
                                <td><?php echo($data['lastName']) ?></td>
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
            <div class="col-sm-12">
                <div class="table-responsive-sm border">
                    <p class= "text-info text-center font-weight-bold">LISTE DES PROJETS</p>
                    <table class="table table-striped table-condensed small">
                        <thead>
                            <tr class="text-info">
                                <th>Nom projet</th>
                                <th>idClient</th>
                                <th>idDev</th>
                                <th>description</th>
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
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
