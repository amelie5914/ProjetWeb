//pour attendre que tous les objets soient chargés
//$(document).ready(function(){
    
    //afficher image correspondant au choix du jouet
    //choix_jouet = id de la liste déroulante select
   /* $('#choix_jouet').click(function(){
        $('#showImage').css({
            'margin-top' : '1em',
            'border' : 'solid #DD0000 1px',
            'padding' : '5px'
        });
        var id = $('#choix_jouet option:selected').val();
        var  img = "id_jouet="+id;
        $.ajax({
            type: 'GET',
            data: img,
            dataType: 'json',
            url: 'admin/lib/php/ajax/AjaxRechercheImageJouet.php',
            success: function(data){//data est le retour du fichier php
                $('#showImage').html('<img src="admin/images/'+data[0].image+'" alt="image"/>');
                console.log(data[0].image);
            }
        });
    });
    
    //Exercices jquery Mozart
    $('#vie').hide();
    $('#deuxieme').fadeOut(3000);
    $('#para1').hide();
    $('#para2').hide();
    $('#troisieme').fadeOut('slow');
    $('#quatrieme').slideDown(2000);
    $('#cinquieme').hide();
    $('#cacher2').hide();
    
    $('h1').click(function(){
        $('h1').css('color','#FF0000');
        $('#vie').show();
    });
    
    $('#vie').mouseover(function(){
        $('#para1').show();
        $('#vie').css({
            'color' : '#0000FF',
            'font-weight' : 'bold'
        });
    });
    
    $('#vie').mouseout(function(){
        $('#vie').css({
            'color' : '#FF0000'
        });
    });
    
    $('#para1').click(function(){
        $('#deuxieme').show();
        $('#para2').show();
    });
    
    $('#para2').click(function(){
        $('#troisieme').show();
        $('#para3').show();
    });
    
    $('#para3').click(function(){
        $('#quatrieme').show();
        $('#cacher2').show();
    });
    
    $('#cacher2').click(function(){
       //bascule
       $('#cinquieme').toggle();
       if($('#cinquieme').is(':visible')){
           $(this).val('Cacher la suite');
       }
       else {
           $(this).val('Montrer la suite');
       }
    });
        
        
    
    //enlever "activer js" sur accueil.php
    $('#no-js').remove();    
    
    //conseil page d'accueil
    $('#cacher').click(function(){
       //bascule
       $('#avertisst').toggle();
       if($('#avertisst').is(':visible')){
           $(this).val('Cacher le conseil');
       }
       else {
           $(this).val('Afficher le conseil');
       }
    });
    
    //supprimer le bouton d'envoi form page confort.php
    $('#submit_search_td').remove();
    
    //traitement automatisé du changement liste déroul
    $('#choix_liste_deroulante').change(function(){
        //on se place sur l'attribut name du select
        var attribut = $(this).attr('name');
        //<select name="choix_atout" id="choix_liste_der...
        //on récupère sa valeur : choix_atout
        var val = $(this).val();
        //alert('attribut='+attribut+'et valeur = '+val);
        //reconstruction de l'url
        //index.php?choix_atout=2&submit_choix=Voir
        var url ='index.php?'+attribut+'='+val+'&submit_choix=Voir';
        //alert(url);
        window.location.href = url;        
    });*/
    
    
    
     
/* 
  * trigger="true" permet de dire que c'est l'élément le plus haut qui fait varier toutes les autres listes 
  * target=[id_cible] permet de spécifier la liste qui doit varier au changement de la sélection 
  * reference=[id_reference] est l'id de l'élément parent qui déclenche la mise à jour de la liste 
*/ 
  
//Fonction qui s'occupe de la mise à jour des listes 
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
  
//On associe la fonction updateSelectBox à l'événement onchange des listes qui doivent déclencher des mises à jour d'autres listes 
$("select[content-type='choices']").on('change',function(){ 
    updateSelectBox($(this)); 
}); 
  
//On fait la première mise à jour des 


$(document).ready(function(){
    
    var $nom = $('#nom'),
        $prenom = $('#prenom'),
        $mdp = $('#mdp'),
        $confirmation = $('#confirmdp'),
        $email = $('#email'),
        $envoi = $('#envoyer'),
        $reset = $('#annuler'),
        $champ = $('.champ'),
        $date=$('#id_date');
        
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

    $('#nomEscape').click(function(){
        $('#id_date').click(function(){
        
       /* $('#showImage').css({
            'margin-top' : '1em',
            'border' : 'solid #DD0000 1px',
            'padding' : '5px'
        });*/
        var id = $('#id_date option:selected').val();
        var  d = "date="+id;
        $.ajax({
            type: 'GET',
            data: d,
            dataType: 'json',
            url: 'admin/lib/php/ajax/AjaxRechercheHeure.php',
            success: function(data){//data est le retour du fichier php
                $nbr=count(data);
                for($i=0;$i<$nbr;$i++){
                $('#heure').html('<option value="'+data[$i].heure+'>'+data[$i].heure+'</option>');
                console.log(data[$i].heure);
            }
            }
        });
    });
    });
    /*$date.keyup(function(){
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
    });*/

   /* $reset.click(function(){
        $champ.css({ // on remet le style des champs comme on l'avait défini dans le style CSS
            borderColor : '#ccc',
    	    color : '#555'
        });
        $erreur.css('display', 'none'); // on prend soin de cacher le message d'erreur
    });*/

    function verifier(champ){
        if(champ.val() == ""){ // si le champ est vide
    	    $erreur.css('display', 'block'); // on affiche le message d'erreur
            champ.css({ // on rend le champ rouge
    	        borderColor : 'red',
    	        color : 'red'
    	    });
            return true;
        }
    }
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

