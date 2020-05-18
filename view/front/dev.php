<?php $title ="Espace Développeurs FreeWebo - Agence web solidaire"; ?>
<?php $metaDescription="Espace réservé aux développeurs pour échanger sur les créations de site web."; ?>
<?php $titlePage = 'Espace Développeurs FreeWebo&nbsp;!'; ?>
<?php $urlCanonical="https://freewebo.org/index.php?action=dev"; ?>

<?php ob_start(); ?>
    <div class="container-fluid">

        <!-- MESSAGERIE -->
        <div class="row">
            <!-- formulaire pour poster un message -->
            <div class ="offset-md-1 col-md-3">
                <button class="btn btn-warning btn-block font-weight-bold disabled">Ecrire un message ici&nbsp;!</button>
                <form action="<?php echo BASE_PATH;?>index.php?action=addMessage" method="post" class="border pt-1 px-2 bg-light rounded submitPost">
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

            <!-- afficher les messages -->
            <div class ="offset-md-1 col-md-6">
                <button class="btn btn-warning btn-block font-weight-bold disabled"><span class="far fa-comments fa-lg pr-2"></span>Messages</button>
                <!-- utilisation d'une liste de descriptions -->
                <div class="border rounded p-2 bg-light overflow-auto" id="listMessage">

                <?php foreach ($listMessageDev as $data) : ?>

                    <dl>
                        <dt class="text-capitalize"><?php echo htmlspecialchars($data['firstName']) ;?></dt>
                        <dd class="small text-primary font-italic"><?php echo 'Posté le '.htmlspecialchars($data['postDate_fr']) ;?></dd>
                        <dd class="text-justify"><?php echo $data['message'] ;?></dd>
                    </dl>

                <?php endforeach; ?>
                </div>
            </div>
        </div><br/><br/>

        <!-- bouton Retour à la page d'accueil-->
        <div class="row">
            <div class='col-md-4'>
                <a class="btn btn-lg btn-info btn-sm" href="<?php echo BASE_PATH;?>" role="button"><span class="fas fa-home pr-1"></span>Retour à la page d'accueil</a>
            </div>
        </div>

        <!-- Bouton back to the top -->
        <a href="#" class="fixed-action-btn smooth-scroll btn-floating btn-lg btn-info rounded-circle float-right"><span class="fas fa-arrow-circle-up"></span></a><br/><br/>

    </div><br/><br/> <!-- fin container -->

<?php $content= ob_get_clean();?>
<?php require(__DIR__.'/../templateHtml.php');
