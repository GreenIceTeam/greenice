<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FichierAssocPubl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fichier-assoc-publ-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_fichier')->textInput() ?>

    <?= $form->field($model, 'id_publ')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
