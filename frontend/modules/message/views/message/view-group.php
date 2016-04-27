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
          $fichier = common\models\Fichier::find()->where('id_user = :id_user', [':id_user' => $id_utilisateur->id_source])->andWhere(['status' => 'profil']);
    ?>
        <img src=<?="uploads/"?><?=(!empty($fichier->nom))?$fichier->nom:'rien'?> alt="photo_de_profil"/>
          <?= Html::encode("{$util->username} vous a écrit ") . $nombre[$id_utilisateur->id_source];?> <?= ($nombre[$id_utilisateur->id_source] == 1)?' message':' messages';?>
          <div>
            <?= Html::a('Voir', 'http://localhost:82/greenice/frontend/web/index.php?r=message/message/view-mess&idSender=' . $util->id);?>
          </div>
    <br/><hr/>
    </div>
    <?php endforeach; ?>
</div>