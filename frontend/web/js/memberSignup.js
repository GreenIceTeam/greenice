/* 
 * Scripts jquery pour dynamiser le formulaire d'inscription
 * -Quand le user choisit le bouton radio etudiant, la liste des doamines d'études s'affiche
 * Qaund il choisit travailleur, c'est la liste des domianes d'activités qui apparait
 */


 $(document).ready( function(){

     
 $("[data-toggle='popover']").popover(); 
     
             var  labEtud = $('#labEtud'), labAct = $('#labAct'), labSousDom = $('#labSousDom'), sousDom= $("#signupform-sousdomaine");
             
        $('#statut0').on('click', function(e){
               labEtud.parent().css({'display':'block'});
        
               labAct.parent().css({'display':'none'});
               sousDom.html('<option value=""></option>'); 
               labSousDom.parent().css({'display':'none'});
        });
        
        $('#statut1').on('click', function(e){
            
               labAct.parent().css({'display':'block'});
        
               labEtud.parent().css({'display':'none'});
                sousDom.html('<option value=""></option>'); 
               labSousDom.parent().css({'display':'none'});
        
        });
        
        
   
  });