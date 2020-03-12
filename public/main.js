//jquery pour traiter le message succès dans formulaire d'inscription

//détecter validation formulaire d'inscription
$('.submit').submit (function (event) {
  event.preventDefault(); //permet de ne pas recharger la page

  let $form=$(this); //this = formulaire sur lequel on a cliqué

  //requête ajax
  $.ajax({
    url:$form.attr('action') //attr renvoie à l'attribut action

  //afficher msg lors de l'évènement
  }) .done(function(){ //dès que la requête a réussi

    $form.find('.success').text('Super ! Vous êtes maintenant inscrit(e).');
  })
});

