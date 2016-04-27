<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;



$this->title = 'Commenter une publication';
 $this->params['breadcrumbs'][] = $this->title;

 ?>
<div class=''>
    <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['action'=>['publication/comment'], 'id' => 'comment-form', 'options'=>['enctype'=>'multipart/form-data'] ]); ?>
                    <?= $form->field($comment, 'content')->label('contenu', ['id'=>'labCommentContent'])->textarea() ?>
                    <?= $form->field($comment, 'file')->label('fichier',  ['id'=>'labCommentFile'])->fileInput() ?>
                    <?= $form->field($comment, 'idPubl')->label('')->hiddenInput(['readonly'=>true, 'value'=>$idPubl ]) ?>
                
                    <div class="form-group">
                        <?= Html::submitButton('Envoyer', ['class' => 'btn btn-primary', 'name' => '']) ?>
                        <?= Html::resetButton('Annuler', ['class' => 'btn btn-cancel', 'name' => '']) ?>
                    </div>
                <?php ActiveForm::end(); ?></div>
        </div>

