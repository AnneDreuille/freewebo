//jquery pour afficher le message de succès du formulaire need

//détecter validation formulaire

$('.submit').submit (function (event) {
  event.preventDefault(); //permet de ne pas recharger la page

  let $form=$(this); //this = formulaire sur lequel on a cliqué

  //requête ajax
  $.ajax({
    url:$form.attr('action') //attr renvoie à l'attribut action

  //afficher msg lors de l'évènement
  }) .done(function(){ //dès que la requête a réussi

    $form.find('p#msg').text('Votre description de besoin a bien été enregistrée.');
  })
});

