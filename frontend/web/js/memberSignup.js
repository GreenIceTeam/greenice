/* 
 * Scripts jquery pour dynamiser le formulaire d'inscription
 * -Quand le user choisit le bouton radio etudiant, la liste des doamines d'études s'affiche
 * Qaund il choisit travailleur, c'est la liste des domianes d'activités qui apparait
 */


 $(document).ready( function(){
     
     
     
     
 $("[data-toggle='popover']").popover(); 
     
     
     
     
     
             var  labEtud = $('#labEtud'), labAct = $('#labAct');
         //  alert($("#labEtud").css("display"));
        $('#statut0').on('click', function(e){
           // qEt = domEtud.queue('fx'); alert(qEt); 
          //  e.preventDefault();
            //alert('yii');
               labEtud.parent().css({'display':'block'});
              // domEtud.css({'display':'block'}).val('');
        
               labAct.parent().css({'display':'none'});
               //domAct.css({'display':'none'}).val('');
        });
        
        $('#statut1').on('click', function(e){
          //  e.preventDefault();
            //alert('yii');
               labAct.parent().css({'display':'block'});
               //domAct.css({'display':'block'}).val('');
        
               labEtud.parent().css({'display':'none'});
              // domEtud.css({'display':'none'}).val('');
        
        });
        
        
   
  });