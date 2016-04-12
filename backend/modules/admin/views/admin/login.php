<?php

<<<<<<< HEAD
=======
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

>>>>>>> 6aec03614c81090aac22ad7be2a48b9b3d7f3d6d
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
<<<<<<< HEAD
?>

    <div> 
        <div>
          <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'rememberMe')->checkbox() ?>
        </div>
        <div>
            <?= Html::submitButton('Se connecter', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <div>
        <?= Html::a('mot de passe oublié ?', ['site/request-password-reset']) ?>
        <?php ActiveForm::end(); ?>
    </div>
=======
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to login:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
>>>>>>> 6aec03614c81090aac22ad7be2a48b9b3d7f3d6d
