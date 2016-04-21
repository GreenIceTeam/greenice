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
                    <?= $form->field($model, 'content')->label('contenu')->textarea() ?>
                    <?= $form->field($model, 'file')->label('fichier')->fileInput() ?>
                    <?= $form->field($model, 'idComm')->label('')->hiddenInput(['readonly'=>true, 'value'=>1 ]) ?>
                
                    <div class="form-group">
                        <?= Html::submitButton('Envoyer', ['class' => 'btn btn-primary', 'name' => '']) ?>
                        <?= Html::resetButton('Annuler', ['class' => 'btn btn-cancel', 'name' => '']) ?>
                    </div>
                <?php ActiveForm::end(); ?></div>
        </div>
    <div class='col-lg-12'>
        <h3>Publications de la communauté</h3><br/>
        <?php
        if(isset($publs) && !empty($publs)){  
        foreach ($publs as $key=>$publ){
                echo '<hr/><div><h2>'.$publ['nom'].'</h2>';
                echo('<div class="row-lg-3 col-lg-10"><span>'.$publ['contenu'].'</span></div>');
                if( isset($publ['nom_fich'])){
                    echo     ' <div clas="row"><img class="col-lg-3 row-lg-2" src="uploads/'.$publ['nom_fich'].'"/> </div></div><br/><br/><br/>';
                //echo print_r($publ->idFichiers);
               }
            }
         }else{
             echo '<div class="row">Aucune publication à afficher.</div>';
         }
        ?>
        
    </div>
    
    
     </div>