<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RecevoirMess */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recevoir-mess-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_dest')->textInput() ?>

    <?= $form->field($model, 'id_mess')->textInput() ?>

    <?= $form->field($model, 'affiche')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lu')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
