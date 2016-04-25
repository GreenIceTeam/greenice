<?php
use yii\helpers\Html;
?>
<h1>Nouveaux messages</h1>
<div>
    <?php foreach ($messages as $message): ?>
    <div>
    <?php
          $util = $message->getIdSource()->one();
          
          $requete = new \common\models\FichierAssocMess;
          $fichierassoc = $requete->find()->where('id_mess = :id_mess', [':id_mess' => $message->id_mess])->one();
          if (!empty($fichierassoc)){$fich = common\models\Fichier::findOne($fichierassoc->id_fichier);}
          
          echo Html::encode("{$util->username} vous a écrit le {$message->date_env}");
    ?>:<br/>
    <?= $message->contenu ?>
    
    <img src=<?="uploads/"?><?=(!empty($fich->nom))?$fich->nom:'rien'?> alt="piece_jointe"/>
    
    <div>
        <?= Html::a('Repondre', 'http://localhost:82/greenice/frontend/web/index.php?r=message/message/send&idUser=' . $util->id); ?>
        <?= ' '. Html::a('Supprimer', 'http://localhost:82/greenice/frontend/web/index.php?r=message/message/delete&idMess=' . $message->id_mess); ?>
    </div>
    <br/><hr/>
    <?php endforeach; ?>
</div>