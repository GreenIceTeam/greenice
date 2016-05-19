<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Publication';
 $this->params['breadcrumbs'][] = $this->title;
$idComm = $publs[0]['idComm'];
?>
<div class='container'>
    <div class=" row col-lg-offset-3" >
            <div class="col-lg-6" style='border: 1px solid green; padding: 20px 45px 20px  45px; background-color:silver'>
                <?php $form = ActiveForm::begin(['action'=>['publication/post'], 'id' => 'post-form', 'options'=>['enctype'=>'multipart/form-data'] ]); ?>
                    <?= $form->field($model, 'content')->label('contenu')->textarea() ?>
                    <?= $form->field($model, 'file')->label('fichier')->fileInput() ?>
                    <?= $form->field($model, 'idComm')->label('')->hiddenInput(['readonly'=>true, 'value'=> $idComm ]) ?>
                
                    <div class="form-group">
                        <?= Html::submitButton('Envoyer', ['class' => 'btn btn-primary', 'name' => '']) ?>
                        <?= Html::resetButton('Annuler', ['class' => 'btn btn-cancel', 'name' => '']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    
    
    <div class="row col-lg-offset-2">
        <h3>Publications de la communauté</h3>
        <?php if(isset($publs) && !empty($publs)){  
                       foreach ($publs as $key=>$publ){ ?>
                        <hr/>
                        <div class="row ">
                                    <h2><?= $publ['nom'] ?></h2>
                                    <div class="">
                                            <div class=""><span><?= $publ['contenu'] ?></span></div>
                     <?php   if( isset($publ['nom_fich'])){ ?>
                             <div class="col-lg-offset-2"><img class="img-responsive img-thumbnail" style="width:27sem; height: 25em"  src="<?= 'uploads/'.$publ['nom_fich'] ?>"/> 
                             </div>
                                    </div>
                        </div>;
               <?php } } }else{ ?>
                    <div class="row">Aucune publication à afficher.</div>'
               <?php } ?>
    </div>
    </div>