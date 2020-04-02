<?php $title ="Espace membre FreeWebo - Agence web solidaire"; ?>
<?php $metaDescription="Parce que vous êtes gérant d'une association ou jeune créateur d'entreprise, l'espace membre FreeWebo vous permet de suivre la création de votre site web, réalisée gratuitement par un développeur bénévole&nbsp;!"; ?>
<?php $header = 'Bienvenue dans votre espace membre FreeWebo&nbsp;!'; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <!-- afficher prénom client, nom projet et prénom dév-->
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 btn-group">
                <!-- afficher le prénom du client -->
                <?php
                if (!empty ($client['firstName'])){;?>
                <button type="button" class="btn btn-success disabled rounded mr-2 text-capitalize">
                <?php echo htmlspecialchars($client['firstName']); ?></button>
                <?php
                } else {; ?>
                <button type="button" class="btn btn-outline-dark disabled rounded mr-2 text-capitalize">
                <?php echo 'prénom client'; ?></button>
                <?php
                }
                ?>

                <!-- afficher le nom du projet -->
                <?php
                if (!empty ($dataProject['name'])){; ?>
                <button type="button" class="btn btn-success disabled rounded mr-2 text-capitalize">
                <?php echo htmlspecialchars($dataProject['name']); ?></button>
                <?php
                } else {; ?>
                <button type="button" class="btn btn-outline-dark disabled rounded mr-2 text-capitalize">
                <?php echo 'nom projet'; ?></button>
                <?php
                }
                ?>

                <!-- afficher le prénom du développeur -->
                <?php
                if (!empty ($dev['firstName'])) {;?>
                <button type="button" class="btn btn-success disabled rounded mr-2 text-capitalize">
                <?php echo htmlspecialchars($dev['firstName']); ?></button>
                <?php
                } else {; ?>
                <button type="button" class="btn btn-outline-dark disabled rounded mr-2 text-capitalize">
                <?php echo 'prénom dev'; ?></button>
                <?php
                }
                ?>
            </div>
            <div class="col-md-3"></div>
        </div><br/><br/>

        <!-- afficher les boutons & images du process -->
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="btn-group align-items-end" role="group">
                    <!-- 1. Je décris le besoin  -->
                    <div>
                        <div class="mb-1"><img src="public/images/1.process.jpg" alt="process étape1"/></div>
                        <?php if ($dataProject['needDate_fr'] !== null) {; ?>
                            <a href="index.php?action=need"><button type="button" class="btn btn-success rounded mr-2 px-1">1. Je décris le besoin</button></a>
                        <?php } else {; ?>
                            <a href="index.php?action=need" data-toggle="tooltip" data-placement="top" title="Clic pour définir le besoin"><button type="button" class="btn btn-success rounded mr-2 px-1">1. Je décris le besoin</button></a>
                        <?php };?>
                        <div>
                        <?php if ($dataProject['needDate_fr'] !== null) {; ?>
                            <span class="far fa-check-circle fa-2x text-success pt-2"></span>
                        <?php } else {; ?>
                            <span class="fas fa-tools fa-2x text-muted pt-2"></span>
                        <?php };?>
                        </div>
                    </div>
                    <!-- 2. Recherche développeur  -->
                    <div>
                        <div class="mb-1"><img src="public/images/2.process.jpg" alt="process étape2"/></div>
                        <a href=#><button type="button" class="btn btn-warning disabled rounded mr-2 px-1">2. Recherche développeur</button></a>
                        <div>
                        <?php if ($dataProject['assignDate_fr'] !== null) {; ?>
                            <span class="far fa-check-circle fa-2x text-success pt-2"></span>
                        <?php } else {; ?>
                            <span class="fas fa-tools fa-2x text-muted pt-2"></span>
                        <?php };?>
                        </div>
                    </div>
                    <!-- 3. Dépôt modèle -->
                    <div>
                        <div class="mb-1"><img src="public/images/3.process.png" alt="process étape3"/></div>
                        <?php if($dataProject['modelDate_fr']===null){;?>
                        <a href=#><button type="button" class="btn btn-primary disabled rounded mr-2 px-1">3. Dépôt modèle</button></a>
                        <?php } else {;?>
                        <a href="public/uploads/<?php echo $dataProject['modelFile'];?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Clic pour voir le fichier"><button type="button" class="btn btn-primary disabled rounded mr-2 px-1">3. Dépôt modèle</button></a>
                        <?php };?>
                        <div>
                        <?php if ($dataProject['modelDate_fr'] !== null) {; ?>
                            <span class="far fa-check-circle fa-2x text-success pt-2">
                            </span>
                        <?php } else {; ?>
                            <span class="fas fa-tools fa-2x text-muted pt-2"></span>
                        <?php };?>
                        </div>
                    </div>
                    <!-- 4. Je valide le modèle -->
                    <div>
                        <div class="mb-1"><img src="public/images/4.process.png" alt="process étape4"/></div>
                        <?php if ($dataProject['startDate_fr'] !== null) {; ?>
                        <a href="index.php?action=validModel"><button type="button" class="btn btn-success rounded mr-2 px-1">4. Je valide le modèle</button></a>
                        <?php } else {; ?>
                        <a href="index.php?action=validModel" data-toggle="tooltip" data-placement="top" title="Clic pour valider le modèle"><button type="button" class="btn btn-success rounded mr-2 px-1">1. Je valide le modèle</button></a>
                        <?php };?>
                        <div>
                        <?php if ($dataProject['startDate_fr'] !== null) {; ?>
                            <span class="far fa-check-circle fa-2x text-success pt-2"></span>
                        <?php } else {; ?>
                            <span class="fas fa-tools fa-2x text-muted pt-2"></span>
                        <?php };?>
                        </div>
                    </div>
                    <!-- 5. Dépôt URL -->
                    <div>
                        <div class="mb-1"><img src="public/images/5.process.jpg" alt="process étape5"/></div>
                        <?php if($dataProject['urlDate_fr']===null){;?>
                        <a href=#><button type="button" class="btn btn-primary disabled rounded mr-2 px-1">5. Dépôt URL</button></a>
                        <?php } else {;?>
                        <a href="<?php echo $dataProject['urlName'];?>" target="_blank" data-toggle="tooltip" data-placement="top" title="Clic pour voir l'URL"><button type="button" class="btn btn-primary disabled rounded mr-2 px-1">5. Dépôt URL</button></a>
                        <?php };?>
                        <div>
                        <?php if ($dataProject['urlDate_fr'] !== null) {; ?>
                            <span class="far fa-check-circle fa-2x text-success pt-2"></span>
                        <?php } else {; ?>
                            <span class="fas fa-tools fa-2x text-muted pt-2"></span>
                        <?php };?>
                        </div>
                    </div>
                    <!-- 6. Notations -->
                    <div>
                        <div class="mb-1"><img src="public/images/6.process.jpg" alt="process étape6"/></div>
                        <a href=#><button type="button" class="btn btn-warning rounded mr-2 px-1">6. Notations</button></a>
                        <div>
                        <?php if ($dataProject['endDate_fr'] !== null) {; ?>
                            <span class="far fa-check-circle fa-2x text-success pt-2"></span>
                        <?php } else {; ?>
                            <span class="fas fa-tools text-muted fa-2x pt-2"></span>
                        <?php };?>
                        </div>
                    </div>
                </div>
            </div>
        </div><br/><br/>

        <!-- FORMULAIRES POUR DEVELOPPEUR CACHES AU CLIENT-->
        <?php
        if (!empty($_SESSION['userType']) && ($_SESSION['userType']==='client') ){
        echo '';
        } else {?>
        <div class="row">
            <!-- DEV déposer le fichier du modèle -->
            <div class="col-md-4">
                <form action="index.php?action=modelFile&id=<?php echo htmlspecialchars($dataProject['id']);?>" method="post" enctype="multipart/form-data" class="border pt-1 px-2 bg-light rounded">
                    <p class="text-info font-weight-bold text-center">Déposer le fichier du modèle</p>
                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <span class="input-group-text small" aria-label="trombone"><span class="fas fa-paperclip"></span></span>
                                <input type="file" name="modelFile" required class="form-control text-lowercase"/>
                            </div>
                            <p><small id="helpName" class="form-text xsmall italic pb-0">Ex. nom de fichier pour le projet dont l'id=3: P3_modelFile.<br/>Préférer un format image lisible par tous.</small></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col text-center">
                            <input type="submit" value="Valider" id="submit" class="btn btn-secondary font-weight-bold px-5 submit" />
                        </div>
                    </div>
                </form>
            </div>
            <!-- DEV déposer l'URL du site créé -->
            <div class="col-md-3">
                <form action="index.php?action=urlName&id=<?php echo htmlspecialchars($dataProject['id']);?>" method="post" class="border pt-1 px-2 bg-light rounded">
                    <p class="text-info font-weight-bold text-center">Déposer l'URL du site créé</p>
                    <div class="form-group row">
                        <div class="col">
                            <div class="input-group-prepend">
                                <span class="input-group-text small" aria-label="url"><span class="fas fa-link"></span></span>
                                <input type="basic-url" name="urlName" required class="form-control text-lowercase"/>
                            </div>
                            <p><small id="helpName" class="form-text xsmall italic pb-0">URL commençant par https://</small></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col text-center">
                            <input type="submit" value="Valider" id="submit" class="btn btn-secondary font-weight-bold px-5 submit" />
                        </div>
                    </div>
                </form>
            </div>
            <!-- DEV donner 1 note au client -->
            <div class="col-md-3">
                <form action="index.php?action=ratingClient" method="post" class="border pt-1 px-5 bg-light rounded">
                    <p class="text-info font-weight-bold text-center">Evaluer le client</p>
                    <div class="form-group row">
                        <div class="col ratingClient d-flex flex-row-reverse h2 justify-content-around">
                            <input type="radio" id="5-stars" name="ratingClient" value="5" />
                            <label for="5-stars" class="star">&#9733;</label>
                            <input type="radio" id="4-stars" name="ratingClient" value="4" />
                            <label for="4-stars" class="star">&#9733;</label>
                            <input type="radio" id="3-stars" name="ratingClient" value="3" />
                            <label for="3-stars" class="star">&#9733;</label>
                            <input type="radio" id="2-stars" name="ratingClient" value="2" />
                            <label for="2-stars" class="star">&#9733;</label>
                            <input type="radio" id="1-star" name="ratingClient" value="1" />
                            <label for="1-star" class="star">&#9733;</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php };?>

        <!-- FORMULAIRE NOTATION POUR CLIENT CACHE AU DEV-->
        <?php
        if (!empty($_SESSION['userType']) && ($_SESSION['userType']==='dev') && (empty($dataProject['urlDate_fr']))) {
            echo '';
        } else {?>
        <div class="row">
            <!-- CLIENT donner 1 note au dev -->
            <div class="offset-md-7 col-md-3">
                <form action="index.php?action=ratingDev" method="post" class="border pt-1 px-5 bg-light rounded">
                    <p class="text-info font-weight-bold text-center">Evaluer le développeur</p>
                    <div class="form-group row">
                        <div class="col ratingDev d-flex flex-row-reverse h2 justify-content-around">
                            <input type="radio" id="5-stars" name="ratingDev" value="5" />
                            <label for="5-stars" class="star">&#9733;</label>
                            <input type="radio" id="4-stars" name="ratingDev" value="4" />
                            <label for="4-stars" class="star">&#9733;</label>
                            <input type="radio" id="3-stars" name="ratingDev" value="3" />
                            <label for="3-stars" class="star">&#9733;</label>
                            <input type="radio" id="2-stars" name="ratingDev" value="2" />
                            <label for="2-stars" class="star">&#9733;</label>
                            <input type="radio" id="1-star" name="ratingDev" value="1" />
                            <label for="1-star" class="star">&#9733;</label>
                        </div>
                    </div>
                </form>
            </div>
        </div><br/><br/>
        <?php };?>

        <!-- MESSAGERIE -->
        <div class="row">
            <!-- formulaire pour poster un message -->
            <div class ="col-md-3 offset-md-1">
                <button class="btn btn-warning btn-block font-weight-bold disabled">Ecrire un message ici&nbsp;!</button>
                <form action="" method="post" class="border pt-1 px-2 bg-light rounded">
                    <div class="form-group row">
                        <div class="col">
                            <input type="text" id="firstName" name="firstName" required placeholder="Votre prénom" class="form-control text-capitalize" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <textarea id="message" name="message"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col text-center">
                            <input type="submit" value="Poster" class="btn btn-warning font-weight-bold px-5" />
                        </div>
                    </div>
                </form>
            </div>

            <!-- afficher les derniers posts -->
            <div class ="col-md-5 offset-md-1">
                <button class="btn btn-warning btn-block font-weight-bold disabled"><span class="far fa-comments fa-lg pr-2"></span>Messages</button>
                <!-- utilisation d'une liste de descriptions -->
                <div class="border rounded p-2 bg-light">
                    <dl>
                        <dt class="text-capitalize">prénom</dt>
                        <dd class="small text-primary font-italic">Posté le...</dd>
                        <dd class="text-justify">message</dd>
                    </dl>
                </div>
            </div>

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
