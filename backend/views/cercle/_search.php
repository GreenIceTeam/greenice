<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CercleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cercle-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_cercle') ?>

    <?= $form->field($model, 'id_createur') ?>

    <?= $form->field($model, 'id_supp') ?>

    <?= $form->field($model, 'nom') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'date_creation') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
