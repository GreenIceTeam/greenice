<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

  

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput()->label('pseudo')?>

    <?= $form->field($model, 'name')->textInput()->label('nom') ?>

    <?= $form->field($model, 'password')->passwordInput()->label('mot de passe') ?>

    <?= $form->field($model, 'password')->passwordInput()->label('entrez à nouveau le même mot de passe') ?>

    <?= $form->field($model, 'email')->textInput() ?>
    
    <?= $form->field($model, 'sexe')->dropDownList(
					['H'=>'Homme', 'F'=>'Femme'])?>

    <div class="form-group">
        <?= Html::submitButton('Create',['class'=> 'btn btn-success','name'=> 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


