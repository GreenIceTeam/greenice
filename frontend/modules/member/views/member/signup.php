<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\modules\member\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

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

                <?= $form->field($model, 'email') ?>

                 <?= $form->field($model, 'nom') ?>

                <?= $form->field($model, 'prenom') ?>

                <?= $form->field($model, 'dateNaissance') ?>

                <?= $form->field($model, 'ville') ?>

                <?= $form->field($model, 'domaine') ?>

                <?= $form->field($model, 'sousDomaine') ?>
                
                <?= $form->field($model, 'sexe')->label('sexe')->dropDownList(['F'=>'femme','H'=>'homme']) ?>

               

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
            
        </div>
    </div>
</div>
