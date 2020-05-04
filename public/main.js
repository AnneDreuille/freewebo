//AFFICHER LE MESSAGE DE SUCCES DU FORMULAIRE NEED

//détecter validation formulaire
$('.submitNeed').submit (function (event) {
    event.preventDefault(); //permet de ne pas recharger la page
    tinyMCE.triggerSave(); //enregistre le contenu de texterea
    let $form=$(this); //this = formulaire sur lequel on a cliqué

    //requête ajax
    $.ajax({
        url:$form.attr('action'), //attr renvoie à l'attribut... action
        data:new FormData($form[0]), //objet avec arg.qui fait réf à form html
        processData: false, //indique à jQuery de ne pas traiter les données
        contentType: false, //indique à jQuery de ne pas configurer le contentType
        method:"post"

    //afficher msg lors de l'évènement
    }) .done(function(){ //dès que la requête ajax a réussi

        $form.find('p#msg').text('Votre description de besoin a bien été enregistrée.');
    })
});

//ACTUALISER LES MESSAGES POSTES PAR PLUSIEURS USERS

//détecter validation formulaire avec classe submitPost
$('.submitPost').submit (function (event) {
    //ne pas recharger la page
    event.preventDefault();
    //enregistrer le contenu de texterea
    tinyMCE.triggerSave();
    //créer la var form avec this = form. sur lequel on a cliqué
    let $form=$(this);

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
            $("#message").val(""); //à revoir
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
});
