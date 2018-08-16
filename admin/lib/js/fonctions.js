//pour attendre que tous les objets soient chargés
$(document).ready(function(){
    
    //afficher image correspondant au choix du jouet
    //choix_jouet = id de la liste déroulante select
    $('#choix_jouet').click(function(){
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
    });
    
});

