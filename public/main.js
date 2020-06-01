//ACTUALISER LES MESSAGES POSTES PAR PLUSIEURS USERS

//détecter validation formulaire avec classe submitPost
$('.submitPost').submit (function (event) {
    //ne pas valider l'envoi du form. et donc ne pas recharger la page
    event.preventDefault();
    //enregistrer le contenu de texterea
    tinyMCE.triggerSave();
    //this = formulaire sur lequel on a cliqué
    let $form=$(this);

    //vérifier que le champ message ne soit pas vide
    if ($('#message').val()!=''){

        //requête ajax
        $.ajax({
            //url du form. avec attr = attribut action
            url:$form.attr('action'),
            //objet avec arg.qui fait réf à form html
            data:new FormData($form[0]),
            //ne pas traiter les données
            processData: false,
            //ne pas configurer le contentType
            contentType: false,
            method:"post",
            dataType:"JSON"

        //actualiser les msg lors de l'évènement
        //dès que la requête ajax a réussi
        }) .done(function(data){
            if (data.success===true){
                //réf à id listMessage
                let listMessage= $("#listMessage");
                //met à 0 les msg précédents
                listMessage.html("");
                tinyMCE.activeEditor.setContent('');
                //afficher les msg postés
                data.messages.forEach(function(element) {
                    listMessage.append(
                        `<dl>
                            <dt class="text-capitalize">${element.firstName}</dt>
                            <dd class="small text-primary font-italic">Posté le ${element.postDate_fr}</dd>
                            <dd class="text-justify">${element.message}</dd>
                        </dl>`
                    );
                });
            }
        });
    }
});

//AFFICHER LE MESSAGE DE SUCCES DU FORMULAIRE NEED

//détecter validation formulaire
$('.submitNeed').submit (function (event) {
    //ne pas recharger la page
    event.preventDefault();
    //enregistrer le contenu de texterea
    tinyMCE.triggerSave();
    //this = formulaire sur lequel on a cliqué
    let $form=$(this);

    //vérifier que les champs ne soient pas vides
    if ($('#name').val()!='' && $('#description').val()!='') {

        //requête ajax
        $.ajax({
            //url du form. avec attr = attribut action
            url:$form.attr('action'),
            //objet avec arg.qui fait réf à form html
            data:new FormData($form[0]),
            //ne pas traiter les données
            processData: false,
            //ne pas configurer le contentType
            contentType: false,
            method:"post"

        //afficher msg lors de l'évènement
        //dès que la requête ajax a réussi
        }) .done(function(){
            //trouver le §p avec id msg et ajouter le texte du msg
            $form.find('p#msg').text('Votre description de besoin a bien été enregistrée.');
        })
    }
});
