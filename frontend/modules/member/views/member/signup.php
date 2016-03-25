<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use kartik\date\DatePicker;
use yii\jui\DatePicker;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'email')->textInput()->label('email') ?>

             <?= $form->field($model, 'password')->passwordInput() ?>
             <?= $form->field($model, 'password_repeat')->passwordInput()->label('Retapez votre mot de passe') ?>
                <?= $form->field($model, 'domaine')->textInput() ?> 
                <?= $form->field($model, 'sousDomaine')->textInput() ?>
                <?= $form->field($model, 'nom')->textInput() ?>
                <?= $form->field($model, 'prenom')->textInput() ?>
                <?= $form->field($model, 'sexe')->dropDownList(
					['H'=>'Homme', 'F'=>'Femme']
				) ?>
                <?=' date de naissance'.DatePicker::widget([
                            'language' => 'fr',
                             'model' => $model,
                             'attribute' => 'dateNaiss',
                             'value'=>'date de naissance',
                            'clientOptions' => [
                                'dateFormat' => 'yy-mm-dd']
                      ])
                   ?>
            
                <?= $form->field($model, 'ville')->textInput() ?>
            
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
