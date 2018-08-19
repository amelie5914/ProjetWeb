
function updateSelectBox(object){
                // Object correspond au input qui déclenche l'action (pays dans notre cas)
                // On récupère le select (département) qui doit être mise à jour suite au changement du parent (pays)
                var target = $("#"+object.attr('target'));
                
                // On récupère tous les optgroup du select cible spécifié avec target (les optgroup du select département)
                var listGroups = target.find("optgroup");
                
                // On récupère le optgroup qui correspond à la valeur courante du select parent (pays)
                var validGroup = target.find("optgroup[reference='"+object.find(':selected').val()+"']");
                
                //On modifie la valeur courante du select cible (département)
                target.val(validGroup.find("option").val());
                
                //On cache tous les optgroup de département
                listGroups.hide();
                
                //On affiche uniquement le optgroup de département qui correspond à la valeur courante de pays
                validGroup.show();
                
                //On vérifie si la cible (département) doit déclencher une mise à jour d'une autre liste
                // Département peut par exemple déclencher la mise à jour des villes, et les villes déclenches celle des quartiers...
                if(target.attr('content-type')=='choices')
	                target.change();
            }
              
                 //On fait la première mise à jour des
	        
$(document).ready(function(){
  
    var $nom = $('#nom'),
        $prenom = $('#prenom'),
        $mdp = $('#mdp'),
        $confirmation = $('#confirmdp'),
        $email = $('#email'),
        $envoi = $('#envoyer'),
        $reset = $('#annuler'),
        $champ = $('.champ');
        updateSelectBox($("select[trigger='true']"));
    $champ.keyup(function(){
        if($(this).val().length < 5){ // si la chaîne de caractères est inférieure à 5
            $(this).css({ // on rend le champ rouge
                borderColor : 'red',
	        color : 'red'
            });
         }
         else{
             $(this).css({ // si tout est bon, on le rend vert
	         borderColor : 'green',
	         color : 'green'
	     });
         }
    });
    $('#adresse').keyup(function(){
        if($(this).val().length < 20){ // si la chaîne de caractères est inférieure à 5
            $(this).css({ // on rend le champ rouge
                borderColor : 'red',
	        color : 'red'
            });
         }
         else{
             $(this).css({ // si tout est bon, on le rend vert
	         borderColor : 'green',
	         color : 'green'
	     });
         }
    });
    $email.keyup(function(){
        var patt = new RegExp("^[a-z]{1,64}@[a-z]{1,64}\.[a-z]{2,6}$");
        if(!(patt.test($(this).val()))){ // si la chaîne de caractères est inférieure à 5
            $(this).css({ // on rend le champ rouge
                borderColor : 'red',
	        color : 'red'
            });
         }
         else{
             $(this).css({ // si tout est bon, on le rend vert
	         borderColor : 'green',
	         color : 'green'
	     });
         }
    });

    $confirmation.keyup(function(){
        if($(this).val() != $mdp.val()){ // si la confirmation est différente du mot de passe
            $(this).css({ // on rend le champ rouge
     	        borderColor : 'red',
        	color : 'red'
            });
        }
        else{
	    $(this).css({ // si tout est bon, on le rend vert
	        borderColor : 'green',
	        color : 'green'
	    });
        }
    });

   
$('#annuler').click(efface_formulaire);
function efface_formulaire () {
  $(':input')
   .not(':button, :submit, :reset, :hidden')
   .val('')
   .prop('checked', false)
   .prop('selected', false);
}

$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
});

