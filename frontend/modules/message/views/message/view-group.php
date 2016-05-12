<?php
use yii\helpers\Html;
use common\models\User;
?>
<h1>Vos amis vous ont ecrit</h1>
<div>
    <?php foreach ($id_utilisateurs as $id_utilisateur): ?>
    <div>
    <?php
          $util = User::findOne($id_utilisateur->id_source);
          $fichier = common\models\Fichier::find()->select('nom')->where(['id_user'  => $id_utilisateur->id_source])->andWhere(['statut' => 'photo_profil'])->scalar();
   
        $picName = (!empty($fichier)) ? $fichier :'rien'; 
        ?>
        <img  alt="photo_de_profil" src=<?php echo "uploads/".$picName ?> />
          <?= Html::encode("{$util->username} vous a écrit ") . $nombre[$id_utilisateur->id_source];?> <?= ($nombre[$id_utilisateur->id_source] == 1)?' message':' messages';?>
          <div>
            <?= Html::a('Voir', 'http://localhost/greenice/frontend/web/index.php?r=message/message/view-mess&idSender=' . $util->id);?>
          </div>
    <br/><hr/>
    </div>
    <?php endforeach; ?>
</div>