<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Publication';
 $this->params['breadcrumbs'][] = $this->title;
?>
<div class=''>
    <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['action'=>['publication/post'], 'id' => 'login-form', 'options'=>['enctype'=>'multipart/form-data'] ]); ?>
                    <?= $form->field($model, 'content')->label('contenu')->textInput([ 'value'=>1]) ?>
                    <?= $form->field($model, 'file')->label('fichier')->fileInput() ?>
                    <?= $form->field($model, 'idComm')->label('')->hiddenInput(['readonly'=>true, 'value'=>1]) ?>
                
                    <div class="form-group">
                        <?= Html::submitButton('Envoyer', ['class' => 'btn btn-primary', 'name' => '']) ?>
                        <?= Html::resetButton('Annuler', ['class' => 'btn btn-cancel', 'name' => '']) ?>
                    </div>
                <?php ActiveForm::end(); ?></div>
        </div>
     </div>