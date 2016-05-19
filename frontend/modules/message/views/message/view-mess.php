<?php
use yii\helpers\Html;
use common\models\User;
use yii\widgets\ActiveForm;
?>
<h1>Messages</h1>
<div>
    <?php foreach ($messages as $message):
        
         // $requete = new \common\models\FichierAssocMess;
          // fichierassoc = $requete->find()->where('id_mess = :id_mess', ['id_mess' => $message['id_mess']])->one();
         // if (!empty($fichierassoc)){$fich = common\models\Fichier::findOne($fichierassoc->id_fichier);}
          $imgName = (!empty($message['nom_fich'])) ? $message['nom_fich'] : '';
          echo Html::encode("{$message['nom']} vous a écrit le {$message['date_env']}");
          ?>:
              <?='<img  style="width:10%;height:8em"  src=uploads/'.$message['photo_profil'] ?> />
<br/>
    <?= $message['contenu'] . ' '?>
    <?php if (isset($imgName) && !empty($imgName)){ ?>
    <div><img src="<?='uploads/'.$imgName?>"  alt="piece_jointe" title="fichier du message" style="width: 16em; height: 15em"/></div>
    <?php } ?>    
    <div>
        <?= Html::a('Supprimer',Yii::$app->UrlManager->createAbsoluteUrl(['message/message/delete', 'idMess'=>$message['id_mess']]))?>
    </div>
    <br/><hr/>
    <?php endforeach; ?>
    
    
<?php $form = ActiveForm::begin(['action'=>['message/send'],'options' => ['enctype' => 'multipart/form-data']]);  ?>
<div>
    <?= $form->field($model, 'content')->textarea()->label('Veuillez entrer le contenu du message:') ?>
    
    <?= $form->field($model, 'fichier')->fileInput()->label('Veuillez entrer votre fichier:') ?>
    <?= $form->field($model, 'idReceiver')->label('')->hiddenInput(['readonly'=>true, 'value'=> $model->idReceiver])?>
    <div>
        <?= Html::submitButton('Envoyer', ['class' => 'btn btn-primary'])?>
    </div>
</div>
    <?php ActiveForm::end() ?>
    
</div>