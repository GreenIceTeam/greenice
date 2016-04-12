<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
?>

    <div> 
        <div>
          <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
        </div>
        <div>
            <?= Html::submitButton('Se connecter', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <div>
        <?= Html::a('mot de passe oublié ?', ['site/request-password-reset']) ?>
        <?php ActiveForm::end(); ?>
    </div>
