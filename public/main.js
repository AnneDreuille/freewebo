//jquery pour afficher le message de succès du formulaire need

//détecter validation formulaire
$('.submit').submit (function (event) {
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

