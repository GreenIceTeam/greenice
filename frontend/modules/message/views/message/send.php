<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<div>
    <?= $form->field($model, 'content')->textarea()->label('Veuillez entrer le contenu du message:') ?>
    
    <?= $form->field($model, 'fichier')->fileInput()->label('Veuillez entrer votre fichier:') ?>
    <div>
        <?= Html::submitButton('Envoyer', ['class' => 'btn btn-primary'])?>
    </div>
</div>

<?php ActiveForm::end() ?>

