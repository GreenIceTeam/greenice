<?php
use yii\helpers\Html;
use common\models\User;
if(!empty($messGroupSenders[0]['id'])){  //if user have at least one mess
                foreach ($messGroupSenders as $sender): 
      ?>
      
<h1>Vos amis vous ont ecrit</h1>
<div>
    <div>
    <?php
   
        $picName = (!empty($sender['nom_fich'])) ? $sender['nom_fich'] : ''; 
        ?>
        <img  alt="photo_de_profil" src="<?php echo "uploads/".$picName ?>" style="width:10%;height:8em"/>
          <?= Html::encode("{$sender['nom']} vous a écrit ") . $sender['nb_mess'];?> <?= ($sender['nb_mess']==1)?' message':' messages';?>
          <div>
            <?= Html::a('Voir', Yii::$app->UrlManager->createAbsoluteUrl(['message/message/view-mess', 'idSender'=>$sender['id'] ]) );?>
          </div>
    <br/><hr/>
    </div>
    <?php endforeach; ?>
</div>
    <?php } else{ ?>
<div> <h2>Vous n'avez pas de messages</h2> </div>
    <?php } ?>
